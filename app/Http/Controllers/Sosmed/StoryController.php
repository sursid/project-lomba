<?php

namespace App\Http\Controllers\Sosmed;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\StoryView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class StoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stories = Story::with(['user', 'views'])
            ->where('is_active', true)
            ->where('expires_at', '>', now())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('stories.index', compact('stories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'media' => 'required|file|mimes:jpg,jpeg,png,mp4|max:10240',
            'caption' => 'nullable|string|max:500',
            'type' => 'required|in:image,video',
        ]);

        try {
            $file = $request->file('media');
            $path = $file->store('stories', 'public');

            $story = Story::create([
                'user_id' => Auth::id(),
                'type' => $request->type,
                'media_path' => $path,
                'caption' => $request->caption,
                'is_active' => true,
                'expires_at' => now()->addHours(24)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Story berhasil dibuat',
                'story' => $story->load('user')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupload story: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show(Story $story)
    {
        if (!$story->is_active || $story->isExpired()) {
            return response()->json([
                'success' => false,
                'message' => 'Story tidak tersedia'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'story' => $story->load(['user', 'views'])
        ]);
    }

    public function recordView(Request $request)
    {
        $request->validate([
            'story_id' => 'required|exists:stories,id'
        ]);

        try {
            // Check if the user is authenticated
            if (!Auth::check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            $existingView = StoryView::where('story_id', $request->story_id)
                ->where('viewer_id', Auth::id())
                ->first();

            if (!$existingView) {
                StoryView::create([
                    'story_id' => $request->story_id,
                    'viewer_id' => Auth::id(),
                    'viewed_at' => now()
                ]);
            }

            $viewCount = StoryView::where('story_id', $request->story_id)->count();

            return response()->json([
                'success' => true,
                'viewCount' => $viewCount
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to record view: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getViewers(Story $story)
    {
        $viewers = $story->viewers()
            ->orderBy('story_views.created_at', 'desc')
            ->get()
            ->map(function ($viewer) {
                return [
                    'id' => $viewer->id,
                    'name' => $viewer->name,
                    'avatar' => $viewer->avatar,
                    'viewed_at' => Carbon::parse($viewer->pivot->viewed_at)->diffForHumans()
                ];
            });

        return response()->json($viewers);
    }

    public function destroy(Story $story)
    {
        if ($story->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        try {
            if (Storage::disk('public')->exists($story->media_path)) {
                Storage::disk('public')->delete($story->media_path);
            }

            $story->delete();

            return response()->json([
                'success' => true,
                'message' => 'Story berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus story: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateStatus(Story $story, Request $request)
    {
        if ($story->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $request->validate([
            'is_active' => 'required|boolean'
        ]);

        try {
            $story->update([
                'is_active' => $request->is_active
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Status story berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupdate status: ' . $e->getMessage()
            ], 500);
        }
    }
}
