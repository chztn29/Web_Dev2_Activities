<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;


Route::get('/', [UserController::class, 'index']);
Route::post('/create', [UserController::class, 'createNewUser'])->name(name: 'users.store');