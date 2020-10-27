<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();

        Role::insert([
        	['name' => 'Admin'],
        	['name' => 'Editor'],
        	['name' => 'Author'],
        	['name' => 'Customer']
        ]);
    }
}
