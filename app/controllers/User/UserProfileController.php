<?php
namespace controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Codedog\Notifications\Flash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\HTML;
use User;
use Image;

class UserProfileController extends \BaseController {

	public function index() {
		$first = Auth::user()->breeds()->first();
		return View::make('pages.admin.dashboard', compact('first'));
	}

	public function store() {

		$width = Input::get('cropper_width');	
		$height = Input::get('cropper_height');
		$y = (Input::get('cropper_y'));
		$x = (Input::get('cropper_x'));
		$fileName = (Input::get('file_name'));
		$filePath = public_path().'/img/profile/'.Input::get('file_name');
		
		$img = Image::make($filePath);
		$img->crop($width, $height, $x, $y);
		$img->save();

		$user = Auth::user();
		
		/** If Image already exists then delete the old one **/
		if($user->thumbnail_url != null){
			$user->delete_thumbnail_action();
		}

		$user->thumbnail_url = asset('img/profile/'.Input::get('file_name'));
		$user->save();

		return Redirect::back();
	}

	public function destroy(){
		$fileName = (Input::get('img_url'));
	}

	public function check() {
		if(Request::ajax()){
			$file = Input::all();
			$rules = array (
				'thumbnail' => 'image|max:2000'
			);

			$validator = Validator::make($file, $rules);

			if($validator->fails()) {
				Flash::error($validator->messages()->first('thumbnail'));	
				$response = Response::view('includes.notification');
				$html = $response->getOriginalContent();
				$response = array('status' => 'fail', 'html' => "$html");
				return Response::json($response);
			}else{
				$path = User::thumbnail_path();
				$file_name=Input::file('thumbnail')->getClientOriginalName();
				$file_path = $path.$file_name;
				
				/*
				 * Image file name checker, if it already exists than add a counter in the file name.
				 */
				$counter = 0;
				$mime = Input::file('thumbnail')->getClientOriginalExtension();
				$name = basename($file_path, ".".$mime);

				while(File::exists($file_path)){
					$counter ++;
					$name_checker = $name.$counter.'.'.$mime;
					$file_path = $path.$name_checker;
				}	

				if($counter > 0){
					$file_name = $name.$counter.'.'.$mime;
				}

				Input::file('thumbnail')->move($path,$file_name);
				$display_path = User::display_thumbnail_path();

				$response = array('status' => 'success', 'html' => null , 
					'path' => asset($display_path.$file_name), 'fileName' => $file_name);
				return Response::json($response);
			}
		}
	}

	public function getChangeAddress() {
		$metadata = Auth::user()->metadata;
		$state = $metadata->state;
		
		return View::make('pages.admin.change_address', compact('state', 'metadata'));
	}

	public function postChangeAddress() {

		$user = Auth::user();

		$metadata = array(
			'postcode' => Input::get('postcode_id'),
			'postoffice_id' => Input::get('postoffice_id'),
			'phone_no' => Input::get('phone_no'),
			'address' => Input::get('address'),
			'suburb' => Input::get('suburb'),
			'show_details' => Input::get('show_details'),
			'latitude' => Input::get('latitude'),
			'longitude' => Input::get('longitude')
		);
		$user->metadata->update($metadata);
		Flash::success('Your user detail has been updated!');
		return Redirect::to('profile/dashboard');
	}

	public function getChangePassword(){
		return \View::make('pages.admin.change_password');
	}

	public function postChangePassword() {

		$user = Auth::user();

		$rules = array (
			'current_password' => 'required|alpha_num|between:5,12',
			'new_password' => 'required|alpha_num|between:5,12|confirmed',
			'new_password_confirmation' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			Flash::errors($validator->errors()->toArray());	
			return Redirect::back();
		}else{
			if(!Hash::check(Input::get('current_password'), $user->password))		
			{
				Flash::error('Your current password is missing or incorrect');
				return Redirect::back();
			}else{
				if(Hash::check(Input::get('new_password'), $user->password)){
					Flash::error('New password cannot be the same as the current one.');
					return Redirect::back();
				}

				$user->password = Input::get('new_password');
				$user->save();
				Flash::success('Your password has been updated!');
				return Redirect::to('settings/dashboard');
			}
		}
	}


} 	
