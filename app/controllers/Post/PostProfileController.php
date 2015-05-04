<?php

namespace controllers\Post;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Post;
use Codedog\Image\Upload;
use Codedog\Notifications\Flash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use controllers\ImageEditModalController;

class PostProfileController extends \BaseController {


	public function index() {
		return View::make('pages.admin.history',[
			'expireds' =>Post::expired()->sessionuser()->paginate('10'),
			'actives' => Post::active()->sessionuser()->get()
		]);
	}

	public function postAuth($id = null)
	{
		if(Input::get('publish')){
			return $this->store();	
		}else if (Input::get('edit')){
			return $this->update($id);
		}else if(Input::get('type') == 'submit'){
			return ImageEditModalController::check();
		}
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

			Log::info("storing right now !!!");

			$puppy = \PuppyPost::create($post);
			$breed = \DogBreed::find(Input::get('breed'));
			$puppy->user()->associate(Auth::user());
			$puppy->breed()->associate($breed);

			if(!is_null(Input::get('file_path'))){
				$puppy->image_url = asset(Input::get('file_path'));
			}

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
		$breeds = array();

		foreach(Auth::user()->breeds as $breed){
			$breeds = array_add($breeds, $breed->id, $breed->name);		
		}

		$post = Post::findOrFail($id);
		$path = $post->image_url;
		
		return View::make('pages.admin.post_editor')->with(compact('breeds', 'post', 'path'));			
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$imageUtils = new Upload();

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

			//check if existing image is different the one that has uploaded.
			if(!is_null($post->image_url) && !is_null(Input::get('file_path'))){
				$check = $imageUtils->file_name_compare($post->image_url, Input::get('file_path'));
				if(!$check){
					$post->image_url = asset(Input::get('file_path'));
				}
			}

			$post->save();
			return $this->index();
		}
	}

}
?>
