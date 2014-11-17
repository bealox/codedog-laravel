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
	public $links= array('Dashboard','CreatePost');
	


	public function getDashboard() {
		return View::make('pages.admin.dashboard')->with('links', $this->links);
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
		
		
	
} 	