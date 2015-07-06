<?php

use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

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
			Flash::errors($validator->errors()->toArray());
			return Redirect::to('login');
		}else{

			$userdata = array(
				'email' => Input::get('email'),
				'password' => Input::get('password'),
				'confirmed' => 1,
			);
			Log::info(Input::get('remember_me'));

			if(Auth::attempt($userdata, (Input::get('remember_me')=='true') ? true : false)) {
				//Save Ip address

				
				$logdata = array(
				'ip_address' => Request::ip(),
				'logged_in' => Carbon::now(),
				'user_id' => Auth::user()->id,
				);

				$log = LogSession::create($logdata);
				// $log->user()->associate(Auth::user());
				$log->save();
				

				return Redirect::to('/');
			}else{
				Flash::error('We were unable to sign you in.');
				return Redirect::to('login')
					->withInput();
			}

		}
	}

	public function getLogout()
	{
		Auth::logout(); // log the user out of our application
		return Redirect::to('/');
	}
}
