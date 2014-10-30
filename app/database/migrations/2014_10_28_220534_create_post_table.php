<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('Post', function($table)
	    {
		$table->increments('id');
		$table->string('class_name')->index();
		$table->string('title', 100);
		$table->mediumText('description');
		$table->timestamps();
		$table->softDeletes();
	    });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		
	    Schema::table('Post', function($table)
	    {
		$table->dropForeign('breed_id');	
	    });

		Schema::drop('Post');
	}

}
