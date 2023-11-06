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
        return response()->json(['is_success' => true, 'message' => 'Animals all', 'data' => Animal::all()]);
    }

    //GET /animals/{id}
    public function getFromId($id)
    {
        return response()->json(['is_success' => true, 'message' => 'Animal found', 'data' => Animal::find($id)]);
    }

    //GET /animals/type
    public function getAnimalsByTypeObject(Request $request)
    {
//        return $request;
        if ($request->has('animal_type')) {
            $animal_type_request = $request->get('animal_type');
            $type = AnimalType::find($animal_type_request->id);
        }
        else { //if ($request->has('type')) {
            $type = AnimalType::where('type', $request->get('type'))->first();
        }
        return $type;
//        return response()->json(['is_success' => true, 'message' => 'Animals found', 'data' => Animal::where('animal_type_id', $type)]);
    }

    //GET /animals/type/{type}
    public function getAnimalsByType($type)
    {
        $typeFound = AnimalType::where('type', $type)->first();
//        return $typeFound->id;
        return response()->json(['is_success' => true, 'message' => 'Animals found', 'data' => Animal::where('animal_type_id', $typeFound->id)]);
    }

    //GET /animals/post
    public function getAnimalsByPostObject(Request $request)
    {
        if ($request->has('post')) {
            $post_request = $request->get('post');
            $post = Post::find($post_request->id);
        }
        else { //if ($request->has('post_id')) {
            $post = Post::find($request->post_id);
        }
        return response()->json(['is_success' => true, 'message' => 'Animals found', 'data' => Animal::where('post_id', $post)]);
    }

    //GET /animals/post/{post_id}
    public function getAnimalsByPost($post_id)
    {
        $post = Post::find($post_id);
        return response()->json(['is_success' => true, 'message' => 'Animals found', 'data' => Animal::where('post_id', $post)]);
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

        return response()->json(['is_success' => true, 'message' => 'Animal added successfully', 'data' => $animal]);
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
            return response()->json(['is_success' => false, 'message' => 'Animal type \"' . $request->get('type') . '\" not found', 'data' => null]);
        }

        //update the animal
        $animal->name = $validatedData['name'];
        $animal->sex = $request->sex;
        $animal->breed = $request->breed;
        $animal->age = $request->age;
        $animal->animal_type_id = $animal_type->id;
        $animal->save();

        return response()->json(['is_success' => true, 'message' => 'Animal updated successfully', 'data' => $animal]);

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
            return response()->json(['is_success' => false, 'message' => 'Animal type \"' . $request->get('type') . '\" not found', 'data' => null]);
        }

        //update the animal
        $animal = Animal::find($validatedData['id']);
        $animal->name = $validatedData['name'];
        $animal->sex = $request->sex;
        $animal->breed = $request->breed;
        $animal->age = $request->age;
        $animal->animal_type_id = $animal_type->id;
        $animal->save();

        return response()->json(['is_success' => true, 'message' => 'Animal updated successfully', 'data' => $animal]);
    }

    //DELETE /animals/{animal}
    public function deleteWithId(Animal $animal)
    {
        $animal->delete();
        return response()->json(['is_success' => true, 'message' => 'Animal deleted successfully', 'data' => $animal]);
    }

    //DELETE /animals
    public function delete(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
        ]);

        $animal = Animal::find($validatedData['id']);
        $animal->delete();
        return response()->json(['is_success' => true, 'message' => 'Animal deleted successfully', 'data' => $animal]);
    }
}
