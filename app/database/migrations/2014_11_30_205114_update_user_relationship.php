<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserRelationship extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('User', function($table)
		{
			$table->integer('metadata_id')->unsigned()->nullable();
			$table->foreign('metadata_id')->references('id')->on('Metadata');
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
	    Schema::table('User', function($table)
	    {
		$table->dropForeign('metadata_id');	
	    });
	}

}
