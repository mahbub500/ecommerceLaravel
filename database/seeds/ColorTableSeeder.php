<?php

use Illuminate\Database\Seeder;
use App\Color;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Schema::disableForeignKeyConstraints();
    	Color::truncate();

        Color::insert([
        	[
        		'name' => 'Black',
        		'slug' => 'black',
        		'code' => '#000'
        	],
        	[
        		'name' => 'White',
        		'slug' => 'white',
        		'code' => '#fff'
        	],
        	[
        		'name' => 'Red',
        		'slug' => 'red',
        		'code' => '#f00'
        	],
        	[
        		'name' => 'Green',
        		'slug' => 'green',
        		'code' => '#0f0'
        	],
        	[
        		'name' => 'Blue',
        		'slug' => 'blue',
        		'code' => '#00f'
        	]
        ]);
    }
}
