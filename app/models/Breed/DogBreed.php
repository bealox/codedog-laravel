<?php

class DogBreed extends Breed{
	
	protected $stiClassField = 'class_name';
	protected $stiBaseClass = 'Breed';

	public function breedtype(){
		return $this->belongsTo('BreedType');
	}

}
