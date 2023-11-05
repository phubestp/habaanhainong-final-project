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
        // User::create([
        //     'id' => 'd95639b2-75a1-4a8c-8fc8-5c09c66fcd44',
        //     'username' => 'user01',
        //     'password' => Hash::make('password'),
        //     'firstname' => 'user',
        //     'lastname' => 'example',
        //     'isAdmin' => false,
        //     'phone_no' => '000-000-0000',
        //     'facebook' => 'user example',
        //     'instagram' => 'user01',
        //     'line' => 'user01'
        // ]);
        
        $this->call([
            UserSeeder::class,
            AnimalSeeder::class,
            PostSeeder::class,
        ]);

        

        // User::factory(10)->create();
    }
}
