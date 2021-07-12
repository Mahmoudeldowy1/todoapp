<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',[\App\Http\Controllers\TaskController::class,'index'])->name('task.index');
Route::post('/task',[\App\Http\Controllers\TaskController::class,'store'])->name('task.store');
Route::get('/tasks/{task}/edit',[\App\Http\Controllers\TaskController::class,'edit'])->name('task.edit');
Route::put('/task/{task}',[\App\Http\Controllers\TaskController::class,'update'])->name('task.update');
Route::delete('/task/{task}',[\App\Http\Controllers\TaskController::class,'destroy'])->name('task.destroy');
Route::get('completedtask/{task}', [\App\Http\Controllers\TaskController::class, 'completeTask'])->name('task.completed');

