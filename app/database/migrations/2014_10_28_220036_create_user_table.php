<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::create('User', function($table)
	    {
		$table->increments('id');
		$table->string('class_name')->index();
		$table->string('email')->unique();
		$table->string('password', 64);
		$table->string('first_name', 32);
		$table->string('last_name', 32);
		$table->timestamps();
		$table->softDeletes();
		$table->smallInteger('registered');
	    });
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('User');
	}

}
