<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // You can call other seeder classes here to seed your data
        $this->call(UsersSeeder::class);
        $this->call(AnimalTypesSeeder::class);
        $this->call(AnimalsSeeder::class);
        // Add seeder classes as needed
    }
}
