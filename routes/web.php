<?php

use App\Models\Idea;
use Illuminate\Support\Facades\Route;

// index
Route::get('/ideas', function () {
    $ideas = Idea::all();
    return view('ideas.index', [
        "ideas" => $ideas
    ]);
});

// create 
Route::get('/ideas/create', function () {
    $ideas = Idea::all();
    return view('ideas.create', [
        "ideas" => $ideas
    ]);
});

// store
Route::post('/ideas/create', function () {
    $idea = request("about");
    Idea::create([
        "description" => $idea,
        "state" => "pending"
    ]);
    return redirect("/ideas");
});

// show
Route::get('/ideas/{idea}', function (Idea $idea) {
    return view('ideas.show', [
        "idea" => $idea
    ]);
});

// edit
Route::get('/ideas/{idea}/edit', function (Idea $idea) {
    return view('ideas.edit', [
        "idea" => $idea
    ]);
});

// update
Route::patch('/ideas/{idea}', function (Idea $idea) {
    $idea->update([
        "description" => request("about"),
        "state" => request("state")
    ]);
    return redirect("/ideas/{$idea->id}");
});

// destroy
Route::delete('/ideas/{idea}', function (Idea $idea) {
    $idea->delete();
    return redirect("/ideas");
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
