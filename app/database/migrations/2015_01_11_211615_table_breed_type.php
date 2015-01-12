<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableBreedType extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('BreedType', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('name', 100);
			$table->tinyInteger('group_id')->unsigned();
			$table->timestamps();
		});

		Schema::table('Breed', function($table){
			$table->integer('breedtype_id')->unsigned();
			$table->foreign('breedtype_id')->references('id')->on('BreedType')->onDelete('cascade');
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
