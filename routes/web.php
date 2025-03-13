<?php


use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/movies');

Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');



// popular movies
Route::get('/movies/popular', [MovieController::class, 'popular'])->name('movies.popular');

// latest movies
Route::get('/movies/latest', [MovieController::class, 'latest'])->name('movies.latest');

//  top-rated movies
Route::get('/movies/top-rated', [MovieController::class, 'topRated'])->name('movies.topRated');
