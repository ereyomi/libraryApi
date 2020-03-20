<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    //protected $table = 'users';

    use Notifiable;


    const ADMIN = 1;
    const REGULAR_USER = 0;
    const LIBRARIAN = 2;
    const STUDENT = 3;

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
        'password', 'remember_token', 'verification_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin() 
    {
        return $this->admin = User::ADMIN;
    }

    public function isVerified() 
    {
        return $this->verify = User::VERIFIED_USER;
    }

    public static function generateToken()
    {
        return str_random(40);
    }
}
