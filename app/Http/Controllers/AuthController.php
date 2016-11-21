<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

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

    public function getSignin() {
        return view('signin');
    }

    public function postSignin(Request $request){
        $this->validate($request, [
            'email'     => 'required',
            'password'  => 'required'
        ]);
        if(!Auth::attempt($request->only('email','password'), $request->has('remember'))){
            return redirect()->back()->withInfo('Could not sign in with those credentials');
        }
        return redirect()->route('home')->withInfo('you\'re sign in');
    }

    public function getsignout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
