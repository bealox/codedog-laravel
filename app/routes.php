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
 * Post
 */
Route::resource('post', 'controllers\Post\PostController', array('only' => array('show','index'))); 
Route::resource('dog_breed', 'controllers\Breed\BreedController', array('only' => array('show','index'))); 
Route::resource('dog_breeder', 'controllers\Breeder\BreederController', array('only' => array('show','index'))); 


/**
 * User creation
 */
Route::get('register', array('as' => 'createuser','uses' => 'RegistrationController@getCreateUser'));
Route::post('register', array('as' => 'createuser', 'uses' => 'RegistrationController@postCreateUser'));
Route::post('postcodejson', array('uses' => 'PostcodeController@jQueryPostcode'));
Route::post('breedjson', array('uses' => 'controllers\Breed\BreedController@json'));
Route::post('breedjson_id', array('uses' => 'controllers\Breed\BreedController@json_id'));
Route::get('breedjson', array('uses' => 'controllers\Breed\BreedController@json'));
Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'RegistrationController@getConfirmAction'
]);


/**
 * Profile
 */

Route::group(
	['prefix' => 'profile', 'before' => ['auth']], 
	function () {
		Route::get('dashboard/change_password', [ 'as' => 'change_password', 'uses' => 'controllers\User\UserProfileController@getChangePassword']);
		Route::post('dashboard/change_password', [ 'as' => 'change_password', 'uses' => 'controllers\User\UserProfileController@postChangePassword']);
		Route::get('dashboard/change_address', [ 'as' => 'change_address', 'uses' => 'controllers\User\UserProfileController@getChangeAddress']);
		Route::post('dashboard/change_address', [ 'as' => 'change_address', 'uses' => 'controllers\User\UserProfileController@postChangeAddress']);
		Route::post('dashboard/check', [ 'as' => 'profile.dashboard.check', 'uses' => 'controllers\User\UserProfileController@check']);
		Route::resource('dashboard', 'controllers\User\UserProfileController', array('only' => array('index','store', 'destroy'))); 
		Route::resource('post', 'controllers\Post\PostProfileController', array('except' => array('show'))); 
		//Route::resource('post/create', 'controllers\Post\PostProfileController', array('only' => array('create',))); 
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
		Route::get('breedjson/{id}', array('uses' => 'controllers\Breed\BreedController@json'));
	}
);

/**
* Reminders Controller
**/

Route::get('password/reset/{token}', 'RemindersController@getReset');
Route::post('password/reset/{token}', 'RemindersController@postReset');
Route::post('password/remind/', 'RemindersController@postRemind');
Route::get('password/remind/', 'RemindersController@getRemind');



