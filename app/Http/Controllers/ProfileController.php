<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile($username){

        $user = User::where('username' , $username)->first();

        if(!$user){
            abort(404);
        }

        return view('profile.index', compact('user'));
    }

    public function getEdit($username){
        return view('profile.edit');
    }

    public function postEdit(Request $request){
        $this->validate($request, [
            'first_name'        => 'alpha|max:50',
            'last_name'         => 'alpha|max:50',
            'location'          => 'max:20'
        ]);

        Auth::user()->update($request->all());

        return redirect()->route('profile.edit', Auth::user()->username)->withInfo('You profile has been updated.');
    }

}
