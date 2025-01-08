<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = ['user_id', 'blocked_user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blockedUsers()
    {
        return $this->belongsToMany(User::class, 'blocks', 'user_id', 'blocked_user_id')
            ->withPivot('reason');
    }
}
