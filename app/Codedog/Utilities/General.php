<?php 
namespace Codedog\Utilities;

use Illuminate\Support\Facades\Log;
use BreedType;


class General{
	/**
	 * Array of states
	 * @return array
	 */
	public function state()
	{
		$state = [
			array('id'=> 'VIC', 'text'=> 'VIC'),
			array('id'=> 'NSW', 'text'=> 'NSW'),
			array('id'=> 'QLD', 'text'=> 'QLD'),
			array('id'=> 'SA', 'text'=> 'SA'),
			array('id'=> 'WA', 'text'=> 'WA'),
			array('id'=> 'TAS', 'text'=> 'TAS'),
			array('id'=> 'NT', 'text'=> 'NT'),
		];
		return $state;
	}

	/**
	 * Truncate text
	 * @return string 
	 */
	public function truncate($text, $chars = 25) {
            $original = strlen($text);
	    Log::info($original.' char'.$chars);
	    if($chars < $original){
		    $text = $text." ";
		    $text = substr($text,0,$chars);
		    $text = substr($text,0,strrpos($text,' '));
		    $text = $text."...";
	    }

	    return $text;
	}

	/**
	 * Fetch Breed type 
	 * @return array
	 */

	public function breed_type_array() {

		$breed_types = BreedType::orderBy('name')->get(); 

		$array = array(); 
		foreach($breed_types as $type){
			$item = array( 'id' => $type->id, 'text'=>$type->name);	
			$array[] = $item;
		}

		return $array;
	}
}
