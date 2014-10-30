<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostBreedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('Breed_Post', function($table)
	    {
		$table->integer('breed_id')->unsigned();
		$table->integer('post_id')->unsigned();
		/**$table->primary(array('post_id', 'user_id'));**/
		$table->foreign('breed_id')->references('id')->on('Breed')->onDelete('cascade');
		$table->foreign('post_id')->references('id')->on('Post')->onDelete('cascade');
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
	    Schema::table('Breed_Post', function($table)
	    {
		$table->dropForeign('breed_id');	
		$table->dropForeign('post_id');	
	    });

	    Schema::drop('Breed_Post');
	}

}
