<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'username',
        'email',
        'password',
        'firstname',
        'lastname',
        'location'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];
    public function setUsernameAttribute($value){
        $this->attributes['username'] = ucfirst($value);
    }

}
