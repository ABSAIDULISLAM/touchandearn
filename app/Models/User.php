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
use Illuminate\Database\Eloquent\Model;


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
        'freeze_points',
        'withdraw',
        'referral_code',
        'referrer_id',
        'student_id',
        'message',
        'wp_message',
        'myleads_response',
        'subadmintype_id',
        'status',
        'points_distributed',
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


    public function networks()
    {
        return $this->hasMany(Network::class, 'user_id', 'id');
    }

    public function referredUsers()
    {
        return $this->hasManyThrough(User::class, Network::class, 'parent_id', 'id', 'user_id', 'id');
    }

    // earnings ber korar jonno
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






    // for referrar infos too
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }


    public function distributePoints()
    {
        if ($this->status == 'active' && !$this->points_distributed) {
            // Points distribution logic based on roles
            switch ($this->role_as) {
                case 'member':
                    $this->distributeMemberPoints();
                    break;
                // Add other cases for different roles
            }
            $this->update(['points_distributed' => true]);
        }
    }

    protected function distributeMemberPoints()
    {
        // Points distribution logic for member role
        $referrer = $this->referrer;

        if ($referrer) {
            Earning::create([
                'user_id' => $referrer->id,
                'amount' => 500, // Referrer gets 500 points
            ]);

            Earning::create([
                'user_id' => $referrer->counselor_id,
                'amount' => 250, // Referrer gets 250 points
            ]);
            Earning::create([
                'user_id' => $referrer->teamleader_id,
                'amount' => 150, // Referrer gets 150 points
            ]);

        }

    }




}
