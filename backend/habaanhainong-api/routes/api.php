<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//AnimalType
Route::get('/animal-types', [AnimalTypeController::class, 'getAll']);
Route::get('/animal-types/list', [AnimalTypeController::class, 'getTypeList']);
Route::get('/animal-types/animals/{animal_id}', [AnimalTypeController::class, 'getTypesByAnimalId']);
Route::get('/animal-types/animals', [AnimalTypeController::class, 'getAnimals']);
Route::post('/animal-types', [AnimalTypeController::class, 'add']);
Route::put('/animal-types/{type}', [AnimalTypeController::class, 'saveWithType']);
Route::put('/animal-types', [AnimalTypeController::class, 'save']);
Route::delete('/animal-types/{type}', [AnimalTypeController::class, 'deleteWithType']);
Route::delete('/animal-types', [AnimalTypeController::class, 'delete']);


//Animal
Route::get('/animals', [AnimalController::class, 'getAll']);
Route::get('/animals/{id}', [AnimalController::class, 'getFromId']);
Route::get('/animals/type/{type}', [AnimalController::class, 'getAnimalsByType']);
Route::get('/animals/post/{post_id}', [AnimalController::class, 'getAnimalsByPost']);
Route::post('/animals', [AnimalController::class, 'add']);
Route::put('/animals/{id}', [AnimalController::class, 'saveWithId']);
Route::put('/animals', [AnimalController::class, 'save']);
Route::delete('/animals/{id}', [AnimalController::class, 'deleteWithId']);
Route::delete('/animals', [AnimalController::class, 'delete']);
