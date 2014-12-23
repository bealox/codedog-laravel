<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMultiTablesRelationship extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('Post', function($table)
		{
			$table->date('expired_at');
		});

		Schema::table('Metadata', function($table)
		{
			$table->boolean('show_details')->default(0);
		});

		Schema::table('User', function($table)
		{
			$table->boolean('enable')->default(0);
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
