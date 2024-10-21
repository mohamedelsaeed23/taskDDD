<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\TaskController;

Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks/{id}', [TaskController::class, 'show']);
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
