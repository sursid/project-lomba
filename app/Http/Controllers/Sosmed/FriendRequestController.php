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
use App\Models\Friendship;
use App\Models\Notification;
use App\Models\Conversation;

class FriendRequestController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return redirect()->route('login');
            }

            $pendingRequests = Friendship::where('friend_id', $user->id)
                ->where('status', 'pending')
                ->with(['user' => function ($query) use ($user) {
                    $query->withCount(['friendships as mutual_friends_count' => function ($query) use ($user) {
                        $query->where('status', 'accepted')
                            ->whereIn('friend_id', function ($query) use ($user) {
                                $query->select('friend_id')
                                    ->from('friendships')
                                    ->where('user_id', $user->id)
                                    ->where('status', 'accepted');
                            });
                    }]);
                }])
                ->get();

            $conversations = Conversation::where(function ($query) use ($user) {
                $query->where('user1_id', $user->id)
                    ->orWhere('user2_id', $user->id);
            })
                ->with(['user1', 'user2', 'messages' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }])
                ->get();

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

            $notifications = DB::table('notifications')
                ->select([
                    'notifications.*',
                    'users.name as from_user_name',
                    'users.avatar as from_user_avatar'
                ])
                ->leftJoin('users', 'users.id', '=', 'notifications.from_user_id')
                ->where('notifications.user_id', $user->id)
                ->orderBy('notifications.created_at', 'desc')
                ->limit(5)
                ->get();

            // Get unread notifications count
            $unreadCount = DB::table('notifications')
                ->where('user_id', $user->id)
                ->where('is_read', 0)
                ->count();

            return view('components.sosmed.friend-request', compact('user', 'stories', 'posts', 'notifications', 'unreadCount', 'conversations', 'pendingRequests'));
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
    public function respondToRequest(Request $request, $friendshipId)
    {
        try {
            $action = $request->input('action');

            $request->validate([
                'action' => 'required|in:accept,reject'
            ]);

            $user = Auth::user();

            $friendship = Friendship::where('id', $friendshipId)
                ->where('friend_id', $user->id)
                ->where('status', 'pending')
                ->firstOrFail();

            if ($action === 'accept') {
                // Langsung update status existing friendship
                $friendship->update([
                    'status' => 'accepted'
                ]);

                // Buat notification dengan notifiable_type dan notifiable_id
                Notification::create([
                    'user_id' => $friendship->user_id, // Pengirim request awal
                    'from_user_id' => $user->id, // User yang menerima request
                    'type' => 'friend_accepted',
                    'message' => $user->name . ' accepted your friend request',
                    'notifiable_type' => User::class, // Tambahkan ini
                    'notifiable_id' => $friendship->user_id, // Tambahkan ini
                    'is_read' => false // Tambahkan ini jika diperlukan
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Friend request accepted successfully'
                ]);
            } else {
                // Update status menjadi rejected
                $friendship->update([
                    'status' => 'rejected'
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Friend request rejected successfully'
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Friend request error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to process friend request'
            ], 500);
        }
    }
}
