<?php

class MetadataTableSeeder extends Seeder
{

	public function run()
	{

		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Metadata::truncate();

		Metadata::create(array(
			'address' => 'Rest rd',
			'suburb' => 'Mooroolbark',
			'postcode' => '3138',
			'user_id' => 1,
			'state' => 'VIC'	
		));

		Metadata::create(array(
			'address' => 'Rest rd',
			'suburb' => 'Mooroolbark',
			'postcode' => '3138',
			'user_id' => 2,
			'state' => 'VIC'	
		));

	}
}
