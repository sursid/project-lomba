<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    // Field yang bisa diisi mass assignment
    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type'
    ];

    // Polymorphic relationship 
    // Bisa me-like post, comment, dll
    public function likeable()
    {
        return $this->morphTo();
    }

    // Relasi dengan user yang melakukan like
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}