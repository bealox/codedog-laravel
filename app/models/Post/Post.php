<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Post extends BaseModel{

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Post';
	protected $softDelete = true;

	protected $sitClassField = 'class_name';
	protected $stiBaseClass = 'Post';

	/** 
	 * list of attributes allow to be mass-assignable
	 *
	 * @var array
	 */
	protected $fillable = array('title', 'description');

	protected $dates = ['deleted_at'];

	public function user()
	{
		return $this->belongTo('User');
	}

	public function breed()
	{
		return $this->belongTo('Breed');
	}
}

