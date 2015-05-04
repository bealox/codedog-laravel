<?php 
namespace Codedog\Image;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class Upload{

	/**
	 * temp folder path
	 * @return string
	 */

	public function temp_path()
	{
		return public_path().'/img/temp/';
	}

	/**
	 * temp folder path for asset
	 * @return string
	 */

	public function display_temp_path()
	{
		return	'img/temp/';
	}

	/**
	 * @param Input
	 * @return Validator
	 */ 
	public function validation($input){
		$rules = array (
			'thumbnail' => 'image|max:2000'
		);
		$validator = Validator::make($input, $rules);
		return $validator;
	}
	
	/*
	 * check if file name exists in the folder, if it does then increment the number and append to the file name
	 * @param File Input, string
	 * @return string file name
	 */
	public function file_name_checker($file_name,$mime, $store_path){
		$file_path = $store_path.$file_name;
		$counter = 0;
		$name = basename($file_path, ".".$mime);

		while(File::exists($file_path)){
			$counter ++;
			$name_checker = $name.$counter.'.'.$mime;
			$file_path = $store_path.$name_checker;
		}	

		if($counter > 0){
			$file_name = $name.$counter.'.'.$mime;
		}

		return $file_name;
	}

	/*
	compare 2 string to see if they are the same.
	@return bool
	*/

	public function file_name_compare($file1, $file2){
		$name1 = File::name($file1);
		$name2 = File::name($file2);
		$isEqual = strcasecmp($name1, $name2);

		return ($isEqual === 0);
	}
}
