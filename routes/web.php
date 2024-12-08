<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
Route::middleware(\App\Http\Middleware\SetLocale::class)->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('genres', GenreController::class);
    Route::resource('movies', MovieController::class);
    Route::post('movies/{id}/publish', [MovieController::class, 'publish'])->name('movies.publish');
});


Route::post('/locale', [HomeController::class,'setLocale'])->name('locale.change');
