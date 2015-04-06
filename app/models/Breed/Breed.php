<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

use Codedog\Utilities\General;

class Breed extends BaseModel {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Breed';
	protected $softDelete = true;

	protected $sitClassField = 'class_name';
	protected $stiBaseClass = 'Breed';

	protected $dates = ['deleted_at'];

	public function users() {
		return $this->belongsToMany('User', 'Breed_User');
	}

	public function users_by_state(){
		return users()->orderBy('state')->get();	
	}
	
	public function posts() {
		return $this->hasMany('Post');
	}
	
	public function active_posts() {
		return $this->posts()->where('expired_at', '>', new \DateTime('today'));
	}

	public function breedtype(){
		return $this->belongsTo('BreedType');
	}

	public function transcated_name(){
		$general = new General();
		$text = $general->truncate($this->name, 35);
		return $text;
	}
}

