<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreedUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('Breed_User', function($table)
	    {
		$table->integer('breed_id')->unsigned();
		$table->integer('user_id')->unsigned();
		/**$table->primary(array('breed_id', 'user_id'));**/
		$table->foreign('breed_id')->references('id')->on('Breed')->onDelete('cascade');
		$table->foreign('user_id')->references('id')->on('User')->onDelete('cascade');
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
	    Schema::table('Breed_User', function($table)
	    {
		$table->dropForeign('breed_id');	
		$table->dropForeign('user_id');	
	    });

		Schema::drop('Breed_User');
	}

}
