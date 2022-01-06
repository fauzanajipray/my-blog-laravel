<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Uncommet bellow to seed all table
         * and run the seeder ( php artisan migrate:refresh --seed )
         * 
         */
        // User::factory(10)->create();
        // Message::factory(10)->create();
        // Post::factory(5)->create();
    }
}
