<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AuthController extends Controller
{
    public function getSignup(){
        return view('signup');
    }

    public function postSignup(Request $request){
        $this->validate($request, [
            'email'     => 'required|unique:users|email|max:255',
            'username'  => 'required|unique:users|max:255',
            'password'  => 'required|min:6'
        ]);
        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        User::create($input);
        return redirect()->route('home')->with('info', 'Your account has been created and you can sign in :)');
    }
}
