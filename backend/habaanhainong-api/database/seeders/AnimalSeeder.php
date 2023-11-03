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
        $animal->animal_type = "แมว";
        $animal->breed = "แมวส้ม";
        $animal->sex = AnimalSex::FEMALE;
        $animal->save();

        $animal = new Animal();
        $animal->name = "น้องKFC";
        $animal->animal_type = "ไก่";
        $animal->breed = "ไก่บ้าน";
        $animal->sex = AnimalSex::MALE;
        $animal->save();

        $animal = new Animal();
        $animal->name = "น้องหมูหัน";
        $animal->animal_type = "หมู";
        $animal->breed = "คุโรบูตะ";
        $animal->sex = AnimalSex::MALE;
        $animal->save();

        $animal = new Animal();
        $animal->name = "น้องTexas";
        $animal->animal_type = "ไก่";
        $animal->breed = "ไก่ตอน";
        $animal->sex = AnimalSex::MALE;
        $animal->save();
    }
}
