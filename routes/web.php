<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $links = \App\Models\Link::all();
 
    return view('welcome', ['links' => $links]);
});

Route::get('/submit', function () {
    return view('submit');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
