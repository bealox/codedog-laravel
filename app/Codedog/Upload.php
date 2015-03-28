<?php 
namespace Codedog\Image;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class Upload{

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
	public function file_name_checker($input_file, $store_path){
		$file_name=$input_file->getClientOriginalName();
		$file_path = $store_path.$file_name;
		$counter = 0;
		$mime = $input_file->getClientOriginalExtension();
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

}
