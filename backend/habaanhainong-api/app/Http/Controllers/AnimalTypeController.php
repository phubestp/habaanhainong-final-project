<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalType;
use Illuminate\Http\Request;

class AnimalTypeController extends Controller
{

    //GET /animal-types/get
    public function getAll()
    {
        return response()->json(['is_success' => true, 'message' => 'Animal types all', 'data' => AnimalType::all()]);
        //AnimalType::all();
    }

    //GET /animal-types/get/type-list
    public function getTypeList()
    {
        return response()->json(['is_success' => true, 'message' => 'Animal types string list', 'data' => AnimalType::all()->pluck('type')]);
        //AnimalType::all()->pluck('type');
    }

    //GET /animal-types/get/animal/{animal_id}
    public function getTypesByAnimalId($animal_id)
    {
        $animal = Animal::find($animal_id);
        if (!$animal) {
            return response()->json(['is_success' => false, 'message' => 'Animal with id \"' . $animal_id . '\"
             not found', 'data' => null]);
        }
        return response()->json(['is_success' => true, 'message' => 'Animal found', 'data' => $animal->animalType]);
    }

    //GET /animal-types/get/animal
    public function getTypesByAnimalObject(Request $request)
    {
        if ($request->has('animal')) {
            $animal = $request->get('animal');
            $animal_id = $animal->id;
        }
        else {
            $animal_id = $request->get('animal_id');
        }
        $animal = Animal::find($animal_id);
        if (!$animal) {
            return response()->json(['is_success' => false, 'message' => 'Animal with request \"' . $request->getContent() . '\"
             not found', 'data' => null]);
        }
        return response()->json(['is_success' => true, 'message' => 'Animal found', 'data' => $animal->animalType]);
    }


    //POST /animal-types/add
    public function add(Request $request)
    {
        $animal_type_name = $request->get('type');
        $animal_type = new AnimalType();
        $animal_type->type = $animal_type_name;
        $animal_type->save();
        return response()->json(['is_success' => true, 'message' => 'Animal type added successfully', 'data' => $animal_type]);
    }

    //PUT /animal-types/save/{type}
    public function saveWithType(Request $request, $type)
    {
        $animal_request_type = $request->get('type');
        $animal_type = self::getByType($type);
        if (!$animal_type) {
            return response()->json(['is_success' => false, 'message' => 'Animal type \"' . $type . '\"
             not found', 'data' => null]);
        }
        $animal_type->type = $animal_request_type;
        $animal_type->save();
        return response()->json(['is_success' => true, 'message' => 'Animal type updated successfully', 'data' => $animal_type]);
    }

    //PUT /animal-types/save
    public function save(Request $request)
    {
        $animal_type_name = $request->get('type');
        $old_animal_type_name = $request->get('old_type');
        $animal_type = self::getByType($old_animal_type_name);
        if (!$animal_type) {
            return response()->json(['is_success' => false, 'message' => 'Animal type \"' . $old_animal_type_name . '\"
             not found', 'data' => null]);
        }
        $animal_type->type = $animal_type_name;
        $animal_type->save();
        return response()->json(['is_success' => true, 'message' => 'Animal type updated successfully', 'data' => $animal_type]);
    }

    //DELETE /animal-types/delete/{type}
    public function deleteWithType($type)
    {
        $animal_type = self::getByType($type);
        if (!$animal_type) {
            return response()->json(['is_success' => false, 'message' => 'Animal type \"' . $type . '\"
             not found', 'data' => null]);
        }
        $animal_type->delete();
        return response()->json(['is_success' => true, 'message' => 'Animal type deleted successfully', 'data' => $animal_type]);
    }

    //DELETE /animal-types/delete
    public function delete(Request $request)
    {
        $animal_type_name = $request->get('type');
        $animal_type = self::getByType($animal_type_name);
        if (!$animal_type) {
            return response()->json(['is_success' => false, 'message' => 'Animal type \"' . $animal_type_name . '\"
             not found', 'data' => null]);
        }
        $animal_type->delete();
        return response()->json(['is_success' => true, 'message' => 'Animal type deleted successfully', 'data' => $animal_type]);
    }

    private static function getByType($type) : ?AnimalType
    {
        $animal_types = AnimalType::where('type', $type);
        if (!$animal_types) {
            return null;
        }
        return $animal_types->first();
    }

}
