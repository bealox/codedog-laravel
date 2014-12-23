<?php

class AdminController extends BaseController {


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
