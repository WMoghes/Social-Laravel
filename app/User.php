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

    public function getUsernameAttribute($value){
        return strtolower($value);
    }

    public function setFirstnameAttribute($first_name){
        $this->attributes['first_name'] = ucfirst($first_name);
    }

    public function getFirstnameAttribute($first_name){
        return ucfirst($first_name);
    }

    public function setLastnameAttribute($last_name){
        $this->attributes['last_name'] = ucfirst($last_name);
    }

    public function getLastnameAttribute($lastname){
        return ucfirst($lastname);
    }

    public function setLocaionAttribute($location){
        $this->attributes['location'] = ucfirst($location);
    }

    public function getLocationAttribute($location){
        return ucfirst($location);
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

    public function friendsOfMine()
    {
        return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
    }

    public function friendsOf()
    {
        return $this->belongsToMany('App\User', 'friends', 'friend_id', 'user_id');
    }

    public function friends()
    {
        return $this->friendsOfMine()->wherePivot('accepted', true)->get()->
                merge($this->friendsOf()->wherePivot('accepted', true)->get());
    }

    public function friendRequests()
    {
        return $this->friendsOfMine()->wherePivot('accepted', false)->get();
    }

    public function friendRequestsPending()
    {
        return $this->friendsOf()->wherePivot('accepted', false)->get();
    }

    public function hasFriendRequestPending(User $user)
    {
        return (bool) $this->friendRequestsPending()->where('id', $user->id)->count();
    }

    public function hasFriendRequestReceived(User $user)
    {
        return (bool) $this->friendRequests()->where('id', $user->id)->count();
    }

    public function addFriend(User $user)
    {
        $this->friendsOf()->attach($user->id);
    }

    public function acceptFriendRequest(User $user)
    {
        $this->friendRequests()->where('id', $user->id)->first()->pivot->update(['accepted' => true]);
    }

    public function isFriendsWith(User $user)
    {
        return (bool) $this->friends()->where('id', $user->id)->count();
    }

}
