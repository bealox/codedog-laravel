<?php namespace controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Codedog\Notifications\Flash;
use Codedog\Image\Upload;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\HTML;
use User;
use Image;
use BaseController;
use Post;

class ImageEditModalController extends BaseController {


	public function postAuth()
	{
		if(Input::get('save')){
			return $this->store();	
		}else if (Input::get('close')){
			return $this->delete();
		}
	}

	/*
	 * store image
	 */
	public function store() {

		$imageUtils = new Upload();

		$width = Input::get('cropper_width');	
		$height = Input::get('cropper_height');
		$y = (Input::get('cropper_y'));
		$x = (Input::get('cropper_x'));
		$file_name = (Input::get('file_name'));
		$type = (Input::get('file_type'));

		$oldPath = $imageUtils->temp_path().Input::get('file_name');

		$img = Image::make($oldPath);
		$img->crop($width, $height, $x, $y);
		$img->save();

		//Place modified image into the propery folder.
		//Post Image goes into /img/post
		//User Image goes into /img/profile

		if($type == 'post'){
			//still saving in temp folder because user might cancel a new post which mean the image will not be used.
			$display_path = $imageUtils->display_temp_path();
		}else if($type == 'user'){
			$path = User::thumbnail_path();
			$display_path = User::display_thumbnail_path();
		}

			if($type == 'user'){

				$mime = File::extension($oldPath);
				$new_file_name = $imageUtils->file_name_checker(File::name($oldPath), $mime, $path);
				$new_file_name = $new_file_name.'.'.$mime;
				$newPath = $path.$new_file_name;
				//if successfuly edit the image then move the image to the profile folder
				if(File::move($oldPath, $newPath)){
					$user = Auth::user();
					$user->thumbnail_url = asset($display_path.$new_file_name);
					$user->save();
				}
				return Redirect::back();

			}else if($type == 'post'){
				//return json that shows the image 
				Log::info("aaaaaaaaaaaaaaaaaaaa");
				Log::info(Input::all());
				$newPath = asset($display_path.$file_name);
				return Redirect::back()->withInput()->with('path', $newPath);
			}
	

	}

	/*
	 * destory image
	 */
	public function delete(){
		
		$imageUtils = new Upload();
		$path = $imageUtils->temp_path();
		$file_name = (Input::get('file_name'));
		File::delete($path.$file_name);

		return Redirect::back()->withInput();
	}

	/*
	 * check image
	 * @return json
	 */
	public static function check() {

		$imageUtils = new Upload();

		if(Request::ajax()){
			$file = Input::all();

			$validator = $imageUtils->validation($file);

			if($validator->fails()) {
				Flash::error($validator->messages()->first('thumbnail'));	
				$response = Response::view('includes.notification');
				$html = $response->getOriginalContent();
				$response = array('status' => 'fail', 'html' => "$html");
				return Response::json($response);
			}else{

				if(Input::file('post')){
					$input_file = Input::file('post');
				}else if(Input::file('thumbnail')){
					$input_file = Input::file('thumbnail');
				}

				//save into temp folder first
				$path = $imageUtils->temp_path();
				$display_path = $imageUtils->display_temp_path();

				$file_name = $imageUtils->file_name_checker(
					$input_file->getClientOriginalName(),
					$input_file->getClientOriginalExtension(),
					$path);

				$input_file->move($path,$file_name);

				$response = array('status' => 'success', 'html' => null , 
					'path' => asset($display_path.$file_name), 
					'fileName' => $file_name);

				return Response::json($response);
			}
		}
	}

}

?>
