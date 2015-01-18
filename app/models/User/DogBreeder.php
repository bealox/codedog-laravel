<?php

class DogBreeder extends User {
	protected $stiClassField = 'class_name';
	protected $stiBaseClass = 'User';
	public function breeds()
	{
		return $this->belongsToMany('Breed', 'Breed_User', 'user_id', 'breed_id');
	}
}

?>
