<?php

namespace controllers\Post;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Post;
use Illuminate\Support\Facades\Redirect;

class PostProfileController extends \BaseController {


	public function index() {
		return View::make('pages.admin.history',[
			'expireds' => Post::where('created_at', '<', new \DateTime('today'))->paginate('10'),
			'actives' => Post::where('created_at', '>', new \DateTime('today'))->get()
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::findOrFail($id);
		$post->delete();
		return Redirect::back();
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
		return View::make('pages.admin.history',[
			'expireds' => Post::where('created_at', '<', new \DateTime('today'))->sessionuser()->paginate('10'),
			'actives' => Post::where('created_at', '>', new \DateTime('today'))->sessionuser()->get()
		]);
	}


}
