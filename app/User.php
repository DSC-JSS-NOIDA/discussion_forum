<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'username', 'email', 'password', 'status', 'admin',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
