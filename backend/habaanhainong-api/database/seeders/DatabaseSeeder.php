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
        User::create([
            'username' => 'user01',
            'email' => 'user01@example.com',
            'password' => Hash::make('password'),
            'firstname' => 'user',
            'lastname' => 'example',
            'isAdmin' => false,
            'phone_no' => '000-000-0000',
            'facebook' => 'user example',
            'instagram' => 'user01',
            'line' => 'user01'
        ]);
        
        $this->call([
            UserSeeder::class,
            AnimalSeeder::class,
            PostSeeder::class,
        ]);

        

        // User::factory(10)->create();
    }
}
