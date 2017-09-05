<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'role_id', 'email', 'password', 'provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getIsAdminAttribute()
    {
        if (auth()->user()->role_id === 2) {
            return true;
        }
        return false;
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function testimonials()
    {
        return $this->hasMany('App\Testimonial');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function deposits()
    {
        return $this->hasMany('App\Deposit');
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function Beneficiaries()
    {
        return $this->hasMany('App\Beneficiaries');
    }

    public function supports()
    {
        return $this->hasMany('App\Support');
    }

    public function threads()
    {
        return $this->hasMany('App\Thread');
    }

}
