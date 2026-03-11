<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ["greeting" => "Hello World!", "person" => request("person", "Pablo"), "tasks" => ["apple", "pinapple", "watermellon"]]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
