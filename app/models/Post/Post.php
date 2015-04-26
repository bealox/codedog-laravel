<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Codedog\Observers\PostObserver;

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
		return $this->belongsTo('User');
	}

	public function breed()
	{
		return $this->belongsTo('Breed');
	}

	public function scopeSessionUser($query) 
	{
		return $query->where('user_id', '=', Auth::user()->id);
	}

	public function scopeActive($query)
	{
		return $query->where('expired_at', '>', new \DateTime('today'));  
	}

	public function scopeExpired($query)
	{
		return $query->where('expired_at', '<', new \DateTime('today'));  
	}

	public function scopeSortBy($query)
	{
		return $query->orderBy('updated_at','created_at');
	}

	public static function image_path()
	{
		return	public_path().'/img/post/';
	}

	public static function display_image_path()
	{
		return	'img/post/';
	}
}

