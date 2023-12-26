<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id', 'id');
    }

    public function usertwo()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    // refer id
    public function refereduser()
    {
        return $this->hasOne(User::class, 'id', 'parent_id');
    }
}
