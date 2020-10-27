<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();

        User::insert([
        	[
        		'name' => 'Creative Shaper',
		        'email' => 'mahbub@gmail.com',
		        'email_verified_at' => now(),
		        'password' => bcrypt('12345'),
		        'role_id' => 1
		    ],

		    [
        		'name' => 'Shahadat Hossain',
		        'email' => 'maruf@gmail.com',
		        'email_verified_at' => now(),
		        'password' => bcrypt('12345'),
		        'role_id' => 4
		    ]
        ]);
    }
}
