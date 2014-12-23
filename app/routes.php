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

Route::get('/', array('uses' => 'HomeController@homePage'));

Route::get('test', function()
{
	return View::make('pages.testarea');
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
Route::get('login', array('as' => 'login','uses' => 'LoginController@getLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'LoginController@getLogout'));
Route::post('login', array('as' => 'login', 'uses' => 'LoginController@postLogin'));


/**
 * User creation
 */
Route::get('createuser', array('as' => 'createuser','uses' => 'RegistrationController@getCreateUser'));
Route::post('createuser', array('as' => 'createuser', 'uses' => 'RegistrationController@postCreateUser'));
Route::post('postcodejson', array('uses' => 'PostcodeController@jQueryPostcode'));
Route::post('postcodejson2', array('uses' => 'PostcodeController@rawPostcode'));
Route::get('createuser/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'RegistrationController@confirm'
]);

/**
 * Post Controller
 */

Route::get('puppypost', array('as' => 'puppypost', 'uses' => 'HomeController@homePage'));
Route::get('maturepost', array('as' => 'maturepost', 'uses' => 'HomeController@homePage'));

/**
 * Admin
 */

Route::group(
	['prefix' => 'admin', 'before' => ['auth']], 
	function () {
		Route::get('dashboard', [ 'as' => 'dashboard', 'uses' => 'AdminController@getDashboard']);
		Route::get('history', [ 'as' => 'history', 'uses' => 'AdminController@getHistory']);
		Route::get('createpost', [ 'as' => 'createpost', 'uses' => 'AdminController@getCreatePost']);
		Route::post('createpost', [ 'as' => 'createpost', 'uses' => 'AdminController@postCreatePost']);
	}
);

/**
 * API
 */
Route::group(
	['prefix' => 'api'],
	function() {
		Route::get('postcode/{id}', ['as' => 'postcode', 'uses' => 'PostcodeController@printPostcode']); 
	}
);

/**
* Reminders Controller
**/

Route::get('password/reset/{token}', 'RemindersController@getReset');
Route::post('password/reset/{token}', 'RemindersController@postReset');
Route::post('password/remind/', 'RemindersController@postRemind');
Route::get('password/remind/', 'RemindersController@getRemind');


