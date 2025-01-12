<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'bio',
        'avatar',
        'cover_photo',
        'location',
        'role',
        'is_verified',
        'password',
        'is_active',
        'last_active_at',
        'google_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_active_at' => 'datetime',
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
        'followers_count' => 'integer',
        'following_count' => 'integer',
        'posts_count' => 'integer'
    ];

    /**
     * Relasi dengan posts
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Relasi dengan comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Relasi dengan likes
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Relasi dengan products (marketplace)
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Relasi dengan groups yang dibuat user
     */
    public function createdGroups()
    {
        return $this->hasMany(Group::class, 'creator_id');
    }

    /**
     * Relasi dengan group memberships
     */
    public function groupMemberships()
    {
        return $this->hasMany(GroupMember::class);
    }

    /**
     * Relasi dengan followers
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id');
    }

    /**
     * Relasi dengan following
     */
    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id');
    }

    /**
     * Cek apakah user diblokir
     */
    public function isBlocked(User $user)
    {
        return Block::where('user_id', $this->id)
            ->where('blocked_user_id', $user->id)
            ->exists();
    }

    /**
     * Cek apakah user adalah admin
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function blockedUsers()
    {
        return $this->belongsToMany(User::class, 'blocks', 'user_id', 'blocked_user_id')
            ->withPivot('reason');
    }

    public function savedPosts()
    {
        return $this->hasMany(SavedPost::class);
    }

    // User.php
    public function friendships()
    {
        return $this->hasMany(Friendship::class, 'user_id');
    }

    public function friendRequests()
    {
        return $this->hasMany(Friendship::class, 'friend_id');
    }
}
