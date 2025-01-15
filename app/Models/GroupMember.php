<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'user_id',
        'role',
        'status',
        'joined_at'
    ];

    protected $casts = [
        'joined_at' => 'datetime',
        'role' => 'string',
        'status' => 'string'
    ];

    // Set default values
    protected $attributes = [
        'role' => 'member',
        'status' => 'pending'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
