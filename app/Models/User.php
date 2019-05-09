<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $append = [
        'full_name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function subscriptions()
    {
        return $this->hasMany('App\Models\Subscription');
    }
    public function activeSubscription()
    {
        return $this->hasOne('App\Models\Subscription')->where('status',1);
    }
    public function activeOrder()
    {
        return $this->hasOne('App\Models\Order')->where('status','!=',4);
    }
    public function oldOrders()
    {
        return $this->hasMany('App\Models\Order')->where('status',4);
    }



    //getters
    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
}
