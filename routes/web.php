<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [StudentController::class, '__invoke'])->middleware('auth');

Route::post('/login', [AuthController::class, 'login']);
Route::get('/', [AuthController::class, 'show'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [StudentController::class, 'getStudents'])->middleware('auth');
Route::get('/students/{student}', [StudentController::class, 'getStudent'])->middleware('auth');

Route::delete('/students/{student}', [StudentController::class, 'delete'])->middleware('auth');

Route::get('/students/{student}', [StudentController::class, 'edit'])->middleware('auth');
Route::post('/students/{student}', [StudentController::class, 'update'])->middleware('auth');

Route::get('/create', [StudentController::class, 'create'])->middleware('auth');
Route::post('/create', [StudentController::class, 'store'])->middleware('auth');
