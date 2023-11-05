<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = new User();
        $user->id = "d95639b2-75a1-4a8c-8fc8-5c09c66fcd44";
        $user->username = 'User01';
        $user->email = 'user01@example.com';
        $user->password = Hash::make('password'); // You might need to replace Hash::make with the actual password hashing method you are using
        $user->firstname = 'user';
        $user->lastname = 'example';
        $user->isAdmin = false;
        $user->phone_no = '000-000-0000';
        $user->facebook = 'user example';
        $user->instagram = 'user01';
        $user->line = 'user01';
    }
}
