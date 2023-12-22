<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'number',
        'image',
        'role_as',
        'password',
        'ballance',
        'activation_points',
        'referral_code',
        'referrer_id',
        'student_id',
        'message',
        'myleads_response',
        'status',
        'last_seen',
        'management_type',
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
    public function referrals()
    {
        return $this->hasMany(User::class, 'referrer_id');
    }

    // public function generateReferralCode()
    // {
    //     $this->referral_code = Str::random(10);
    //     $this->save();
    // }

    public function isReferredBy(User $referrer)
    {
        return $this->referrer_id === $referrer->id;
    }

    public function subadmin()
    {
        return $this->hasOne(Subadmin::class);
        // return $this->hasMany(Subadmin::class);
    }





    public function networks()
    {
        return $this->hasMany(Network::class, 'user_id', 'id');
    }

    public function referredUsers()
    {
        return $this->hasManyThrough(User::class, Network::class, 'parent_id', 'id', 'id', 'user_id');
    }


    public function earnings()
    {
        return $this->hasMany(Earning::class);
    }







    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

}
