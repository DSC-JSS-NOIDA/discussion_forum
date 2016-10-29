<?php

use Illuminate\Database\Seeder;

class Articles2TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Article::class, 'fun', 11)->create();
    }
}
