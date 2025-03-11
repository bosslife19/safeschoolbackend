<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SchoolsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/get-schools-in-states', [SchoolsController::class, 'fetchSchoolsInState']);
Route::post("/register", [AuthController::class, 'register']);
Route::post("/login", [AuthController::class, 'login']);
