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

	/** 
	 * list of attributes allow to be mass-assignable
	 *
	 * @var array
	 */
	protected $fillable = array('title', 'description');

	protected $dates = ['deleted_at'];

	public function users()
	{
		return $this->belongsToMany('User','Post_User', 'post_id', 'user_id');
	}
}

