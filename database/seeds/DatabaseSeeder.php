<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(Articles1TableSeeder::class);
        $this->call(Articles2TableSeeder::class);
        $this->call(Articles3TableSeeder::class);
        $this->call(Articles4TableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(RatingsTableSeeder::class);
    }
}
