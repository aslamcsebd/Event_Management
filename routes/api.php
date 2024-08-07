<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;

Route::apiResource('events', EventController::class);

// Register & login
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(
    ['middleware' => ['auth:sanctum']], 
    function(){
        Route::get('profile', [AuthController::class, 'profile']);
        Route::get('logout', [AuthController::class, 'logout']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
