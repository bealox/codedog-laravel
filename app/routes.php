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
 	
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@homePage'));


/**
 * LoginController
 */
Route::get('login', array('as' => 'login','uses' => 'LoginController@getLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'LoginController@getLogout'));
Route::post('login', array('as' => 'login', 'uses' => 'LoginController@postLogin'));


/**
 * User creation
 */
Route::get('register', array('as' => 'createuser','uses' => 'RegistrationController@getCreateUser'));
Route::post('register', array('as' => 'createuser', 'uses' => 'RegistrationController@postCreateUser'));
Route::post('postcodejson', array('uses' => 'PostcodeController@jQueryPostcode'));
Route::post('postcodejson2', array('uses' => 'PostcodeController@rawPostcode'));
Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'RegistrationController@getConfirmAction'
]);

/**
 * Post Controller
 */

Route::get('puppypost', array('as' => 'puppypost', 'uses' => 'HomeController@homePage'));
Route::get('maturepost', array('as' => 'maturepost', 'uses' => 'HomeController@homePage'));

/**
 * Profile
 */

Route::group(
	['prefix' => 'profile', 'before' => ['auth']], 
	function () {
		Route::get('dashboard', [ 'as' => 'dashboard', 'uses' => 'controllers\User\UserProfileController@getDashboard']);
		Route::get('dashboard/change_password', [ 'as' => 'change_password', 'uses' => 'controllers\User\UserProfileController@getChangePassword']);
		Route::post('dashboard/change_password', [ 'as' => 'change_password', 'uses' => 'controllers\User\UserProfileController@postChangePassword']);
		Route::get('dashboard/change_address', [ 'as' => 'change_address', 'uses' => 'controllers\User\UserProfileController@getChangeAddress']);
		Route::post('dashboard/change_address', [ 'as' => 'change_address', 'uses' => 'controllers\User\UserProfileController@postChangeAddress']);
		Route::resource('post', 'controllers\Post\PostProfileController');
	}
);

/**
 * API
 */
Route::group(
	['prefix' => 'api', 'before' => ['auth']],
	function() {
		Route::get('postcode/{id}', ['as' => 'postcode', 'uses' => 'PostcodeController@printPostcode']); 
		Route::get('user/{id}', function($id){
			return Response::json(User::with('metadata')->findOrFail($id)); 
		});
	}
);

/**
* Reminders Controller
**/

Route::get('password/reset/{token}', 'RemindersController@getReset');
Route::post('password/reset/{token}', 'RemindersController@postReset');
Route::post('password/remind/', 'RemindersController@postRemind');
Route::get('password/remind/', 'RemindersController@getRemind');


