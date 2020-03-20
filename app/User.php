<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Passport\HasApiTokens;

use\Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens ,Notifiable;

    const ADMIN = 1;
    const REGULAR_USER = 0;

    const VERIFIED_USER = 1;
    const UNVERIFIED_USER = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'verified',
        'verification_token',
        'admin',
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

    public static function generateToken()
    {
        return Str::random(40);
    }

    public function setNameAttribute($name){
        $this->attributes['name'] = strtolower($name);
    }
    public function getNameAttribute($name){
        return ucwords($name);
    }   
    public function setEmailAttribute($name){
        $this->attributes['email'] = strtolower($name);
    }
}
