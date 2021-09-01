<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeveloperController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("data", [UserController::class,'getData']);
Route::get("list", [DeveloperController::class,'getAllDevelopers']);
Route::get("list/{id}", [DeveloperController::class,'developerById']);
Route::post("add", [DeveloperController::class,'addDeveloper']);
Route::put("updateDev", [DeveloperController::class,'updateDeveloper']);
Route::delete("delete/{id}", [DeveloperController::class,'delete']);
Route::post("addUser", [UserController::class,'addUser']);
Route::put("reset", [UserController::class,'resetPassword']);
Route::post("login", [UserController::class,'login']);
Route::post("validate", [UserController::class,'validateUser']);
Route::delete("deleteAll/{id}", [DeveloperController::class,'deleteAll']);