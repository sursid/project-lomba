<?php

namespace App\Http\Controllers\Sosmed;

use App\Models\Post;
use App\Models\PostMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Like;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function toggleLike(Request $request)
    {
        // Validate the request
        $request->validate([
            'post_id' => 'required|exists:posts,id'
        ]);

        // Get the authenticated user
        $user = auth()->user();

        // Find the post
        $post = Post::findOrFail($request->post_id);

        try {
            DB::beginTransaction();

            // Check if user has already liked the post
            $existingLike = Like::where('user_id', $user->id)
                ->where('likeable_id', $post->id)
                ->where('likeable_type', Post::class)
                ->first();

            if ($existingLike) {
                // Unlike the post
                $existingLike->delete();
                $post->decrement('likes_count');

                $message = 'Post unliked successfully';
                $liked = false;
            } else {
                // Like the post
                Like::create([
                    'user_id' => $user->id,
                    'likeable_id' => $post->id,
                    'likeable_type' => Post::class
                ]);
                $post->increment('likes_count');

                $message = 'Post liked successfully';
                $liked = true;
            }

            // Get latest likes for this post
            $likedUsers = Like::where('likeable_type', Post::class)
                ->where('likeable_id', $post->id)
                ->with('user')
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get()
                ->map(function ($like) {
                    return [
                        'avatar' => $like->user->avatar ?? asset('default-avatar.png'),
                        'name' => $like->user->name ?? 'Unknown User'
                    ];
                });

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => $message,
                'liked' => $liked,
                'likes_count' => $post->likes_count,
                'liked_users' => $likedUsers ?? []
            ]);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'success' => false,
                'message' => 'Error processing like: ' . $e->getMessage(),
                'liked_users' => []
            ], 500);
        }
    }

    public function store(Request $request)
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Please login first.'
            ], 401);
        }

        $request->validate([
            'content' => 'required|string', // Hapus max:1000, hanya required dan string
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Masih ada limit untuk ukuran gambar
        ]);

        try {
            DB::beginTransaction();

            // Create post
            $post = Post::create([
                'user_id' => auth()->id(),
                'caption' => $request->content,
                'likes_count' => 0,
                'comments_count' => 0
            ]);

            // Handle multiple images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    // Get file extension
                    $extension = $image->getClientOriginalExtension();

                    // Generate unique filename
                    $filename = 'post_' . time() . '_' . ($index + 1) . '.' . $extension;

                    // Move file to storage
                    $image->move(public_path('/assets/images/post'), $filename);

                    // Create post media record
                    PostMedia::create([
                        'post_id' => $post->id,
                        'type' => 'image',
                        'file_path' => 'assets/images/post/' . $filename,
                        'order' => $index
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Post created successfully',
                'data' => $post
            ]);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'success' => false,
                'message' => 'Error creating post: ' . $e->getMessage()
            ], 500);
        }
    }
}
