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
use App\Models\Cart;
use App\Models\Product;

class MarketplaceController extends Controller
{
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
            return view('components.sosmed.marketplace', compact('user', 'stories', 'suggestions', 'notifications', 'unreadCount', 'conversations'));
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

    public function detail(Request $request)
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
            return view('components.sosmed.marketplace-details', compact('user', 'stories', 'suggestions', 'notifications', 'unreadCount', 'conversations'));
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

    public function addToCart(Request $request)
    {
        try {
            // Mendapatkan user yang sedang login
            $user = Auth::user();
            
            // Cek apakah user sudah login
            if (!$user) {
                return redirect()->route('login');
            }

            // Validasi data yang diterima
            $validated = $request->validate([
                'product_id' => 'required|exists:products,id',  // Pastikan produk ada di database
                'quantity' => 'required|integer|min:1',  // Pastikan kuantitas valid
            ]);

            // Ambil produk berdasarkan ID
            $product = Product::find($validated['product_id']);

            // Cek apakah produk ditemukan
            if (!$product) {
                return response()->json(['error' => 'Produk tidak ditemukan.'], 404);
            }

            // Periksa apakah produk sudah ada di keranjang
            $existingCart = Cart::where('user_id', $user->id)
                                ->where('product_id', $validated['product_id'])
                                ->first();

            if ($existingCart) {
                // Jika sudah ada, update kuantitas
                $existingCart->quantity += $validated['quantity'];
                $existingCart->save();
            } else {
                // Jika belum ada, buat entry baru di keranjang
                Cart::create([
                    'user_id' => $user->id,
                    'product_id' => $validated['product_id'],
                    'quantity' => $validated['quantity'],
                    'price' => $product->price,  // Harga produk
                ]);
            }

            return response()->json(['message' => 'Produk berhasil ditambahkan ke keranjang.'], 200);

        } catch (\Exception $e) {
            // Menangani error dan mencatatnya
            return response()->json(['error' => 'Terjadi kesalahan.'], 500);
        }
    }
}
