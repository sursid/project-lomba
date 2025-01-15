<?php

namespace App\Http\Controllers\Sosmed;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Block;
use App\Models\Friendship;
use App\Models\Story;
use App\Models\User;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return redirect()->route('login');
            }

            // Get blocked users
            $blockedUserIds = Block::where(function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhere('blocked_user_id', $user->id);
            })
                ->get()
                ->map(function ($block) use ($user) {
                    return $block->user_id == $user->id ? $block->blocked_user_id : $block->user_id;
                })
                ->unique();

            // Get friend IDs
            $existingFriendIds = Friendship::where(function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhere('friend_id', $user->id);
            })->where('status', 'accepted')
                ->get()
                ->map(function ($friendship) use ($user) {
                    return $friendship->user_id == $user->id ? $friendship->friend_id : $friendship->user_id;
                });

            // Get stories
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

            // Get conversations
            $conversations = Conversation::where(function ($query) use ($user) {
                $query->where('user1_id', $user->id)
                    ->orWhere('user2_id', $user->id);
            })
                ->with(['user1', 'user2', 'messages' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }])
                ->get();

            // Get notifications
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

            // Get events data
            $events = Event::with('creator')
                ->where('status', 'active')
                ->orderBy('start_date', 'asc')
                ->paginate(9);

            return view('components.sosmed.event', compact(
                'events',
                'stories',
                'suggestions',
                'conversations',
                'notifications',
                'unreadCount'
            ));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function registerForEvent(Request $request)
    {
        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'nullable|in:pending,approved,rejected,cancelled',
        ]);

        // Menyimpan data event_registration tanpa 'notes'
        $eventRegistration = new EventRegistration();
        $eventRegistration->event_id = $validated['event_id'];
        $eventRegistration->user_id = $validated['user_id'];
        $eventRegistration->status = $validated['status'] ?? 'pending';
        $eventRegistration->save();

        return response()->json([
            'message' => 'Event registration successfully created.',
            'data' => $eventRegistration
        ], 201);
    }


    public function show($event_id)
    {
        // Mencari event berdasarkan event_id
        $event = Event::findOrFail($event_id);

        try {
            $user = Auth::user();

            if (!$user) {
                return redirect()->route('login');
            }

            // Get blocked users
            $blockedUserIds = Block::where(function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhere('blocked_user_id', $user->id);
            })
                ->get()
                ->map(function ($block) use ($user) {
                    return $block->user_id == $user->id ? $block->blocked_user_id : $block->user_id;
                })
                ->unique();

            // Get friend IDs
            $existingFriendIds = Friendship::where(function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhere('friend_id', $user->id);
            })
                ->where('status', 'accepted')
                ->get()
                ->map(function ($friendship) use ($user) {
                    return $friendship->user_id == $user->id ? $friendship->friend_id : $friendship->user_id;
                });

            // Get stories
            $stories = Story::select([
                'stories.*',
                DB::raw('EXISTS (SELECT 1 FROM story_views WHERE story_views.story_id = stories.id AND story_views.viewer_id = ?) as is_viewed')
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

            // Get conversations
            $conversations = Conversation::where(function ($query) use ($user) {
                $query->where('user1_id', $user->id)
                    ->orWhere('user2_id', $user->id);
            })
                ->with(['user1', 'user2', 'messages' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }])
                ->get();

            // Get notifications
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

            // Mengambil event hanya 1 berdasarkan event_id
            $event = Event::with('creator')->findOrFail($event_id);  // Pastikan menggunakan findOrFail untuk menangani error jika event tidak ditemukan

            // Mengirimkan data event ke view
            return view('components.sosmed.event-details', compact('event', 'user', 'stories', 'suggestions', 'conversations', 'notifications', 'unreadCount'));
        } catch (\Exception $e) {
            // Tangani error
            return redirect()->back()->withInput()->withErrors(['message' => 'Event ID invalid']);
        }
    }
}
