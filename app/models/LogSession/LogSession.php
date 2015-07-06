<?php


class LogSession extends Eloquent{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'LogSession';

	//Turn off timestamps update_at created_at
	public $timestamps = false;

	/** 
	 * list of attributes allow to be mass-assignable
	 *
	 * @var array
	 */
	protected $fillable = array('ip_address', 'logged_in', 'user_id');

	/**
	 * List of attributes not allow to be mass-assignable
	 *
	 * @var array
	 */
	protected $guarded = array('id');


	
	public function user() {
		    return $this->belongsTo('User');
	}

}
