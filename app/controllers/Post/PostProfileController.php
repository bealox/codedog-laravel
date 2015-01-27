<?php

namespace controllers\Post;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Post;
use Codedog\Notifications\Flash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PostProfileController extends \BaseController {


	public function index() {
		return View::make('pages.admin.history',[
			'expireds' =>Post::expired()->sessionuser()->paginate('10'),
			'actives' => Post::active()->sessionuser()->get()
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
		$breeds = array();
		foreach(Auth::user()->breeds as $breed){
			$breeds = array_add($breeds, $breed->id, $breed->name);		
		}
		return View::make('pages.admin.post_creation')->with(compact('breeds'));			
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'title' => 'required',	
			'body' => 'required',
			'breed' => 'required'
		); 

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			Flash::errors($validator->errors()->toArray());
			return Redirect::back()->withInput();
		}else{
			$post = array(
				'title' => Input::get('title'),
				'description' => Input::get('body'),
			);	

			$puppy = \PuppyPost::create($post);
			$breed = \DogBreed::find(Input::get('breed'));
			$puppy->breed()->associate($breed);
			$puppy->user()->associate(Auth::user());
			$puppy->save();
		}

		return Redirect::route('profile.post.index');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		Log::info("edditing");
		$breeds = array();
		foreach(Auth::user()->breeds as $breed){
			$breeds = array_add($breeds, $breed->id, $breed->name);		
		}

		$post = Post::findOrFail($id);

		return View::make('pages.admin.post_editor')->with(compact('breeds', 'post'));			
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$rules = array(
			'title' => 'required',	
			'body' => 'required',
			'breed' => 'required'
		); 

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			Flash::errors($validator->errors()->toArray());
			return Redirect::back()->withInput();
		}else{
			$data = array(
				'title' => Input::get('title'),
				'description' => Input::get('body'),
			);	

			$breed = \DogBreed::find(Input::get('breed'));
			Log::info($breed);
			$post = Post::findOrFail($id);
			$post->update($data);
			$post->breed()->associate($breed);
			$post->save();
			return $this->index();
		}
	}



}
?>
