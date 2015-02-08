<?php

class BreedType extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'BreedType';
	protected $fillable = array('name', 'group_id');
	protected $guarded = array('id');


	public function breeds()
	{
		return $this->hasMany('Breed');
	}

}

