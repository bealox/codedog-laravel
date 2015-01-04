<?php

class PostTableSeeder extends Seeder {

	public function run() 
	{
		Eloquent::unguard();

		$faker = Faker\Factory::create();

		PuppyPost::truncate();

		foreach(range(1,30) as $index) {
			PuppyPost::create([
				'title' => $faker->sentence(30),
				'description' => $faker->paragraph(3),
				'user_id' => 42,
				'image_url' => $faker->imageUrl(67,67),
				'created_at' => $faker->dateTimeThisYear()
			]);	
		}
	}
}

