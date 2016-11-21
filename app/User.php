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
    public function setEmailAttribute($value){
        $this->attributes['email'] = strtolower($value);
    }

    public function getName(){
        if($this->firstname & $this->lastname){
            return "{$this->firstname} {$this->lastname}";
        }
        if($this->firstname){
            return $this->firstname;
        }
        return null;
    }

    public function getNameOrUsername(){
        return $this->getName() ?: $this->username;
    }

    public function getFirstNameOrUsername(){
        return $this->firstname ?: $this->username;
    }

}
