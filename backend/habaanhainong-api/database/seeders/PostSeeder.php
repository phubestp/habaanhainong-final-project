<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::get()->first();

        $animal1 = Animal::get()->first();
        $post = new Post();
        $post->title = "Adorable Cat for Adoption";
        $post->description = "This cute cat named น้องส้ม is looking for a loving home.";
        $post->address = "123 Main Street";
        $post->animal = $animal1->id;
//        $user->all_posts()->save($post);
        $post->author = $user->username;
        $post->save();

        $animal2 = Animal::where('name', 'น้องKFC')->first();
        $post1 = new Post();
        $post1->title = "Adorable Cat for Adoption";
        $post1->description = "This cute cat named น้องKFC is looking for a loving home.";
        $post1->address = "123 Main Street";
        $post1->animal = $animal2->id;
//        $user->all_posts()->save($post1);
        $post1->author = $user->username;
        $post1->save();

        $animal2 = Animal::where('name', 'น้องTexas')->first();
        $post2 = new Post();
        $post2->title = "Adorable Cat for Adoption";
        $post2->description = "This cute cat named น้องTexas is looking for a loving home.";
        $post2->address = "123 Main Street";
        $post2->animal = $animal2->id;
//        $user->all_posts()->save($post2);
        $post2->author = $user->username;
        $post2->save();

    }
}
