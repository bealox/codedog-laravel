<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 Schema::create('LogSession', function($table) {
                    $table->increments('id');
                    $table->string('ip_address', 45);
                    $table->dateTime('logged_in');
                    $table->integer('user_id')->unsigned();
					$table->foreign('user_id')->references('id')->on('User');
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
