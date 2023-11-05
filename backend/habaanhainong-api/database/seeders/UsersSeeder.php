<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = new User();
        $user1->username = 'sampleuser1';
        $user1->email = 'user1@example.com';
        $user1->password = Hash::make('password123');
        $user1->firstname = 'John';
        $user1->lastname = 'Doe';
        $user1->isAdmin = 0;
        $user1->phone_no = '123-456-7890';
        $user1->save();

        $user2 = new User();
        $user2->username = 'sampleuser2';
        $user2->email = 'user2@example.com';
        $user2->password = Hash::make('password456');
        $user2->firstname = 'Jane';
        $user2->lastname = 'Smith';
        $user2->isAdmin = 1; // An admin user
        $user2->phone_no = '987-654-3210';
        $user2->save();
    }
}
