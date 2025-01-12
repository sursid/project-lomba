<?php

namespace App\Http\Controllers\Sosmed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Story;
use App\Models\Block;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Friendship;
use App\Models\Conversation;

class SuggestionsController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return redirect()->route('login');
            }

            // Get IDs of blocked users
            $blockedUserIds = Block::where(function ($query) use ($user) {
                $query->where('user_id', $user->id)  
                    ->orWhere('blocked_user_id', $user->id);  
            })
                ->get()
                ->map(function ($block) use ($user) {
                    return $block->user_id == $user->id ? $block->blocked_user_id : $block->user_id;
                })
                ->unique();

            // Get IDs of existing friends and pending friend requests
            $existingFriendIds = Friendship::where(function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhere('friend_id', $user->id);
            })->where('status', 'accepted')
              ->get()
              ->map(function ($friendship) use ($user) {
                  return $friendship->user_id == $user->id ? $friendship->friend_id : $friendship->user_id;
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
                ->whereNotIn('stories.user_id', $blockedUserIds)
                ->where(function ($query) {
                    $query->whereNull('stories.expires_at')
                        ->orWhere('stories.expires_at', '>', now());
                })
                ->orderBy('is_viewed', 'asc')
                ->orderBy('stories.created_at', 'desc')
                ->with(['user'])
                ->get();

            // Get suggested users
            $suggestions = User::where('id', '!=', $user->id)
                ->whereNotIn('id', $existingFriendIds)
                ->whereNotIn('id', $blockedUserIds)
                ->withCount(['friendships as mutual_friends_count' => function ($query) use ($user) {
                    $query->where('status', 'accepted')
                        ->whereIn('friend_id', function ($subquery) use ($user) {
                            $subquery->select('friend_id')
                                ->from('friendships')
                                ->where('user_id', $user->id)
                                ->where('status', 'accepted');
                        });
                }])
                ->orderBy('mutual_friends_count', 'desc')
                ->limit(10)
                ->get();

            $conversations = Conversation::where(function ($query) use ($user) {
                $query->where('user1_id', $user->id)
                    ->orWhere('user2_id', $user->id);
            })
                ->with(['user1', 'user2', 'messages' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }])
                ->get();

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

            return view('components.sosmed.suggestions', compact('user', 'stories', 'suggestions', 'notifications', 'unreadCount', 'conversations'));
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
}