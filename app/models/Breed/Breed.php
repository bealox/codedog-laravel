<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Breed extends BaseModel {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Breed';

	protected $sitClassField = 'class_name';
	protected $stiBaseClass = 'Breed';

	protected $dates = ['deleted_at'];

	public function users() {
		return $this->belongToMany('User');
	}

}
