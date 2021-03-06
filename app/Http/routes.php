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
Route::group(['middleware' => 'guest'] , function(){
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
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('sign-out', [
        'uses'      => 'AuthController@getSignout',
        'as'        => 'auth.signout'
    ]);
    Route::post('search', [
        'uses'      => 'SearchController@searchResults',
        'as'        => 'search.results'
    ]);
    /***
     * User Profile
     */
    Route::get('profile/{username}', [
        'uses'      => 'ProfileController@getProfile',
        'as'        => 'profile'
    ]);
    Route::get('profile/edit/{username}', [
        'uses'      => 'ProfileController@getEdit',
        'as'        => 'profile.edit'
    ]);
    Route::post('profile/edit', [
        'uses'      => 'ProfileController@postEdit',
        'as'        => 'profile.update'
    ]);
    /**
     * Friends
     */
    Route::get('friends', [
        'uses'      => 'FriendController@getIndex',
        'as'        => 'friends.index'
    ]);
    Route::get('friends/add/{username}', [
        'uses'      => 'FriendController@getAdd',
        'as'        => 'friends.add'
    ]);
    Route::get('friends/accept/{username}', [
        'uses'      => 'FriendController@getAccept',
        'as'        => 'friends.accept'
    ]);
});