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
        $user->id = 0;
        $user->username = 'User01';
        $user->password = Hash::make('password'); // You might need to replace Hash::make with the actual password hashing method you are using
        $user->firstname = 'user';
        $user->lastname = 'example';
        $user->isAdmin = true;
        $user->isBan = false;
        $user->phone_no = '000-000-0000';
        $user->facebook = 'user example';
        $user->instagram = 'user01';
        $user->line = 'user01';

        $user = new User();
        $user->id = 1;
        $user->username = 'User02';
        $user->password = Hash::make('password'); // You might need to replace Hash::make with the actual password hashing method you are using
        $user->firstname = 'user02';
        $user->lastname = 'example';
        $user->isAdmin = false;
        $user->isBan = false;
        $user->phone_no = '000-000-0000';
        $user->facebook = 'user example';
        $user->instagram = 'user01';
        $user->line = 'user01';
    }
}
