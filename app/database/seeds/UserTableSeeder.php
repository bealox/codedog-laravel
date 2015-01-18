<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		$faker = Faker\Factory::create();

		DogBreeder::truncate();
		DB::table('Breed_User')->truncate();
		$user = DogBreeder::create(array(
			'first_name'     => 'Andy',
			'last_name' => 'sevilayha',
			'email'    => 'endiiix@hotmail.com',
			'password' => 'Yahoo000',
			'confirmed' => 1,
			'thumbnail_url' => $faker->imageUrl(67,67),
			'membership_no' => '12345',
		));
		$user->breeds()->sync([100,1]);
		$user2 = DogBreeder::create(array(
			'first_name'     => 'Hiroko',
			'last_name' => 'sevilayha',
			'email'    => 'hiloko010310@gmail.com',
			'password' => 'Yahoo000',
			'confirmed' => 1,
			'thumbnail_url' => $faker->imageUrl(67,67),
			'membership_no' => '43221',
		));
		$user2->breeds()->sync([120, 25]);
	}

}

