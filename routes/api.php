<?php

use App\Http\Controllers\API\userController;
use App\Http\Controllers\API\carouselItemsController;
use App\Http\Controllers\API\authController;
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


//login/logout auth
Route::controller(authController::class)->group(function () { 
    Route::post('/login','login' )->name('user.login');
    Route::get('/logout','logout');
});



//carousel item controller
Route::controller(carouselItemsController::class)->group(function () { 

    Route::get('/carousel', 'index');

    Route::get('/carousel/{id}', 'show');
    
    Route::post('/carousel', 'store');
    
    Route::put('/carousel/{id}', 'update');
    
    Route::delete('/carousel/{id}', 'destroy');
    
});




//user routes controller
// Route::controller(userController::class)->group(function () { 
// // get all user
// Route::get('/user',  'index');

// // get user by id
// Route::get('/user/{id}', 'show');

// // store data
// Route::post('/user', 'store')->name('user.store');

// // update userW
// Route::put('/user/{id}', 'update')->name('user.update');

// // delete user by id
// Route::delete('/user/{id}', 'destroy');

// });


