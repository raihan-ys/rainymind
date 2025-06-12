<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert([
    	[
				'name' => 'User 1',
				'username' => 'user1',
				'email' => 'user1@gmail.com',
				'birthdate' => '1990-01-01',
				'password' => Hash::make('password123'),
				'role' => 'admin',
				'created_at' => now(),
			],
			[
				'name' => 'User 2',
				'username' => 'user2',
				'email' => 'user2@gmail.com',
				'birthdate' => '1992-02-02',
				'password' => Hash::make('password123'),
				'role' => 'member',
				'created_at' => now(),
			],
			[
				'name' => 'User 3',
				'username' => 'user3',
				'email' => 'user3@gmail.com',
				'birthdate' => '1993-03-03',
				'password' => Hash::make('password123'),
				'role' => 'member',
				'created_at' => now(),
			]
    ]);
  }
}
