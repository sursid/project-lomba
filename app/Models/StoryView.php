<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoryView extends Model
{
    protected $fillable = [
        'story_id',
        'viewer_id',
        'viewed_at'
    ];

    protected $dates = ['viewed_at'];

    // Relasi ke Story
    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    // Relasi ke User (viewer)
    public function viewer()
    {
        return $this->belongsTo(User::class, 'viewer_id');
    }

    // Scope untuk mengambil view terbaru
    public function scopeRecent($query)
    {
        return $query->orderBy('viewed_at', 'desc');
    }

    // Method untuk mengecek apakah user sudah melihat story
    public static function hasViewed($storyId, $userId)
    {
        return static::where('story_id', $storyId)
                    ->where('viewer_id', $userId)
                    ->exists();
    }

    // Method untuk mencatat view baru
    public static function recordView($storyId, $userId)
    {
        return static::create([
            'story_id' => $storyId,
            'viewer_id' => $userId,
            'viewed_at' => now()
        ]);
    }

    // Method untuk mendapatkan jumlah view dalam 24 jam terakhir
    public function getRecentViewsCount()
    {
        return $this->where('viewed_at', '>=', now()->subHours(24))->count();
    }
}