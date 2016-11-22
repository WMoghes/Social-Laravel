<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function getIndex()
    {
        $friends = Auth::user()->friends();
        $requests = Auth::user()->friendRequests();

        return view('friends.index', compact('friends', 'requests'));
    }
    public function getAdd($username)
    {
        $user = User::where('username', $username)->first();
        if(!$user){
            return redirect()->route('home')->withInfo('That user could not be found');
        }

        if(Auth::user()->id === $user->id){
            return redirect()->route('home');
        }

        if(Auth::user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(Auth::user())){
            return redirect()->route('profile', ['username' => $user->username])->withInfo('Friend request already pending');
        }
        if(Auth::user()->isFriendsWith($user)){
            return redirect()->route('profile', $user->username)->withInfo('You\'re already friends');
        }
        Auth::user()->addFriend($user);

        return redirect()->route('profile', $user->username)->withInfo('Friend request sent.');
    }

    public function getAccept($username)
    {
        $user = User::where('username', $username)->first();

        if(!$user){
            return redirect()->route('home');
        }

        if(!Auth::user()->hasFriendRequestReceived($user)){
            return redirect()->route('home');
        }

        Auth::user()->acceptFriendRequest($user);

        return redirect()->route('profile', $username)->withInfo('Friend request accepted.');
    }
}
