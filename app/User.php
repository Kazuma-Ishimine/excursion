<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // Commentに対するリレーション
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    // Likeに対するリレーション
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    
    // IdentityProviderに対するリレーション
    public function IdentityProviders()
    {
        return $this->hasMany('App\IdentityProvider');
    }
}
