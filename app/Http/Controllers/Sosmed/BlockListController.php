<?php

namespace App\Http\Controllers\Sosmed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Story;
use App\Models\Block;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Conversation;

class BlockListController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return redirect()->route('login');
            }

            // Get blocked users
            $blockedUsers = User::whereIn('id', function ($query) use ($user) {
                $query->select('blocked_user_id')
                    ->from('blocks')
                    ->where('user_id', $user->id);
            })->get();

            // Stories and other common elements
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
                ->whereNotIn('stories.user_id', $blockedUsers->pluck('id'))
                ->where(function ($query) {
                    $query->whereNull('stories.expires_at')
                        ->orWhere('stories.expires_at', '>', now());
                })
                ->orderBy('is_viewed', 'asc')
                ->orderBy('stories.created_at', 'desc')
                ->with(['user'])
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

            $unreadCount = DB::table('notifications')
                ->where('user_id', $user->id)
                ->where('is_read', 0)
                ->count();

            return view('components.sosmed.block-list', compact('user', 'stories', 'blockedUsers', 'notifications', 'unreadCount', 'conversations'));
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

    public function remove(Request $request, $blockedUserId)
    {
        try {
            $user = Auth::user();

            // Find and delete the block record
            $deleted = Block::where('user_id', $user->id)
                ->where('blocked_user_id', $blockedUserId)
                ->delete();

            // Check if deletion was successful
            if ($deleted) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Blocked user removed successfully'
                ]);
            }

            // Block record not found
            return response()->json([
                'status' => 'error',
                'message' => 'Block record not found'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error in remove method:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while removing the blocked user'
            ], 500);
        }
    }
}
