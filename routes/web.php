<?php

use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::resource('ideas', IdeaController::class);

Route::get('/about', fn () => view('about'));
Route::get('/contact', fn () => view('contact'));
