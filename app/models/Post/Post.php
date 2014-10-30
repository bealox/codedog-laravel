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

	protected $sitClassField = 'class_name';
	protected $stiBaseClass = 'Post';

}

