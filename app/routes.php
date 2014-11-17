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
 * LoginController
 */
Route::get('login', array('as' => 'login','uses' => 'LoginController@showLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'LoginController@doLogout'));
Route::post('postAuth', array('uses' => 'LoginController@postAuth'));


/**
 * User creation
 */
Route::get('createuser', array('as' => 'createuser','uses' => 'AdminController@getCreateUser'));
Route::post('createuser', array('uses' => 'AdminController@postCreateUser'));

/**
 * Admin
 */
Route::group(
	['prefix' => 'admin', 'before' => ['auth']], 
	function () {
		Route::get('dashboard', [ 'as' => 'dashboard', 'uses' => 'AdminController@getDashboard']);
		Route::get('createpost', [ 'as' => 'createpost', 'uses' => 'AdminController@getCreatePost']);
		Route::post('createpost', [ 'as' => 'createpost', 'uses' => 'AdminController@postCreatePost']);
	}
);
