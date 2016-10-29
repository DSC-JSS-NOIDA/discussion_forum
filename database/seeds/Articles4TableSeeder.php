<?php

use Illuminate\Database\Seeder;

class Articles4TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Article::class, 'business', 17)->create();
    }
}
