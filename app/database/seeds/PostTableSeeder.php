<?php

class PostTableSeeder extends Seeder {

	public function run() 
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		$faker = Faker\Factory::create();

		PuppyPost::truncate();

		foreach(range(1,30) as $index) {
			PuppyPost::create([
				'title' => $faker->sentence(30),
				'description' => $faker->paragraph(3),
				'user_id' => $faker->numberBetween($min = 1, $max = 2),
				'created_at' => $faker->dateTimeThisYear()
			]);	
		}
	}
}

