<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('Post_User', function($table)
	    {
		$table->integer('post_id')->unsigned();
		$table->integer('user_id')->unsigned();
		/**$table->primary(array('post_id', 'user_id'));**/
		$table->foreign('post_id')->references('id')->on('Post')->onDelete('cascade');
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
	    Schema::table('Post_User', function($table)
	    {
		$table->dropForeign('post_id');	
		$table->dropForeign('user_id');	
	    });

	    Schema::drop('Post_User');
	}

}
