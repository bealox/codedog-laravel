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
 	


/**
 * LoginController
 */
Route::get('login', array('as' => 'login','uses' => 'LoginController@getLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'LoginController@getLogout'));
Route::post('login', array('as' => 'login', 'uses' => 'LoginController@postLogin'));

/**
 * consumer side
 */
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@homePage'));
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
		Route::get('dashboard/change_password', [ 'as' => 'profile.dashboard.change_password', 'uses' => 'controllers\User\UserProfileController@getChangePassword']);
		Route::post('dashboard/change_password', [ 'as' => 'profile.dashboard.change_password', 'uses' => 'controllers\User\UserProfileController@postChangePassword']);
		Route::get('dashboard/change_address', [ 'as' => 'profile.dashboard.change_address', 'uses' => 'controllers\User\UserProfileController@getChangeAddress']);
		Route::post('dashboard/change_address', [ 'as' => 'profile.dashboard.change_address', 'uses' => 'controllers\User\UserProfileController@postChangeAddress']);
		//Route::post('dashboard/check', [ 'as' => 'profile.dashboard.check', 'uses' => 'controllers\User\UserProfileController@check']);
		//Route::post('dashboard/postAuth', [ 'as' => 'profile.dashboard.postAuth', 'uses' => 'controllers\User\UserProfileController@postAuth']);
		//Route::resource('dashboard', 'controllers\User\UserProfileController', array('only' => array('index','store', 'destroy'))); 
		Route::resource('dashboard', 'controllers\User\UserProfileController', array('only' => array('index'))); 
		Route::resource('post', 'controllers\Post\PostProfileController', array('except' => array('show'))); 
		Route::post('post/check', [ 'as' => 'profile.post.check', 'uses' => 'controllers\Post\PostProfileController@check']);
		Route::post('post/postAuth', [ 'as' => 'profile.post.postAuth', 'uses' => 'controllers\Post\PostProfileController@postAuth']);
		Route::resource('image_modal', 'controllers\ImageEditModalController', array('only' => array('store', 'destroy'))); 
		Route::post('image_modal/check', [ 'as' => 'profile.image_modal.check', 'uses' => 'controllers\ImageEditModalController@check']);
		Route::post('image_modal/postAuth', [ 'as' => 'profile.image_modal.postAuth', 'uses' => 'controllers\ImageEditModalController@postAuth']);
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



