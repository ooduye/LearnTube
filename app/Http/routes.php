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

Route::get('/', [
    'uses' => '\LearnTube\Http\Controllers\HomeController@index',
    'as'   => 'index'
]);

Route::get('/category/{category}', '\LearnTube\Http\Controllers\HomeController@show');

Route::get('/editprofile', '\LearnTube\Http\Controllers\AuthController@edit');

Route::put('editprofile', '\LearnTube\Http\Controllers\AuthController@update');

Route::delete('deleteVideo', 'VideoController@destroy');

Route::put('editVideo', 'VideoController@update');

/**
 *  Authentication routes
 */
Route::get('/register', [
    'uses' => '\LearnTube\Http\Controllers\AuthController@getRegister',
    'as'   => 'auth.register',
    'middleware' => ['guest']
]);

Route::post('/register', [
    'uses' => '\LearnTube\Http\Controllers\AuthController@postRegister',
    'middleware' => ['guest']
]);

Route::get('/signin', [
    'uses' => '\LearnTube\Http\Controllers\AuthController@getLogin',
    'as'   => 'auth.login',
    'middleware' => ['guest']
]);

Route::post('/signin', [
    'uses' => '\LearnTube\Http\Controllers\AuthController@postLogIn',
    'middleware' => ['guest']
]);

Route::get('login/{provider}', 'AuthController@redirectToProvider');
Route::get('login/{provider}/callback', 'AuthController@handleProviderCallback');

Route::get('/logout', [
    'uses' => '\LearnTube\Http\Controllers\AuthController@logOut',
    'as'   => 'auth.logout'
]);

Route::resource('videos', 'VideoController');