<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test-dashboard');
}); 

*/

Route::middleware(['auth', 'verified'])->group(function() {

    Route::get('/', [PostController::class, 'index'])
        ->name('dashboard');

    Route::get('/article/create', [PostController::class, 'create'])
        ->name('article.create');

    Route::post('/article/create', [PostController::class, 'store'])
        ->name('article.store');
        
});

require __DIR__.'/auth.php';
