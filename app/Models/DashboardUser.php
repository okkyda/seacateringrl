<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DashboardUser extends Model
{
    protected $fillable = [
        'user_id', 'phone', 'email', 'profile_picture'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
