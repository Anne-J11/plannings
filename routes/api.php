<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*Route::get('/test', function () {
    return response()->json([
        'message' => 'La route fonctionne'
    ]);
});

Route::get('/test-request', function (Request $request) {
    return response()->json([
        'params' => $request->all()
    ]);
});*/

Route::get('/users/{id}', function (int $id) {
    return response()->json([
        'user_id' => $id
    ]);
});

//Classromms routes
Route::prefix('/classrooms') ->group(function () {
    Route::get('classrooms', [\App\Http\Controllers\ClassroomController::class, 'index']);
    Route::post('classrooms', [\App\Http\Controllers\ClassroomController::class, 'store']);
    Route::get('classrooms/{id}', [\App\Http\Controllers\ClassroomController::class, 'show']);
    Route::delete('classrooms/{id}', [\App\Http\Controllers\ClassroomController::class, 'destroy']);
    Route::patch('classrooms/{id}', [\App\Http\Controllers\ClassroomController::class, 'update']);
});
//Subjects routes
Route::prefix('/subjects') ->group(function () {
    Route::get('subjects', [\App\Http\Controllers\SubjectsController::class, 'index']);
    Route::post('subjects', [\App\Http\Controllers\SubjectsController::class, 'store']);
    Route::delete('subjects/{id}', [\App\Http\Controllers\SubjectsController::class, 'destroy']);
    Route::put('subjects/{id}', [\App\Http\Controllers\SubjectsController::class, 'update']);
});