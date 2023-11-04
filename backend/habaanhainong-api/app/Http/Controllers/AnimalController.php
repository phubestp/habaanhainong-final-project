<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::get();
        return $animals;
    }

    public function show(Animal $animal)
    {
        return $animal;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $breed = $request->get('breed');
        $animal_type = $request->get('animal_type');
        $sex = $request->get('sex');

        $animal = new Animal();
        $animal->name = $name;
        $animal->breed = $breed;
        $animal->animal_type = $animal_type;
        $animal->sex = $sex;
        $animal->save();
        $animal->refresh();
        return $animal;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $name = $request->get('name');
        $breed = $request->get('breed');
        $animal_type = $request->get('animal_type');
        $sex = $request->get('sex');

        $animal->name = $name;
        $animal->breed = $breed ?? null;
        $animal_type = $animal_type;
        $animal->sex = $sex;
        $animal->save();
        $animal->refresh();
        return $animal;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
    }
}
