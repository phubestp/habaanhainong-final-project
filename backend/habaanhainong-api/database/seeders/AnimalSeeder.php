<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Enums\AnimalSex;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $animal = new Animal();
        $animal->name = "น้องส้ม";
        $animal->type = "แมว";
        $animal->breed = "แมวส้ม";
        $animal->sex = AnimalSex::FEMALE;
        $animal->user_id = 1;
        $animal->save();
    }
}
