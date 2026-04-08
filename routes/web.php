<?php

use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Auth\SessionController;

Route::get('/', function () {
    return view('index');
});

Route::resource('ideas', IdeaController::class)->middleware('auth');

Route::get("/register",[RegisterUserController::class,'create'])->middleware('guest');
Route::post("/register",[RegisterUserController::class,'store'])->middleware('guest');

Route::delete("/logout",[SessionController::class,'destroy'])->middleware('auth');
Route::get("/login",[SessionController::class,'create'])->middleware('guest');
Route::post("/login",[SessionController::class,'store'])->middleware('guest');

Route::get("/admin",function(){
    return "Admin";
})->middleware('can:view-admin');


