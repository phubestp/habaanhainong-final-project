<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\Post;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    //GET /animals
    public function getAll()
    {
        return response()->json(['is_success' => true, 'message' => 'AnimalController[getAll]: Animals all', 'data' => Animal::all()]);
    }

    //GET /animals/{id}
    public function getFromId($id)
    {
        return response()->json(['is_success' => true, 'message' => 'AnimalController[getFromId]: Animal found', 'data' => Animal::find($id)]);
    }

    //GET /animals/type/{type}
    public function getAnimalsByType($type)
    {
//        return "getAnimalsByType";
        $typeFound = AnimalType::where('type', $type)->first();
        $animals = Animal::where('animal_type_id', $typeFound->id)->get();

        return response()->json(['is_success' => true, 'message' => 'AnimalController[getAnimalsByType]: Animals found', 'data' => $animals]);
    }


    //GET /animals/post/{post_id}
    public function getAnimalsByPost($post_id)
    {
        $post = Post::find($post_id);
        return response()->json(['is_success' => true, 'message' => 'AnimalController[getAnimalsByPost]: Animals found', 'data' => Animal::where('post_id', $post)]);
    }

    //POST /animals
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
            return response()->json(['is_success' => false, 'message' => 'Animal type \"' . $request->get('type') . '\" not found', 'data' => null]);
        }

        //create the animal
        $animal = new Animal();
        $animal->name = $validatedData['name'];
        $animal->sex = $request->sex;
        $animal->breed = $request->breed;
        $animal->age = $request->age;
        $animal->animal_type_id = $animal_type->id;
        $animal->save();

        return response()->json(['is_success' => true, 'message' => 'AnimalController[add]: Animal added successfully', 'data' => $animal]);
    }

    //PUT /animals/{animal}
    public function saveWithId(Request $request, Animal $animal){
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        //verify that the animal type exists
        $animal_type = AnimalType::where('type', $request->get('type'))->first();
        if (!$animal_type) {
            return response()->json(['is_success' => false, 'message' => 'AnimalController[saveWithId]: Animal type \"' . $request->get('type') . '\" not found', 'data' => null]);
        }

        //update the animal
        $animal->name = $validatedData['name'];
        $animal->sex = $request->sex;
        $animal->breed = $request->breed;
        $animal->age = $request->age;
        $animal->animal_type_id = $animal_type->id;
        $animal->save();

        return response()->json(['is_success' => true, 'message' => 'AnimalController[saveWithId]: Animal updated successfully', 'data' => $animal]);

    }

    //PUT /animals
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
            return response()->json(['is_success' => false, 'message' => 'AnimalController[save]: Animal type \"' . $request->get('type') . '\" not found', 'data' => null]);
        }

        //update the animal
        $animal = Animal::find($validatedData['id']);
        $animal->name = $validatedData['name'];
        $animal->sex = $request->sex;
        $animal->breed = $request->breed;
        $animal->age = $request->age;
        $animal->animal_type_id = $animal_type->id;
        $animal->save();

        return response()->json(['is_success' => true, 'message' => 'AnimalController[save]: Animal updated successfully', 'data' => $animal]);
    }

    //DELETE /animals/{animal}
    public function deleteWithId(Animal $animal)
    {
        $animal->delete();
        return response()->json(['is_success' => true, 'message' => 'AAnimalController[deleteWithId]: nimal deleted successfully', 'data' => $animal]);
    }

    //DELETE /animals
    public function delete(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
        ]);

        $animal = Animal::find($validatedData['id']);
        $animal->delete();
        return response()->json(['is_success' => true, 'message' => 'AAnimalController[delete]: Animal deleted successfully', 'data' => $animal]);
    }
}
