<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);
Route::post('/add_notes', [App\Http\Controllers\API\NotesController::class, 'add_notes']);
Route::get('/get_notes/{id}', [App\Http\Controllers\API\NotesController::class, 'get_notes']);
Route::get('/delete_notes/{id}', [App\Http\Controllers\API\NotesController::class, 'delete_notes']);
Route::post('/update_notes', [App\Http\Controllers\API\NotesController::class, 'update_notes']);

Route::get('/get_data/{id}', [App\Http\Controllers\API\AuthController::class, 'get_data']);


//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});
