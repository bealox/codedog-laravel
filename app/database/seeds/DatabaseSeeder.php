<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('UserTableSeeder');
		$this->call('MetadataTableSeeder');
		$this->call('PostTableSeeder');
		//$this->call('BreedTypeTableSeeder');
		//$this->call('BreedTableSeeder');
	}

}
