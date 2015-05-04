<?php

use Codedog\Observers\PostObserver;


class PuppyPost extends Post {
	protected $stiClassField = 'class_name';
	protected $stiBaseClass = 'Post';

	public static function boot()
	{
		parent::boot();
		PuppyPost::observe(new PostObserver);
	}
}

?>
