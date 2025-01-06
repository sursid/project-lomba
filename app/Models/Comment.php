<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'post_id',
        'parent_id',
        'content',
        'image',
        'likes_count'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();

        // Auto-update comments_count di post
        static::created(function ($comment) {
            $comment->post()->increment('comments_count');
        });

        static::deleted(function ($comment) {
            $comment->post()->decrement('comments_count');
        });

        static::restored(function ($comment) {
            $comment->post()->increment('comments_count');
        });
    }

    // Relasi ke user yang membuat comment
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Relasi ke child comments (replies)
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')
            ->whereNull('deleted_at')
            ->with(['user', 'likes']) // Eager load relasi yang sering dipakai
            ->orderBy('created_at', 'desc');
    }

    // Relasi ke parent comment 
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id')
            ->whereNull('deleted_at');
    }

    // Relasi likes (polymorphic)
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    // Relasi ke users yang like comment ini
    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'likes', 'likeable_id', 'user_id')
            ->where('likeable_type', self::class)
            ->withPivot('created_at');
    }

    // Scope untuk comments yang aktif
    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at');
    }

    // Scope untuk parent comments saja
    public function scopeParentOnly($query)
    {
        return $query->whereRaw('parent_id IS NULL');
    }

    // Method untuk mengecek apakah user sudah like
    public function isLikedBy($userId)
    {
        return $this->likes()
            ->where('user_id', $userId)
            ->exists();
    }

    // Method untuk mendapatkan jumlah likes
    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    // Method untuk cek apakah comment ini adalah reply
    public function isReply()
    {
        return !is_null($this->parent_id);
    }

    // Method untuk get semua replies count
    public function getRepliesCountAttribute()
    {
        return $this->replies()->count();
    }
}
