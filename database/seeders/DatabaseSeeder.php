<?php

namespace Database\Seeders;

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
         $this->call(LaratrustSeeder::class);
//         $this->call(UserSeeder::class);
//         $this->call(StateSeeder::class);
//         $this->call(NationalitySeeder::class);
//         $this->call(CategoriesSeeder::class);
    }
}
