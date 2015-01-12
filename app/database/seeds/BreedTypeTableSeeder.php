<?php

class BreedTypeTableSeeder extends Seeder
{

	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');

		BreedType::truncate();

		BreedType::create(array(
			'name'     => 'Toys',
			'group_id' => '1',
		));
		BreedType::create(array(
			'name'     => 'Terriers',
			'group_id' => '2',
		));
		BreedType::create(array(
			'name'     => 'Gundogs',
			'group_id' => '3',
		));
		BreedType::create(array(
			'name'     => 'Hounds',
			'group_id' => '4',
		));
		BreedType::create(array(
			'name'     => 'Working Dogs',
			'group_id' => '5',
		));
		BreedType::create(array(
			'name'     => 'Utility',
			'group_id' => '6',
		));
		BreedType::create(array(
			'name'     => 'Non Sporting',
			'group_id' => '7',
		));
	}

}

