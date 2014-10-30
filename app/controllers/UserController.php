<?php

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function creation()
	{
		return View::make('createuser');
	}


	public function createuser()
	{
		$rules = array(
			'first_name' => 'required|alpha',
			'last_name' => 'required|alpha',
			'email' => 'required|email',
			'password' => 'required|alphaNum|min:5'
			
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('createuser')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}else{

			$userdata = array(
				'first_name' => Input::get('first_name'),
				'last_name' => Input::get('last_name'),
				'email' => Input::get('email')
			);

			$type = Input::get('type');
			$hash = Hash::make(input::get('password'));

			if($type == 'Dog') {	
				$breeder = DogBreeder::create($userdata);
			}else{
				$breeder = CatBreeder::create($userdata);
			}

			$breeder->password = $hash;
			$breeder->save();

			return Redirect::to('users');

		}
	}
	
}
