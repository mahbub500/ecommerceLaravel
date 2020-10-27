<?php

use Illuminate\Database\Seeder;
use App\Brand;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Schema::disableForeignKeyConstraints();
    	Brand::truncate();

        Brand::insert([
        	[
        		'name' => 'Samsung',
        		'slug' => 'samsung'
        	],
        	[
        		'name' => 'Apple',
        		'slug' => 'apple'
        	],
        	[
        		'name' => 'Walton',
        		'slug' => 'walton'
        	],
        	[
        		'name' => 'Nokia',
        		'slug' => 'nokia'
        	],
        	[
        		'name' => 'Singer',
        		'slug' => 'singer'
        	],
        	[
        		'name' => 'Easy',
        		'slug' => 'easy'
        	],
        	[
        		'name' => 'Colors',
        		'slug' => 'colors'
        	],
        	[
        		'name' => 'Bata',
        		'slug' => 'bata'
        	],
        	[
        		'name' => 'Apex',
        		'slug' => 'apex'
        	]
        ]);
    }
}
