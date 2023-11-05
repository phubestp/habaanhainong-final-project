<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\AnimalType;
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
        $cat = new AnimalType();
        $cat->type = "แมว";
        $cat->save();

        $pig = new AnimalType();
        $pig->type = "หมู";
        $pig->save();

        $chicken = new AnimalType();
        $chicken->type = "ไก้";
        $chicken->save();

        $animal = new Animal();
        $animal->name = "น้องส้ม";
        $animal->animal_type = $cat->type;
        $animal->breed = "แมวส้ม";
        $animal->sex = AnimalSex::FEMALE;
        $animal->save();

        $animal = new Animal();
        $animal->name = "น้องKFC";
        $animal->animal_type = $chicken->type;
        $animal->breed = "ไก่บ้าน";
        $animal->sex = AnimalSex::MALE;
        $animal->save();

        $animal = new Animal();
        $animal->name = "น้องหมูหัน";
        $animal->animal_type = $pig->type;
        $animal->breed = "คุโรบูตะ";
        $animal->sex = AnimalSex::MALE;
        $animal->save();

        $animal = new Animal();
        $animal->name = "น้องTexas";
        $animal->animal_type = $chicken->type;
        $animal->breed = "ไก่ตอน";
        $animal->sex = AnimalSex::MALE;
        $animal->save();
    }
}
