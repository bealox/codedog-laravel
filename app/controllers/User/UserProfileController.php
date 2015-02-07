<?php
namespace controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class UserProfileController extends \BaseController {

	/**
	 * Links
	 */

	public function getDashboard() {
		$first = Auth::user()->breeds()->first();
		return View::make('pages.admin.dashboard', compact('first'));
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
		\Flash::success('Your user detail has been updated!');
		return \Redirect::to('profile/dashboard');
	}

	public function getChangePassword(){
		return \View::make('pages.admin.change_password');
	}

	public function postChangePassword() {

		$user = Auth::user();

		$rules = array (
			'current_password' => 'required|alpha_num|Between:5,12',
			'new_password' => 'required|alpha_num|Between:5,12|confirmed',
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
