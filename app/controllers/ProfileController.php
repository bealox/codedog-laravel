<?php

class ProfileController extends BaseController {

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

			return Redirect::to('/');

		}
	}

	public $links= array(
	  	    array('link' => array('name' => 'Dashboard', 'class_name' => 'selected', 'url' => 'profile/dashboard')),
	  	    array('link' => array('name' => 'Post', 'class_name' => '', 'url' => 'profile/createpost')),
	);

	public function getDashboard() {
		foreach( $this->links[0]['link'] as $string) {
			Log::info($this->links[0]['link']['name']);
		}
		return View::make('pages.admin.dashboard')->with('links', $this->links);
	}

	public function getCreatePost() {
		return View::make('pages.admin.createpost')->with('links', $this->links);
	}

	public function postCreatePost() {
		$rules = array(
			'title' => 'required|alpha_dash',
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
		
		
	
} 	
