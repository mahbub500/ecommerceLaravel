<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Schema::disableForeignKeyConstraints();
    	Category::truncate();

        Category::insert([
        	[
        		'name' => 'Man',
        		'slug' => 'man'
        	],
        	[
        		'name' => 'Women',
        		'slug' => 'women'
        	],
        	[
        		'name' => 'Kids',
        		'slug' => 'kids'
        	]
        ]);
    }
}
