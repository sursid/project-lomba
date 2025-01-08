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
            'content' => 'required|string',
            'files.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,mkv,avi|max:102400' // 100MB limit
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

            // Handle files (images and videos)
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $index => $file) {
                    // Get file extension and mime type
                    $extension = $file->getClientOriginalExtension();
                    $mimeType = $file->getMimeType();

                    // Determine file type
                    $type = str_starts_with($mimeType, 'video/') ? 'video' : 'image';

                    // Generate unique filename
                    $filename = $type . '_' . time() . '_' . ($index + 1) . '.' . $extension;

                    // Set appropriate storage path based on type
                    $storagePath = $type === 'video' ? 'assets/videos/post' : 'assets/images/post';

                    // Create directory if it doesn't exist
                    if (!file_exists(public_path($storagePath))) {
                        mkdir(public_path($storagePath), 0755, true);
                    }

                    // Move file to storage
                    $file->move(public_path($storagePath), $filename);

                    // Create post media record
                    PostMedia::create([
                        'post_id' => $post->id,
                        'type' => $type,
                        'file_path' => $storagePath . '/' . $filename,
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

            // Delete any uploaded files if error occurs
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $path = public_path($file->getFilename());
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }

            return response()->json([
                'success' => false,
                'message' => 'Error creating post: ' . $e->getMessage()
            ], 500);
        }
    }
}
