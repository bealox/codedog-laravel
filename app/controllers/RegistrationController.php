<?php

class RegistrationController extends BaseController {

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

	public function getCreateUser()
	{
		return View::make('pages.createuser');
	}


	public function postCreateUser()
	{
		$rules = array(
			'first_name' => 'required|alpha',
			'last_name' => 'required|alpha',
			'email' => 'required|email|unique:User,email',
			'password' => 'required|alphaNum|Between:5,12|confirmed',
			'password_confirmation' => 'required',
			'postcode' => 'required',
			'breed' => 'required',
			'membership' => 'required|alphaNum'
		);

		$error = null;
		$resp = null;

		$validator = Validator::make(Input::all(), $rules);

		$secret = getenv('RECAPTCHA_SECRET');
		$reCaptcha = new ReCaptcha($secret);
		
		//so postcode select can have initial selection
		$metadata = array(
			'postcode' => Input::get('postcode_id'),
			'suburb' => Input::get('suburb'),
			'state' => Input::get('state'),
			'latitude' => Input::get('latitude'),
			'longitude' => Input::get('longitude'),
			'postoffice_id' => Input::get('postoffice_id'),
		);

		// Was there a reCAPTCHA response?
		if ($_POST['g-recaptcha-response']) {
			$resp = $reCaptcha->verifyResponse(
				$_SERVER['REMOTE_ADDR'],
				$_POST['g-recaptcha-response']
			);
		}

		if($resp == null || !$resp->success){
			Flash::error('Please verify you are not a robot.');
			return Redirect::to('register')->with(compact('metadata'))->withInput(Input::except('passwod'));	
		}


		if($validator->fails()) {
			Flash::errors($validator->errors()->toArray());
			return Redirect::to('register')->with(compact('metadata'))
				->withInput(Input::except('password'));
		}else{

			$confirmation_code = str_random(30);

			$userdata = array(
				'first_name' => Input::get('first_name'),
				'last_name' => Input::get('last_name'),
				'email' => Input::get('email'),
				'membership_no' => Input::get('membership'),
				'confirmation_code' => $confirmation_code
			);
			
			$breeder = DogBreeder::create($userdata);
			$breeder->password = input::get('password');

			//Inserting breeds (M to M)
			$breeds =explode(',', Input::get('breed'));
			$breeder->breeds()->sync($breeds);
			//Inserting metadata (O to O)
			$meta= new Metadata($metadata);
			$breeder->metadata()->save($meta);
			//this is to save the password
			$breeder->save();

			$data = array_add(array('confirmation_code' => $confirmation_code), 'key', 'value');
			
			Mail::send('emails.verify.newuser', $data, function($message) {
			    $message->to(Input::get('email'), Input::get('username'))
				->subject('Verify your email address');
			});

			Flash::success("Complete your account registration. send verification email");
			return Redirect::to('/');

		}
	}

	public function getConfirmAction( $confirmation_code)
	{
		if(is_null($confirmation_code)){
			throw InvalidConfirmationCodeException;
		}	

		$user = User::where('confirmation_code', $confirmation_code)->firstOrFail();

		$user->confirmed = 1;
		$user->confirmation_code = null;
		$user->save();

		Flash::success("You have successfully verified your account.");
		return Redirect::to('login');
	}
		

} 	
