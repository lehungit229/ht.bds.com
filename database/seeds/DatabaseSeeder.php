<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserCataloguesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
