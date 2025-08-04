<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('students',StudentController::class);

Route::post('/sign-up', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Route::apiResource('students', StudentController::class);
});
Route::post('/logout', [AuthController::class, 'logout']);
