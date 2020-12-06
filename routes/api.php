<?php

use App\Http\Controllers\Api\MoviesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    Route::get('/week/movies', [MoviesController::class, 'weekTrendingMovies']);
    //Route::get('/movies/genres', [MoviesController::class, 'genres']);
    Route::get('/movie/detail', [MoviesController::class, 'movieDetail']);