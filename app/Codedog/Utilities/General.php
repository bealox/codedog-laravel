<?php 
namespace Codedog\Utilities;


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
}
