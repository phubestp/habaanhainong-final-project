<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AnimalSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'User01',
            'email' => 'user01@example.com',
            'password' => Hash::make('password'),
        ]);

        User::factory(10)->create();
    }
}
