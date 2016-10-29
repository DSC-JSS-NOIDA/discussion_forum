<?php

use Illuminate\Database\Seeder;

class Articles1TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Article::class, 'technical',39)->create();
    }
}
