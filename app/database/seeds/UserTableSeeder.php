<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('User')->delete();
		DogBreeder::create(array(
			'first_name'     => 'Chris',
			'last_name' => 'sevilayha',
			'email'    => 'chris@scotch.io',
			'password' => Hash::make('awesome'),
		));
	}

}

