<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;

// Classrooms routes
Route::prefix('classrooms')->group(function () {
    Route::get('/', [ClassroomController::class, 'index']);
    Route::post('/', [ClassroomController::class, 'store']);
    Route::get('/{classroom}', [ClassroomController::class, 'show']);
    Route::delete('/{classroom}', [ClassroomController::class, 'destroy']);
    Route::patch('/{classroom}', [ClassroomController::class, 'update']);
});

// Subjects routes
Route::prefix('subjects')->group(function () {
    Route::get('/', [SubjectsController::class, 'index']);
    Route::post('/', [SubjectsController::class, 'store']);
    Route::get('/{subject}', [SubjectsController::class, 'show']);
    Route::delete('/{subject}', [SubjectsController::class, 'destroy']);
    Route::put('/{subject}', [SubjectsController::class, 'update']);
});

// Courses routes
Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index']);
    Route::post('/', [CourseController::class, 'store']);
    Route::get('/{course}', [CourseController::class, 'show']);
    Route::delete('/{course}', [CourseController::class, 'destroy']);
    Route::patch('/{course}', [CourseController::class, 'update']);
    
    // Relations avec les utilisateurs
    Route::put('/{course}/users/{user}', [CourseController::class, 'addUserToCourse']);
    Route::post('/{course}/users', [CourseController::class, 'syncUsersToCourse']);
});

// Users routes
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{user}', [UserController::class, 'show']);
    Route::delete('/{user}', [UserController::class, 'destroy']);
    Route::patch('/{user}', [UserController::class, 'update']);
});