<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Metadata extends BaseModel{

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Metadata';

	/** 
	 * list of attributes allow to be mass-assignable
	 *
	 * @var array
	 */
	protected $fillable = array('address', 'suburb', 'postcode', 'latitude', 'longitude');

	protected $dates = ['deleted_at'];

}

