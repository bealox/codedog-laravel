<?php

class LoginController extends BaseController {

	public function getLogin()
	{
		// show the form
		return View::make('pages.login');
	}


	public function forgotPassword()
	{
		//echo "We forgot our password";
		return View::make('password.remind');
		//process your input here Input:get('email') etc.
	}

	public function postLogin()
	{

		$rules = array(
			'email' => 'required|email',
			'password' => 'required|alphaNum|min:5'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}else{

			$userdata = array(
				'email' => Input::get('email'),
				'password' => Input::get('password'),
				'confirmed' => 1,
			);
			Log::info(Input::get('remember_me'));

			if(Auth::attempt($userdata, (Input::get('remember_me')=='true') ? true : false)) {
				return Redirect::to('/')->withMessage('success', 'Thanks for signing up! please check your email to verify your address.');	
			}else{
				return Redirect::to('login')
					->withInput()
					->withErrors(['credentials' => 'We were unable to sign you in.']);	
			}

		}
	}

	public function getLogout()
	{
		Auth::logout(); // log the user out of our application
		return Redirect::to('/');
	}
}
