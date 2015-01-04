<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropBreedPostAddForeignkeyToPost extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('Post', function($table){
			$table->integer('breed_id')->unsigned();
			$table->foreign('breed_id')->references('id')->on('Breed');
			$table->index('breed_id');
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
	}

}
