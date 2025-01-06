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

            // Query posts dengan relasi yang sudah diperbaiki
            $posts = Post::whereNull('deleted_at')
                ->where(function ($query) use ($user) {
                    $query->whereNull('group_id')
                        ->orWhereIn('group_id', function ($subquery) use ($user) {
                            $subquery->select('group_id')
                                ->from('group_members')
                                ->where('user_id', $user->id);
                        });
                })
                ->withCount(['comments' => function ($query) {
                    $query->whereNull('deleted_at');  // Soft delete untuk comments
                }])
                ->withCount('likes')  // Tidak perlu soft delete untuk likes
                ->with([
                    'user',
                    'media' => function ($query) {
                        $query->orderBy('order', 'asc');
                    },
                    'likedUsers' => function ($query) {
                        $query->limit(3);  // Hapus soft delete untuk likes
                    },
                    'comments' => function ($query) {
                        $query->whereNull('deleted_at')  // Soft delete untuk comments
                            ->with([
                                'user',
                                'likes.user'  // Simplified relation untuk likes
                            ])
                            ->withCount('likes')  // Tidak perlu soft delete untuk likes count
                            ->orderBy('created_at', 'desc');
                    }
                ])
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            // Transform untuk like status
            $posts->through(function ($post) use ($user) {
                $post->is_liked = $post->likes()
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

            // Query stories tetap sama...
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
                ->where('stories.user_id', '!=', $user->id)
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
}
