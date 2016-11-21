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
        'first_name',
        'last_name',
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
        if($this->first_name & $this->last_name){
            return "{$this->first_name} {$this->last_name}";
        }
        if($this->firstname){
            return $this->first_name;
        }
        return null;
    }

    public function getNameOrUsername(){
        return $this->getName() ?: $this->username;
    }

    public function getFirstNameOrUsername(){
        return $this->first_name ?: $this->username;
    }

    public function getAvatar(){
        return "https://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm&s=60";
    }

}
