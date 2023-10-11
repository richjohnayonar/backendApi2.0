<?php

use App\Http\Controllers\API\userController;
use App\Http\Controllers\API\carouselItemsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/carousel', [carouselItemsController::class, 'index']);

Route::get('/carousel/{id}', [carouselItemsController::class, 'show']);

Route::post('/carousel', [carouselItemsController::class, 'store']);

Route::put('/carousel/{id}', [carouselItemsController::class, 'update']);

Route::delete('/carousel/{id}', [carouselItemsController::class, 'destroy']);


//user routes

//get all user
Route::get('/user', [userController::class, 'index']);

//get user by id
Route::get('/user/{id}', [userController::class, 'show']);

//store data
Route::post('/user', [userController::class, 'store'])->name('user.store');

//update name of user
Route::put('/user/{id}', [userController::class, 'update'])->name('user.update');

//update email of user
// Route::put('/user/{id}', [userController::class, 'updateEmail'])->name('user.email');


// delete user by id
Route::delete('/user/{id}', [userController::class, 'destroy']);