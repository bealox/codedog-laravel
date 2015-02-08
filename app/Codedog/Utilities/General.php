<?php 
namespace Codedog\Utilities;

use Illuminate\Support\Facades\Log;


class General{
	/**
	 * Array of states
	 * @return array
	 */
	public function state()
	{
		$state = array('VIC' => 'VIC',
	       			'NSW' => 'NSW',
				'QLD' => 'QLD',
				'SA' => 'SA',
				'WA' => 'WA',
				'TAS' => 'TAS',
				'NT' => 'NT'	);	
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
}
