<?php

namespace App\Http\Controllers\Sosmed;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Block;
use App\Models\Friendship;
use App\Models\Story;
use App\Models\User;
use App\Models\Conversation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Group;
use App\Models\GroupMember;

class GroupController extends Controller
{
    // Function untuk menampilkan halaman index grup
    public function index(Request $request)
    {
        try {
            // Mendapatkan user yang sedang login
            $user = Auth::user();

            // Jika user belum login, redirect ke halaman login
            if (!$user) {
                return redirect()->route('login');
            }

            // Mendapatkan ID pengguna yang diblokir oleh user
            $blockedUserIds = Block::where(function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhere('blocked_user_id', $user->id);
            })
                ->get()
                ->map(function ($block) use ($user) {
                    return $block->user_id == $user->id ? $block->blocked_user_id : $block->user_id;
                })
                ->unique();

            // Mendapatkan ID teman yang sudah diterima dan permintaan teman yang pending
            $existingFriendIds = Friendship::where(function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhere('friend_id', $user->id);
            })->where('status', 'accepted')
                ->get()
                ->map(function ($friendship) use ($user) {
                    return $friendship->user_id == $user->id ? $friendship->friend_id : $friendship->user_id;
                });

            // Mengambil stories yang tidak diblokir oleh user dan masih aktif
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

            // Mengambil user yang disarankan (tidak teman dan tidak diblokir)
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

            // Mengambil percakapan dengan user
            $conversations = Conversation::where(function ($query) use ($user) {
                $query->where('user1_id', $user->id)
                    ->orWhere('user2_id', $user->id);
            })
                ->with(['user1', 'user2', 'messages' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }])
                ->get();

            // Mengambil notifikasi yang belum dibaca
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

            // Menghitung jumlah notifikasi yang belum dibaca
            $unreadCount = DB::table('notifications')
                ->where('user_id', $user->id)
                ->where('is_read', 0)
                ->count();

            // Menampilkan view dengan data yang sudah diambil
            return view('components.sosmed.group', compact('user', 'stories', 'suggestions', 'notifications', 'unreadCount', 'conversations'));
        } catch (\Exception $e) {
            // Menangani kesalahan dan mencatatnya di log
            Log::error('Error in index method:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            // Jika permintaan AJAX, kembalikan response error
            if ($request->ajax()) {
                return response()->json([
                    'error' => 'Terjadi kesalahan saat memuat data'
                ], 500);
            }
        }
    }

    public function join(Request $request)
    {
        try {
            // Konversi user_id dan group_id menjadi integer  
            $userId = (int) $request->user_id;
            $groupId = (int) $request->group_id;

            // Validasi input
            $validator = Validator::make($request->all(), [
                'user_id' => 'required|integer|exists:users,id',
                'group_id' => 'required|integer|exists:groups,id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => 'Validation failed',
                    'messages' => $validator->errors(),
                ], 400);
            }

            $user = Auth::user();

            if ($user->id !== $userId) {
                return response()->json([
                    'error' => 'User ID does not match the authenticated user',
                ], 403);
            }

            $group = Group::findOrFail($groupId);

            $existingMember = GroupMember::where([
                'group_id' => $groupId,
                'user_id' => $user->id
            ])->first();

            if ($existingMember) {
                return response()->json([
                    'message' => 'Anda sudah bergabung dengan grup ini.',
                    'status' => $existingMember->status
                ], 200);
            }

            // Buat record baru dengan DB::raw untuk nilai enum
            $member = new GroupMember();
            $member->group_id = $groupId;
            $member->user_id = $user->id;
            $member->role = 'member';
            $member->status = 'pending';
            $member->joined_at = now();
            $member->save();

            return response()->json([
                'message' => 'Permintaan bergabung dengan grup telah dikirim.',
                'group' => $group,
                'member_status' => $member->status
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error joining group:', [
                'error' => $e->getMessage(),
                'user_id' => $user->id ?? null,
                'group_id' => $groupId ?? null,
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'error' => 'Gagal bergabung dengan grup',
                'details' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    public function show(Request $request)
    {
        try {
            // Mendapatkan user yang sedang login
            $user = Auth::user();

            // Jika user belum login, redirect ke halaman login
            if (!$user) {
                return redirect()->route('login');
            }

            // Mendapatkan ID pengguna yang diblokir oleh user
            $blockedUserIds = Block::where(function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhere('blocked_user_id', $user->id);
            })
                ->get()
                ->map(function ($block) use ($user) {
                    return $block->user_id == $user->id ? $block->blocked_user_id : $block->user_id;
                })
                ->unique();

            // Mendapatkan ID teman yang sudah diterima dan permintaan teman yang pending
            $existingFriendIds = Friendship::where(function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhere('friend_id', $user->id);
            })->where('status', 'accepted')
                ->get()
                ->map(function ($friendship) use ($user) {
                    return $friendship->user_id == $user->id ? $friendship->friend_id : $friendship->user_id;
                });

            // Mengambil stories yang tidak diblokir oleh user dan masih aktif
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

            // Mengambil user yang disarankan (tidak teman dan tidak diblokir)
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

            // Mengambil percakapan dengan user
            $conversations = Conversation::where(function ($query) use ($user) {
                $query->where('user1_id', $user->id)
                    ->orWhere('user2_id', $user->id);
            })
                ->with(['user1', 'user2', 'messages' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                }])
                ->get();

            // Mengambil notifikasi yang belum dibaca
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

            // Menghitung jumlah notifikasi yang belum dibaca
            $unreadCount = DB::table('notifications')
                ->where('user_id', $user->id)
                ->where('is_read', 0)
                ->count();

            // Menampilkan view dengan data yang sudah diambil
            return view('components.sosmed.group-details', compact('user', 'stories', 'suggestions', 'notifications', 'unreadCount', 'conversations'));
        } catch (\Exception $e) {
            // Menangani kesalahan dan mencatatnya di log
            Log::error('Error in index method:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            // Jika permintaan AJAX, kembalikan response error
            if ($request->ajax()) {
                return response()->json([
                    'error' => 'Terjadi kesalahan saat memuat data'
                ], 500);
            }
        }
    }
}
