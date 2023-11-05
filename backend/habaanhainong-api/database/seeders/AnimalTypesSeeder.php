<?php

namespace Database\Seeders;

use App\Models\AnimalType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cat = new AnimalType();
        $cat->type = "Cat";
        $cat->save();

        $pig = new AnimalType();
        $pig->type = "Pig";
        $pig->save();

        $chicken = new AnimalType();
        $chicken->type = "Chicken";
        $chicken->save();
    }
}
