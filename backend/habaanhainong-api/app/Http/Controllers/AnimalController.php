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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = $request->get('user_id');
        $name = $request->get('name');
        $breed = $request->get('breed');
        $type = $request->get('type');
        $sex = $request->get('sex');

        $animal = new Animal();
        $animal->name = $name;
        $animal->breed = $breed;
        $animal->type = $type;
        $animal->sex = $sex;
        $animal->user_id = $user_id;
        $animal->save();
        $animal->refresh();
        return $animal;
        //$table->string('name');
        //$table->string('breed')->nullable();
        //$table->string('type');
        //$table->string('sex')->nullable();
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        return $animal;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $name = $request->get('name');
        $breed = $request->get('breed');
        $type = $request->get('type');
        $sex = $request->get('sex');

        $animal->name = $name;
        $animal->breed = $breed ?? null;
        $animal->type = $type;
        $animal->sex = $sex ?? null;
        $animal->save();
        $animal->refresh();
        return $animal;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        if ($animal->user->isEmpty()) {
            $animal->delete();
        }
    }
}
