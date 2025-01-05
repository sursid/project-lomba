<?php

namespace App\Http\Controllers\Sosmed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Story;
use App\Models\StoryView;
use App\Models\Like;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\PostMedia;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }


    public function index(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Mengambil stories dengan informasi view
        $stories = Story::select([
                'stories.*',
                DB::raw('EXISTS (
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

        // Mengambil posts dengan media, user info, dan like users
        $posts = Post::select('posts.*')
            ->whereNull('posts.deleted_at')
            ->where(function($query) use ($user) {
                $query->whereNull('posts.group_id')
                    ->orWhereIn('posts.group_id', function($subquery) use ($user) {
                        $subquery->select('group_id')
                            ->from('group_members')
                            ->where('user_id', $user->id);
                    });
            })
            ->with([
                'user',
                'media' => function($query) {
                    $query->orderBy('order', 'asc');
                },
                'likedUsers' => function($query) {
                    $query->limit(3); // Batasi 3 avatar pertama
                }
            ])
            ->withCount('likes')
            ->orderBy('posts.created_at', 'desc')
            ->paginate(10);

        // Custom mapping untuk menambahkan informasi like
        $posts->getCollection()->transform(function($post) use ($user) {
            // Cek apakah post sudah di-like oleh user saat ini
            $post->is_liked = $post->likes()
                ->where('user_id', $user->id)
                ->exists();
            
            // Ambil avatar users yang like
            $post->liked_users_avatars = $post->likedUsers->pluck('avatar');
            
            return $post;
        });

        // Record story view jika ada story_id
        if ($request->has('story_id')) {
            $storyId = $request->input('story_id');
            
            $existingView = StoryView::where('story_id', $storyId)
                ->where('viewer_id', $user->id)
                ->first();

            if (!$existingView) {
                StoryView::create([
                    'story_id' => $storyId,
                    'viewer_id' => $user->id,
                    'viewed_at' => now(),
                ]);
            }
        }

        // Jika request adalah AJAX, return partial view untuk infinite scroll
        if ($request->ajax()) {
            return view('components.sosmed.partials.posts', compact('posts'));
        }

        return view('components.sosmed.index', [
            'user' => $user,
            'stories' => $stories,
            'posts' => $posts
        ]);
    }
}