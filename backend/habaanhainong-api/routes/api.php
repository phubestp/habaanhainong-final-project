<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ApplicantController;
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

Route::resource('/animals', AnimalController::class); 
Route::resource('/animals-type', AnimalTypeController::class); 
Route::resource('/posts', PostController::class);
Route::put('/edit-profile/{username}', [UserController::class, 'editProfile']);

Route::get('/posts/{username}', [PostController::class, 'showOwnerPost']);
Route::get('/posts/animal-type/{animal_type}', [PostController::class, 'showWithAnimalTypeFilter']);

//follow
Route::get('/posts/my-follow-post/{username}', [FollowController::class, 'getFollowPosts']);
Route::get('/followers/{post_id}', [FollowController::class, 'getFollowersCount']);
Route::post('/follow/{username}/{post_id}', [FollowController::class, 'follow']);
Route::post('/unfollow/{username}/{post_id}', [FollowController::class, 'unfollow']);
Route::post('/is-follow/{username}/{post_id}', [FollowController::class, 'isFollow']);

Route::post('/applicant', [ApplicantController::class, 'applicant']);
Route::get('/applicants/{post_id}', [ApplicantController::class, 'getApplicants']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::post('/register', [AuthConroller::class, 'register']);
Route::post('/reset-password', [AuthController::class, 'reset-password']);
