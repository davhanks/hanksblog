<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home.home')->with('title', 'Home');
});

Route::get('login', function() {
	return 'Hello World';
});


//Users
Route::get('users/login', array('as'=>'login', 'uses'=>'UserController@getLogin'));
Route::post('users/signin', array('uses'=>'UserController@postSignIn'));
Route::get('users/dashboard', array('as'=>'dashboard', 'uses'=>'UserController@getDashboard'));
Route::get('users/logout', array('as'=>'logout', 'uses'=>'UserController@getLogout'));

//Posts
Route::get('posts/list', array('as'=>'list', 'uses'=>'PostController@postList'));
Route::get('posts/create', array('as'=>'create', 'uses'=>'PostController@create'));
