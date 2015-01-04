<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakePostAttrNullable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		    DB::statement('ALTER TABLE `Post` MODIFY `user_id` INTEGER UNSIGNED NULL;');
		    DB::statement('ALTER TABLE `Post` MODIFY `breed_id` INTEGER UNSIGNED NULL;');
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
