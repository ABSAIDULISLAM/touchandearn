<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subadmin extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subadmintype()
    {
        return $this->belongsTo(SubadminType::class, 'subadmintype_id');
    }

    public function managementType()
    {
        return $this->belongsTo(Management::class, 'managment_id');
    }

}
