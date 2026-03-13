<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $ideas = session()->get("ideas", []);
    return view('welcome', [
        "ideas" => $ideas
    ]);
});

Route::post('/', function () {
    $idea = request("about");
    session()->push("ideas", $idea);
    return redirect("/");
});

Route::get("/delete-ideas", function () {
    session()->forget("ideas");
    return redirect("/");
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
