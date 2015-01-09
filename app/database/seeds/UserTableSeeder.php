<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		$faker = Faker\Factory::create();

		DogBreeder::truncate();

		DogBreeder::create(array(
			'first_name'     => 'Andy',
			'last_name' => 'sevilayha',
			'email'    => 'endiiix@hotmail.com',
			'password' => 'Yahoo000',
			'confirmed' => 1,
			'thumbnail_url' => $faker->imageUrl(67,67),
		));
		DogBreeder::create(array(
			'first_name'     => 'Hiroko',
			'last_name' => 'sevilayha',
			'email'    => 'hiloko010310@gmail.com',
			'password' => 'Yahoo000',
			'confirmed' => 1,
			'thumbnail_url' => $faker->imageUrl(67,67),
		));
	}

}

