<?php

class AdminController extends BaseController {

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
		return View::make('pages.admin.createuser');
	}


	public function postCreateUser()
	{
		$rules = array(
			'first_name' => 'required|alpha',
			'last_name' => 'required|alpha',
			'email' => 'required|email|unique:User,email',
			'password' => 'required|alphaNum|min:5|confirmed',
			'password_confirmation' => 'required',
			'postcode' => 'required|digits:4',
			'suburb' => 'required',
			'state' => 'required|not_in:default'
		);

		$error = null;
		$resp = null;

		$validator = Validator::make(Input::all(), $rules);

		$secret = getenv('RECAPTCHA_SECRET');
		$reCaptcha = new ReCaptcha($secret);

		// Was there a reCAPTCHA response?
		if ($_POST['g-recaptcha-response']) {
			$resp = $reCaptcha->verifyResponse(
				$_SERVER['REMOTE_ADDR'],
				$_POST['g-recaptcha-response']
			);
		}

		if($resp == null || !$resp->success){
			Log::info("am i here" . $error);
			return Redirect::to('createuser')
				->withErrors(array('robot' => 'Please verify you are not a robot.'))
				->withInput(Input::except('passwod'));
		}


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

			$metadata = array(
				'postcode' => Input::get('postcode'),
				'suburb' => Input::get('suburb'),
				'state' => Input::get('state'),
				'latitude' => Input::get('latitude'),
				'longitude' => Input::get('longitude')
			);

			$type = Input::get('type');
			$hash = Hash::make(input::get('password'));

			$breeder = DogBreeder::create($userdata);
			$breeder->password = $hash;

			$meta = Metadata::create($metadata);
			$meta->user_id = $breeder->id;

			$breeder->save();
			$meta->save();	

			return Redirect::to('/');

		}
	}

	/**
	 * Links
	 */

	public function getDashboard() {
		return View::make('pages.admin.dashboard');
	}

	public function getCreatePost() {
		//return View::make('pages.admin.createpost')->with('links', $this->links);
		$posts = PuppyPost::all();
		$links = $this->links;
		return View::make('pages.admin.createpost', compact('posts', 'links'));
	}

	public function postCreatePost() {
		$rules = array(
			'title' => 'required|max:100',
			'description' => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('profile/createpost')
				->withErrors($validator);
		}else{

			$postdata = array(
				'title' => Input::get('title'),
				'description' => Input::get('description'),
			);


			$post = PuppyPost::create($postdata);
			$post->users()->attach(Auth::id());

			return Redirect::to('profile/createpost')->withinput()->with('success', 'A post has been created');

		}
	}

	public function getHistory() {
		return View::make('pages.admin.history');
	}

} 	
