<?php

use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterUserController;

Route::resource('ideas', IdeaController::class);

Route::get("/register",[RegisterUserController::class,'create']);
Route::post("/register",[RegisterUserController::class,'store']);
