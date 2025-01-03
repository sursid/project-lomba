<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Story extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'media_path',
        'caption',
        'is_active',
        'expires_at'
    ];

    protected $dates = ['expires_at'];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi untuk views
    public function views()
    {
        return $this->hasMany(StoryView::class);
    }

    // Relasi many-to-many untuk viewers
    public function viewers()
    {
        return $this->belongsToMany(User::class, 'story_views', 'story_id', 'viewer_id')
                    ->withTimestamps();
    }

    // Method untuk menghitung jumlah views
    public function viewCount()
    {
        return $this->views()->count();
    }

    // Scope untuk story aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where('expires_at', '>', now());
    }

    // Method untuk memeriksa apakah story sudah kedaluwarsa
    public function isExpired()
    {
        return $this->expires_at < now();
    }

    // Method untuk set expired
    public function setExpired()
    {
        $this->is_active = false;
        $this->save();
    }

    // Setter untuk media path dengan validasi
    public function setMediaPathAttribute($value)
    {
        $this->attributes['media_path'] = $value;
        $this->attributes['expires_at'] = now()->addHours(24); // Story berlaku 24 jam
    }
}