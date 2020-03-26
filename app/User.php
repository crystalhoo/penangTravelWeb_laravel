<?php

namespace App;

use Laravel\Passport\HasApiTokens; //for passport token authentication
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
<<<<<<< HEAD
    use HasApiTokens,Notifiable;
=======
    use Notifiable;

>>>>>>> 635509b859a98e2df48f6cf5fb79fb761f6f9e13
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
