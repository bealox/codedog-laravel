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
	protected $fillable = array('address', 'suburb', 'postcode', 'latitude', 'longitude', 'state', 'phone_no', 'postoffice_id');

	/**
	 * List of attributes not allow to be mass-assignable
	 *
	 * @var array
	 */
	protected $guarded = array('id');

	protected $dates = ['deleted_at'];

	public function area() 
	{
		return $this->suburb . " ". $this->postcode. " ".$this->state;
	}

}

