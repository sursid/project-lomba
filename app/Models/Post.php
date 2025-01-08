<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'caption',
        'group_id',
        'likes_count',
        'comments_count'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            // Soft delete semua comments ketika post di-delete
            $post->comments()->delete();
        });

        static::restored(function ($post) {
            // Restore comments ketika post di-restore
            $post->comments()->onlyTrashed()->restore();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function media()
    {
        return $this->hasMany(PostMedia::class)->orderBy('order');
    }

    // Relasi comments untuk parent comments saja
    public function comments()
    {
        return $this->hasMany(Comment::class)
            ->whereNull('deleted_at')
            ->whereRaw('parent_id IS NULL')  // Mengambil parent comments saja
            ->orderBy('created_at', 'desc')
            ->with(['user', 'replies.user', 'likes']); // Pre-load relasi yang diperlukan
    }

    // Relasi untuk semua comments termasuk replies
    public function allComments()
    {
        return $this->hasMany(Comment::class)
            ->whereNull('deleted_at');
    }

    // Relasi likes (polymorphic)
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'likes', 'likeable_id', 'user_id')
            ->where('likeable_type', self::class)
            ->withPivot('created_at');
    }

    // Query scope untuk post dengan comments dan likes count
    public function scopeWithCommentsAndLikes($query)
    {
        return $query->withCount(['comments' => function ($query) {
            $query->whereNull('deleted_at');
        }])
            ->withCount('likes');
    }

    // Query scope untuk post aktif
    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at');
    }

    // Helper method untuk cek apakah user sudah like post ini
    public function isLikedBy($userId)
    {
        return $this->likes()
            ->where('user_id', $userId)
            ->exists();
    }

    // Helper method untuk get likes count
    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    // Helper method untuk get comments count (termasuk replies)
    public function getCommentsCountAttribute()
    {
        return $this->allComments()->count();
    }
    // Di model Post
    public function saves()
    {
        return $this->hasMany(SavedPost::class);
    }
}
