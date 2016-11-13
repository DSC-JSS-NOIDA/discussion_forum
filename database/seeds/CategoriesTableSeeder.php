<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	'category_name' => 'Technical',
        	'article_count' => '39',
        ]);
        DB::table('categories')->insert([
        	'category_name' => 'Fun',
        	'article_count' => '11',
        ]);
        DB::table('categories')->insert([
        	'category_name' => 'Academics',
        	'article_count' => '25',
        ]);
        DB::table('categories')->insert([
        	'category_name' => 'Business',
        	'article_count' => '17',
        ]);

    }
}
