<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
<<<<<<< HEAD

=======
>>>>>>> d490acbae65447539d45c8e02aae1d2bd30761e9

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
<<<<<<< HEAD

=======
>>>>>>> d490acbae65447539d45c8e02aae1d2bd30761e9

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function getJWTIdentifier()
{
return $this->getKey();
}

public function getJWTCustomClaims()
{
return [];
}

}
