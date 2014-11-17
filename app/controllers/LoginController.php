<?php

class LoginController extends BaseController {

	public function showLogin()
	{
		// show the form
		return View::make('pages.login');
	}
	
	 public function postAuth()
    {
    	//echo "post auth";
        //check which submit was clicked on
        if(Input::get('login')) {
            return $this->doLogin(); //if login then use this method
        } elseif(Input::get('forgotPassword')) {
            return $this->forgotPassword(); //if register then use this method
        }

    }    


    public function forgotPassword()
    {
        //echo "We forgot our password";
		return View::make('password.remind');
        //process your input here Input:get('email') etc.
    }

	public function doLogin()
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
				'password' => Input::get('password')
			);

			if(Auth::attempt($userdata)) {
				return Redirect::to('/');	
			}else{
				return Redirect::to('login')
					->withErrors(['message', 'wrong']);
			}
		}
	}
	
	public function doLogout()
	{
		Auth::logout(); // log the user out of our application
		return Redirect::to('/');
	}
}
