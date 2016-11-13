<?php

use Illuminate\Database\Seeder;

class Articles3TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Article::class, 'academics', 25)->create();
    }
}
