<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMetadata extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('Metadata', function($table)
		{
			$table->increments('id');
			$table->string('address');
			$table->string('suburb', 50);
			$table->string('latitude');
			$table->string('longitude');
			$table->integer('postcode');
		}
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
