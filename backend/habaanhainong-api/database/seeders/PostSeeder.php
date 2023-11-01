<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $animal1 = Animal::get()->first();
        $post = new Post();
        $post->title = "Adorable Cat for Adoption";
        $post->description = "This cute cat named น้องส้ม is looking for a loving home.";
        $post->address = "123 Main Street";
        $post->animal_id = $animal1->id;
        $post->save();
    }
}
