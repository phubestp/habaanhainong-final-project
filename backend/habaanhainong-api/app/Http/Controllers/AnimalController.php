<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\Enums\AnimalSex;
use App\Models\Post;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    //GET /animals/get
    public function getAll()
    {
        return Animal::all();
    }

    //GET /animal/get/id/{id}
    public function getFromId($id)
    {
        return Animal::find($id);
    }

    //GET /animals/get/type/{type}
    public function getAnimalsByType($type)
    {
//        return "getAnimalsByType";
        $typeFound = AnimalType::where('type', $type)->first();
        $animals = Animal::where('animal_type_id', $typeFound->id)->get();

        return $animals;
    }


    //GET /animal/get/post/{post_id}
    public function getAnimalsByPost($post_id)
    {
        $post = Post::find($post_id);
        return Animal::where('post_id', $post);
    }

    //GET /animals/get/sex-list
    public function getSexList(){
        $sexList = [AnimalSex::UNKNOWN, AnimalSex::NOT_SPECIFIED, AnimalSex::MALE, AnimalSex::FEMALE];
        return $sexList;
    }

    //POST /animals/add
    public function add(Request $request)
    {
        //verify that the animal data is present
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        //verify that the animal type exists
        $animal_type = AnimalType::where('type', $request->get('type'))->first();
        if (!$animal_type) {
            return null;
        }

        //create the animal
        $animal = new Animal();
        $animal->name = $validatedData['name'];
        $animal->sex = $request->sex;
        $animal->breed = $request->breed;
        $animal->age = $request->age;
        $animal->animal_type_id = $animal_type->id;
        $animal->save();

        return $animal;
    }

    //PUT /animals/save/{id}
    public function saveWithId(Request $request, Animal $animal){
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        //verify that the animal type exists
        $animal_type = AnimalType::where('type', $request->get('type'))->first();
        if (!$animal_type) {
            return null;
        }

        //update the animal
        $animal->name = $validatedData['name'];
        $animal->sex = $request->sex;
        $animal->breed = $request->breed;
        $animal->age = $request->age;
        $animal->animal_type_id = $animal_type->id;
        $animal->save();

        return $animal;

    }

    //PUT /animals/save
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'type' => 'required',
        ]);

        //verify that the animal type exists
        $animal_type = AnimalType::where('type', $request->get('type'))->first();
        if (!$animal_type) {
            return null;
        }

        //update the animal
        $animal = Animal::find($validatedData['id']);
        $animal->name = $validatedData['name'];
        $animal->sex = $request->sex;
        $animal->breed = $request->breed;
        $animal->age = $request->age;
        $animal->animal_type_id = $animal_type->id;
        $animal->save();

        return $animal;
    }

    //DELETE /animals/delete/{id}
    public function deleteWithId(Animal $animal)
    {
        $animal->delete();
        return $animal;
    }

    //DELETE /animals/delete
    public function delete(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
        ]);

        $animal = Animal::find($validatedData['id']);
        $animal->delete();
        return $animal;
    }
}
