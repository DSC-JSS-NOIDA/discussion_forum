<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'username', 'email', 'image', 'status', 'admin',
    ];

    protected $hidden = [
         'remember_token',
    ];
    protected $primaryKey = 'user_id';
}
