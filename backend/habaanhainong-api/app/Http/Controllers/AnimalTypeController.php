<?php

namespace App\Http\Controllers;

use App\Models\AnimalType;
use Illuminate\Http\Request;

class AnimalTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animalTypes = AnimalType::get();
        return $animalTypes;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $animal_type_name = $request->get('type');
        $animal_type = new AnimalType();
        $animal_type->type = $animal_type_name;
        $animal_type->save();
        return $animal_type;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnimalType $animalType)
    {
        $animal_type_name = $request->get('type');
        $animalType->type = $animal_type_name;
        $animalType->save();
        return $animalType;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnimalType $animalType)
    {
        $animalType->delete();
    }
}
