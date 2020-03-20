<?php

use App\Models\BlogPosts;
use Illuminate\Database\Seeder;
use Illuminate\Database\Factory;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(BlogCategoriesTableSeeder::class);
         factory(App\Models\BlogPosts::class, 100)->create();        
    }
}

