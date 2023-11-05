<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\AnimalType;
use Illuminate\Database\Seeder;

class AnimalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cat = AnimalType::where('type', 'Cat')->first();
        $pig = AnimalType::where('type', 'Pig')->first();
        $chicken = AnimalType::where('type', 'Chicken')->first();

        $animal = new Animal();
        $animal->name = "Whiskers";
        $animal->animal_type = $cat->type;
        $animal->breed = "Siamese";
        $animal->sex = "Male";
        $animal->save();

        $animal = new Animal();
        $animal->name = "Porky";
        $animal->animal_type = $pig->type;
        $animal->breed = "Berkshire";
        $animal->sex = "Female";
        $animal->save();

        $animal = new Animal();
        $animal->name = "Rooster";
        $animal->animal_type = $chicken->type;
        $animal->breed = "Rhode Island Red";
        $animal->sex = "Male";
        $animal->save();
    }
}
