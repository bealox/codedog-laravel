<?php


use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends BaseModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'User';

	protected $sitClassField = 'class_name';
	protected $stiBaseClass = 'User';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/** 
	 * list of attributes allow to be mass-assignable
	 *
	 * @var array
	 */
	protected $fillable = array('first_name', 'last_name', 'email');

	/**
	 * List of attributes not allow to be mass-assignable
	 *
	 * @var array
	 */
	protected $guarded = array('id', 'password');

	protected $dates = ['deleted_at'];

	public function breeds()
	{
		return $this->belongsToMany('Breed');
	}

	public function posts()
	{
		return $this->belongToMany('Post');
	}

	public function metadata()
	{
		return $this->hasOne('Metadata');
	}

	public function getRememberToken()
	{
		    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		    return 'remember_token';
	}
}

