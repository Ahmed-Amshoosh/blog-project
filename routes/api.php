<?php

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::get('/post' , [\App\Http\Controllers\Api\AuthController::class,'index']);
Route::get('/doctors' , [\App\Http\Controllers\Api\AuthController::class,'doctors']);
Route::get('/notices' , [\App\Http\Controllers\Api\AuthController::class,'notices']);










