<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalTypeController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\BannedUserController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostImageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
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
Route::get('/animal-types/get', [AnimalTypeController::class, 'getAll']);
Route::get('/animal-types/get/type-list', [AnimalTypeController::class, 'getTypeList']);
Route::get('/animal-types/get/animal/{animal_id}', [AnimalTypeController::class, 'getTypesByAnimalId']);
Route::get('/animal-types/get/animal', [AnimalTypeController::class, 'getTypesByAnimalObject']);
Route::post('/animal-types/add', [AnimalTypeController::class, 'add']);
Route::put('/animal-types/save/{type}', [AnimalTypeController::class, 'saveWithType']);
Route::put('/animal-types/save', [AnimalTypeController::class, 'save']);
Route::delete('/animal-types/delete/{type}', [AnimalTypeController::class, 'deleteWithType']);
Route::delete('/animal-types/delete', [AnimalTypeController::class, 'delete']);


//Animal
Route::get('/animals/get', [AnimalController::class, 'getAll']);
Route::get('/animal/get/id/{id}', [AnimalController::class, 'getFromId']);
Route::get('/animal/get/post/{post_id}', [AnimalController::class, 'getAnimalsByPost']);
Route::get('/animals/get/type/{type}', [AnimalController::class, 'getAnimalsByType']);
Route::get('/animals/get/sex-list', [AnimalController::class, 'getSexList']);
Route::post('/animals/add', [AnimalController::class, 'add']);
Route::put('/animals/save/{id}', [AnimalController::class, 'saveWithId']);
Route::put('/animals/save', [AnimalController::class, 'save']);
Route::delete('/animals/delete/{id}', [AnimalController::class, 'deleteWithId']);
Route::delete('/animals/delete', [AnimalController::class, 'delete']);

//Post
Route::get('/posts/get', [PostController::class, 'getAll']);
Route::get('/post/get/id/{id}', [PostController::class, 'getFromId']);
Route::get('/posts/get/author/{user_id}', [PostController::class, 'getPostsByAuthor']);
Route::get('/posts/get/animal/{animal_id}', [PostController::class, 'getPostsByAnimal']);
Route::get('/posts/get/animal-type/{type}', [PostController::class, 'getPostsByAnimalType']);
Route::get('/posts/get/followed-by/{user_id}', [PostController::class, 'getPostsFollowedByUser']);
Route::post('/posts/add', [PostController::class, 'add']);
Route::put('/posts/save/{id}', [PostController::class, 'saveWithId']);
Route::put('/posts/save', [PostController::class, 'save']);
Route::delete('/posts/delete/{id}', [PostController::class, 'deleteWithId']);
Route::delete('/posts/delete', [PostController::class, 'delete']);

//Follow
Route::get('/follows/get', [FollowController::class, 'getAll']);
Route::get('/follows/get/user/{user_id}', [FollowController::class, 'getFollowsByUser']);
Route::get('/follows/get/post/{post_id}', [FollowController::class, 'getFollowsByPost']);
Route::post('/follows/add', [FollowController::class, 'add']);
Route::put('/follows/save/{id}', [FollowController::class, 'saveWithId']);
Route::put('/follows/save', [FollowController::class, 'save']);
Route::delete('/follows/delete/{id}', [FollowController::class, 'deleteWithId']);
Route::delete('/follows/delete', [FollowController::class, 'delete']);

//PostImage
Route::get('/post-images/get', [PostImageController::class, 'getAll']);
Route::get('/post-image/get/id/{id}', [PostImageController::class, 'getFromId']);
Route::get('/post-images/get/post/{post_id}', [PostImageController::class, 'getPostImagesByPost']);
Route::post('/post-images/add', [PostImageController::class, 'add']);
Route::post('/post-images/add/test', [PostImageController::class, 'addTest']);
Route::put('/post-images/save/{id}', [PostImageController::class, 'saveWithId']);
Route::put('/post-images/save', [PostImageController::class, 'save']);
Route::delete('/post-images/delete/{id}', [PostImageController::class, 'deleteWithId']);
Route::delete('/post-images/delete', [PostImageController::class, 'delete']);

//Applicants
Route::get('/applicants/get', [ApplicantController::class, 'getAll']);
Route::get('/applicants/get/post/{post_id}', [ApplicantController::class, 'getApplicantsByPost']);
Route::get('/applicants/get/user/{user_id}', [ApplicantController::class, 'getApplicantsByUser']);
Route::get('/applicants/get/status-list', [ApplicantController::class, 'getStatusList']);
Route::get('/applicants/get/if-applied', [ApplicantController::class, 'isApplied']);
Route::post('/applicants/add', [ApplicantController::class, 'add']);
Route::put('/applicants/save', [ApplicantController::class, 'save']);
Route::delete('/applicants/delete', [ApplicantController::class, 'delete']);


//User
Route::get('/users/get', [UserController::class, 'getAll']);
Route::get('/user/get/id/{id}', [UserController::class, 'getFromId']);
Route::get('/user/get/username/{username}', [UserController::class, 'getFromUsername']);
Route::get('/user/get/email/{email}', [UserController::class, 'getFromEmail']);
Route::get('/user/get/post/{post_id}', [UserController::class, 'getUserByPost']);
Route::get('/user/get/reporter/{report_id}', [UserController::class, 'getReporterByReport']);
Route::get('/user/get/reported/{report_id}', [UserController::class, 'getReportedUserByReport']);
Route::get('/user/get/banned-by/{banned_user}', [UserController::class, 'getBannedByUser']);
Route::get('/users/get/following-post/{post_id}', [UserController::class, 'getUsersFollowingPost']);
Route::post('/users/add', [UserController::class, 'add']);
Route::put('/users/save/{id}', [UserController::class, 'saveWithId']);
Route::put('/users/save', [UserController::class, 'save']);
Route::delete('/users/delete/{id}', [UserController::class, 'deleteWithId']);
Route::delete('/users/delete', [UserController::class, 'delete']);
Route::put('/admin/add/{user_id}', [UserController::class, 'addAdmin']);
Route::put('/admin/remove/{user_id}', [UserController::class, 'removeAdmin']);

//Report
Route::get('/reports/get', [ReportController::class, 'getAll']);
Route::get('/reports/get/reporter/{user_id}', [ReportController::class, 'getReportsByReporter']);
Route::get('/reports/get/reported/{user_id}', [ReportController::class, 'getReportsByReported']);
Route::get('/reports/get/post/{post_id}', [ReportController::class, 'getReportsByPost']);
Route::get('/report/get/id/{id}', [ReportController::class, 'getFromId']);
Route::post('/reports/add', [ReportController::class, 'add']);
Route::put('/reports/save', [ReportController::class, 'save']);
Route::delete('/reports/delete/{id}', [ReportController::class, 'deleteWithId']);
Route::delete('/reports/delete', [ReportController::class, 'delete']);

//BannedUser
Route::get('/banned_users/get', [BannedUserController::class, 'getAll']);
Route::get('/banned_user/get/banned/{user_id}', [BannedUserController::class, 'getBannedUser']);
Route::post('/banned_users/add', [BannedUserController::class, 'add']);
Route::delete('/banned_users/delete/{user_id}', [BannedUserController::class, 'deleteWithId']);
Route::delete('/banned_users/delete', [BannedUserController::class, 'delete']);
