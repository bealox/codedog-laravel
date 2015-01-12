<?php

namespace controllers\Post;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Post;
use Codedog\Notifications\Flash;
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

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pages.admin.post_editor');			
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


}
