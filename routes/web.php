<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Link;

Route::get('/', function () {
    $links = Link::all();
 
    return view('welcome', ['links' => $links]);
});

Route::get('/submit', function () {
    return view('submit');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/submit', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'url' => 'required|url|max:255',
        'description' => 'required|max:255',
    ]);
 
    Link::create($data);
 
    return redirect('/');
});
