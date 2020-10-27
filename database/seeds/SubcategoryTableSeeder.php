<?php

use Illuminate\Database\Seeder;
use App\Subcategory;

class SubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Schema::disableForeignKeyConstraints();
    	Subcategory::truncate();
    	
        Subcategory::insert([
        	[
        		'category_id' => '1',
        		'name' => 'Shirt',
        		'slug' => 'shirt'
        	],
        	[
        		'category_id' => '1',
        		'name' => 'T-shirt',
        		'slug' => 't-shirt'
        	],
        	[
        		'category_id' => '1',
        		'name' => 'Pant',
        		'slug' => 'pant'
        	],
        	[
        		'category_id' => '2',
        		'name' => 'Shari',
        		'slug' => 'shari'
        	],
        	[
        		'category_id' => '2',
        		'name' => 'Sheloware Kamiz',
        		'slug' => 'sheloware-kamiz'
        	],
        	[
        		'category_id' => '2',
        		'name' => 'Hijab',
        		'slug' => 'hijab'
        	],
        	[
        		'category_id' => '3',
        		'name' => 'Toys',
        		'slug' => 'toys'
        	],
        	[
        		'category_id' => '3',
        		'name' => 'Sunglass',
        		'slug' => 'sunglass'
        	]
        ]);
    }
}
