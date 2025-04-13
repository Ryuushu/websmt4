<?php

use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::get('/menus', [MenuController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [UsersController::class, 'index']);
    Route::post('/logout', [UsersController::class, 'logout']);
});
Route::post('/login', [UsersController::class, 'auth']);
Route::post('/register', [UsersController::class, 'register']);
