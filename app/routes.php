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
	return View::make('pages.home');
});

Route::get('users', function()
{
	$dogusers = DogBreeder::all();
	$catusers = CatBreeder::all();
	$get_user = DogBreeder::find(2);
	return View::make('users')->with('users', $dogusers)
		->with('catusers', $catusers)->with('single', $get_user);
});

/**
 * Login and Logout
 */
Route::get('login', array('uses' => 'HomeController@showLogin'));
Route::post('login', array('uses' => 'HomeController@doLogin'));
Route::get('logout', array('uses' => 'HomeController@doLogout'));

/**
 * User creation
 */
Route::get('createuser', array('uses' => 'ProfileController@getCreateUser'));
Route::post('createuser', array('uses' => 'ProfileController@postCreateUser'));

/**
 * Profile
 */
Route::group(
	['prefix' => 'profile', 'before' => ['auth']], 
	function () {
		Route::get('dashboard', [ 'as' => 'dashboard', 'uses' => 'ProfileController@getDashboard']);
		Route::get('createpost', [ 'as' => 'createpost', 'uses' => 'ProfileController@getCreatePost']);
		Route::post('createpost', [ 'as' => 'createpost', 'uses' => 'ProfileController@postCreatePost']);
	}
);
