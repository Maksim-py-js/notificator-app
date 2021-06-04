<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use App\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject //, MustVerifyEmail
{
    use Notifiable,
        HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'cell_phone_number',
        'office_phone_number',

        'work_place',
        'job',
        'department_name',

        'tasks',
        'numbers',
        'notifications',

        'sms',
        'moderator_index',

        'status',
        'role',

        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the oauth providers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function oauthProviders()
    {
        return $this->hasMany(OAuthProvider::class);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * @return int
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function workplace() {
        return $this->belongsTo('App\Models\Workplace', 'workplace');
    }
    public function job() {
        return $this->belongsTo('App\Models\Job', 'job');
    }
    public function groups() {
        return $this->hasMany('App\Models\GroupUser', 'user');
    }
    public function tasks() {
        return $this->hasMany('App\Models\TaskWorkplaceUser', 'user');
    }
    public function shipping_times() {
        return $this->hasMany('App\Models\ShippingTime', 'user');
    }
}
