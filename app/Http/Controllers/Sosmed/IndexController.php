<?php

namespace App\Http\Controllers\Sosmed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Story;
use App\Models\StoryView;
use App\Models\Like;
use App\Models\Post;
use App\Models\PostMedia;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Block;
use App\Models\SavedPost;
use App\Models\PostReport;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        Log::info('IndexController construct dijalankan');
    }

    public function index(Request $request)
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return redirect()->route('login');
            }

            // Get IDs of users who are blocked by or have blocked the current user  
            $blockedUserIds = Block::where(function ($query) use ($user) {
                $query->where('user_id', $user->id)  // Users that the current user has blocked
                    ->orWhere('blocked_user_id', $user->id);  // Users that have blocked the current user
            })
                ->get()
                ->map(function ($block) use ($user) {
                    return $block->user_id == $user->id ? $block->blocked_user_id : $block->user_id;
                })
                ->unique();

            // Query posts excluding those from blocked users  
            $posts = Post::whereNull('deleted_at')
                ->whereNotIn('user_id', $blockedUserIds)
                ->where(function ($query) use ($user) {
                    $query->whereNull('group_id')
                        ->orWhereIn('group_id', function ($subquery) use ($user) {
                            $subquery->select('group_id')
                                ->from('group_members')
                                ->where('user_id', $user->id);
                        });
                })
                ->withCount(['comments' => function ($query) {
                    $query->whereNull('deleted_at');
                }])
                ->withCount('likes')
                ->with([
                    'user',
                    'media' => function ($query) {
                        $query->orderBy('order', 'asc');
                    },
                    'likedUsers' => function ($query) {
                        $query->limit(3);
                    },
                    'comments' => function ($query) {
                        $query->whereNull('deleted_at')
                            ->with([
                                'user',
                                'likes.user'
                            ])
                            ->withCount('likes')
                            ->orderBy('created_at', 'desc');
                    }
                ])
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            // Transform for like status  
            // Transform for like status  
            $posts->through(function ($post) use ($user) {
                $post->is_liked = $post->likes()
                    ->where('user_id', $user->id)
                    ->exists();

                $post->is_saved = $post->saves()  // Tambah ini untuk cek status saved
                    ->where('user_id', $user->id)
                    ->exists();

                $post->liked_users_avatars = $post->likedUsers->pluck('avatar');

                $post->comments->each(function ($comment) use ($user) {
                    $comment->is_liked = $comment->likes()
                        ->where('user_id', $user->id)
                        ->exists();

                    $comment->liked_users_avatars = $comment->likes->pluck('user.avatar');
                });

                return $post;
            });

            // Query stories excluding those from blocked users  
            $stories = Story::select([
                'stories.*',
                DB::raw(
                    'EXISTS (  
                    SELECT 1   
                    FROM story_views   
                    WHERE story_views.story_id = stories.id   
                    AND story_views.viewer_id = ?) as is_viewed'
                )
            ])
                ->addBinding($user->id, 'select')
                ->where('stories.is_active', 1)
                // Hapus baris ini: ->where('stories.user_id', '!=', $user->id)
                ->whereNotIn('stories.user_id', $blockedUserIds)
                ->where(function ($query) {
                    $query->whereNull('stories.expires_at')
                        ->orWhere('stories.expires_at', '>', now());
                })
                ->orderBy('is_viewed', 'asc')
                ->orderBy('stories.created_at', 'desc')
                ->with(['user'])
                ->get();

            // Handle story views  
            if ($request->has('story_id')) {
                $storyId = $request->input('story_id');

                $existingView = StoryView::firstOrCreate(
                    ['story_id' => $storyId, 'viewer_id' => $user->id],
                    ['viewed_at' => now()]
                );
            }

            if ($request->ajax()) {
                return view('components.sosmed.partials.posts', compact('posts'));
            }

            return view('components.sosmed.index', compact('user', 'stories', 'posts'));
        } catch (\Exception $e) {
            Log::error('Error in index method:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'error' => 'Terjadi kesalahan saat memuat data'
                ], 500);
            }
        }
    }


    public function storeComment(Request $request)
    {
        try {
            Log::info('Memulai storeComment dengan data:', [
                'post_id' => $request->post_id,
                'parent_id' => $request->parent_id,
                'content' => $request->content,
                'has_image' => $request->hasFile('image')
            ]);

            $validated = $request->validate([
                'post_id' => 'required|exists:posts,id',
                'parent_id' => 'nullable|exists:comments,id',
                'content' => 'required|string|max:500',
                'image' => 'nullable|image|max:2048',
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('assets/images/comment'), $imageName);
                $imagePath = '/assets/images/comment/' . $imageName;
                Log::info('Comment image saved:', ['path' => $imagePath]);
            }

            DB::beginTransaction();

            try {
                // Create comment
                $comment = Comment::create([
                    'user_id' => Auth::id(),
                    'post_id' => $request->post_id,
                    'parent_id' => $request->parent_id,
                    'content' => $request->content,
                    'image' => $imagePath,
                    'likes_count' => 0
                ]);

                Log::info('Comment created:', [
                    'id' => $comment->id,
                    'post_id' => $comment->post_id,
                    'parent_id' => $comment->parent_id
                ]);

                // Update post comments count
                $post = Post::findOrFail($request->post_id);
                $post->increment('comments_count');

                DB::commit();

                // Load necessary relations
                $comment->load([
                    'user',
                    'likes.user',
                    'replies.user',
                    'replies.likes.user'
                ]);

                return response()->json([
                    'success' => true,
                    'comment' => $comment
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } catch (\Exception $e) {
            Log::error('Error in storeComment:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan komentar'
            ], 500);
        }
    }


    public function toggleCommentLike(Comment $comment)
    {
        $user = auth()->user();

        // Check if user already liked comment
        $like = $comment->likes()->where('user_id', $user->id)->first();

        if ($like) {
            // Unlike comment
            $like->delete();
            $comment->decrement('likes_count');
            $isLiked = false;
        } else {
            // Like comment
            $comment->likes()->create([
                'user_id' => $user->id
            ]);
            $comment->increment('likes_count');
            $isLiked = true;
        }

        return response()->json([
            'success' => true,
            'isLiked' => $isLiked,
            'likesCount' => $comment->likes_count
        ]);
    }

    public function reply(Request $request, Comment $comment)
    {
        try {
            $request->validate([
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $reply = new Comment();
            $reply->user_id = auth()->id();
            $reply->post_id = $comment->post_id;
            $reply->content = $request->content;
            $reply->parent_id = $comment->id;

            // Handle image upload if exists
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('assets/images/comment'), $filename);
                $reply->image = '/assets/images/comment/' . $filename;
            }

            $reply->save();

            // Increment comments_count on post
            $comment->post()->increment('comments_count');

            return response()->json([
                'success' => true,
                'reply' => [
                    'id' => $reply->id,
                    'content' => $reply->content,
                    'image' => $reply->image,
                    'created_at' => $reply->created_at->diffForHumans(),
                    'user' => [
                        'name' => auth()->user()->name,
                        'avatar' => auth()->user()->avatar
                    ],
                    'likes_count' => 0,
                    'is_liked' => false
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error submitting reply: ' . $e->getMessage()
            ], 500);
        }
    }

    public function toggleReplyLike(Request $request, $replyId)
    {
        $reply = Comment::findOrFail($replyId);
        $user = $request->user();

        $like = $reply->likes()->where('user_id', $user->id)->first();

        if ($like) {
            $like->delete();
            $reply->decrement('likes_count');
            $isLiked = false;
        } else {
            $reply->likes()->create([
                'user_id' => $user->id,
                'comment_id' => $reply->id,
            ]);
            $reply->increment('likes_count');
            $isLiked = true;
        }

        return response()->json([
            'success' => true,
            'isLiked' => $isLiked,
            'likesCount' => $reply->likes_count,
        ]);
    }
    public function destroyComment(Request $request, $commentId)
    {
        try {
            $comment = Comment::findOrFail($commentId);

            if ($comment->user_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }

            // Hapus semua balasan terkait dengan komentar ini
            $comment->replies()->delete();

            // Hapus komentar
            $comment->delete();

            return response()->json([
                'success' => true,
                'message' => 'Comment and its replies deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete comment'
            ], 500);
        }
    }

    public function destroyReply(Request $request, $replyId)
    {
        try {
            $reply = Comment::findOrFail($replyId);

            if ($reply->user_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }

            $reply->delete();

            return response()->json([
                'success' => true,
                'message' => 'Reply deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete reply'
            ], 500);
        }
    }
    public function blockUser(Request $request, $userId)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $blockedUser = User::findOrFail($userId);

            // Check if already blocked using Block model directly
            $isBlocked = Block::where('user_id', $user->id)
                ->where('blocked_user_id', $blockedUser->id)
                ->exists();

            if ($isBlocked) {
                return response()->json([
                    'code' => 400,
                    'message' => 'User already blocked.',
                    'status' => false
                ]);
            }

            // Create block record
            Block::create([
                'user_id' => $user->id,
                'blocked_user_id' => $blockedUser->id,
                'reason' => $request->input('reason')
            ]);

            return response()->json([
                'code' => 200,
                'message' => 'User blocked successfully.',
                'status' => true
            ]);
        }

        return response()->json([
            'code' => 401,
            'message' => 'Unauthorized.',
            'status' => false
        ]);
    }

    public function unblockUser($userId)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $blockedUser = User::findOrFail($userId);

            // Check and delete block record
            $block = Block::where('user_id', $user->id)
                ->where('blocked_user_id', $blockedUser->id)
                ->first();

            if (!$block) {
                return response()->json([
                    'code' => 400,
                    'message' => 'User not blocked previously.',
                    'status' => false
                ]);
            }

            $block->delete();

            return response()->json([
                'code' => 200,
                'message' => 'User unblocked successfully.',
                'status' => true
            ]);
        }

        return response()->json([
            'code' => 401,
            'message' => 'Unauthorized.',
            'status' => false
        ]);
    }

    public function toggleSavePost(Post $post, Request $request)
    {
        try {
            $user = Auth::user();
            $action = $request->input('action'); // 'save' or 'unsave'

            if (!in_array($action, ['save', 'unsave'])) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid action specified'
                ], 400);
            }

            $existingSave = SavedPost::where('user_id', $user->id)
                ->where('post_id', $post->id)
                ->first();

            if ($action === 'save') {
                if ($existingSave) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Post already saved'
                    ]);
                }

                SavedPost::create([
                    'user_id' => $user->id,
                    'post_id' => $post->id
                ]);

                return response()->json([
                    'status' => true,
                    'message' => 'Post saved successfully'
                ]);
            } else { // unsave
                if (!$existingSave) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Post was not saved'
                    ]);
                }

                $existingSave->delete();

                return response()->json([
                    'status' => true,
                    'message' => 'Post unsaved successfully'
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Error toggling post save status:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'status' => false,
                'message' => 'Error processing request'
            ], 500);
        }
    }
    public function reportPost(Post $post, Request $request)
    {
        try {
            $user = Auth::user();

            // Check if already reported
            $existingReport = PostReport::where('user_id', $user->id)
                ->where('post_id', $post->id)
                ->first();

            if ($existingReport) {
                return response()->json([
                    'status' => false,
                    'message' => 'You have already reported this post'
                ]);
            }

            // Create report
            PostReport::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
                'reason' => $request->input('reason'),
                'additional_info' => $request->input('additional_info'),
                'status' => 'pending'
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Post reported successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Error reporting post:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'status' => false,
                'message' => 'Error reporting post'
            ], 500);
        }
    }

    public function destroyPost(Request $request, $postId)
    {
        try {
            $post = Post::findOrFail($postId);

            // Check if the authenticated user is the owner of the post
            if ($post->user_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized to delete this post'
                ], 403);
            }

            // Delete related media files
            foreach ($post->media as $media) {
                // Remove file from filesystem if needed
                if (file_exists(public_path($media->file_path))) {
                    unlink(public_path($media->file_path));
                }
                // Delete media record
                $media->delete();
            }

            // Delete post likes
            $post->likes()->delete();

            // Delete post comments
            $post->comments()->delete();

            // Delete the post
            $post->delete();

            return response()->json([
                'success' => true,
                'message' => 'Post deleted successfully',
                'post_id' => $postId
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting post:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to delete post'
            ], 500);
        }
    }
    public function uploadStory(Request $request)
    {
        try {
            $request->validate([
                'media' => 'required|file|mimes:jpg,jpeg,png,mp4|max:20480',
                'caption' => 'nullable|string|max:500',
            ]);

            $user = Auth::user();

            $story = new Story();
            $story->user_id = $user->id;
            $story->type = $request->file('media')->getClientOriginalExtension() == 'mp4' ? 'video' : 'image';

            $filename = time() . '_' . Str::random(10) . '.' . $request->file('media')->getClientOriginalExtension();
            $request->file('media')->move(public_path('assets/stories'), $filename);
            $story->media_path = '/assets/stories/' . $filename;

            $story->caption = $request->input('caption');
            $story->is_active = true;
            $story->save();

            return response()->json([
                'success' => true,
                'message' => 'Story uploaded successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Error uploading story:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to upload story'
            ], 500);
        }
    }
}
