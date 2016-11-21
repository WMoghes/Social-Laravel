<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Home
 */
Route::get('/', [
    'uses'      => 'HomeController@index',
    'as'        => 'home'
]);

/**
 * Authentications
 */
Route::get('sign-up', [
    'uses'      => 'AuthController@getSignup',
    'as'        => 'auth.signup'
]);
Route::post('sign-up', [
    'uses'      => 'AuthController@postSignup'
]);
Route::get('sign-in', [
    'uses'      => 'AuthController@getSignin',
    'as'        => 'auth.signin'
]);
Route::post('sign-in', [
    'uses'      => 'AuthController@postSignin'
]);
Route::get('sign-out', [
    'uses'      => 'AuthController@getSignout',
    'as'        => 'auth.signout'
]);