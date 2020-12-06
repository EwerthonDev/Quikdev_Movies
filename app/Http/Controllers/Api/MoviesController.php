<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class MoviesController extends Controller
{
    public function trendingMovies()
    {   
        $trendingMovies = Http::get('https://api.themoviedb.org/3/trending/movie/week?api_key=4ec327e462149c3710d63be84b81cf4f&language=pt-BR')->json()['results'];
        
        return response()->json([
            'trendingMovies' => $trendingMovies
        ],Response::HTTP_OK);  
    }

    /*public function genres()
    {
        $movieGenres = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=4ec327e462149c3710d63be84b81cf4f&language=pt-BR')->json()['genres'];
        
        
        $genres = collect($movieGenres)->mapWithKeys(function($genre) {
            return [$genre['id'] => $genre['name']];
        });

        return response()->json([
            'genres' => $genres,
        ],Response::HTTP_OK);  
    }
    */
    public function movieDetail(Request $request)
    {   
        $movieId = $request->session()->get('movieId');

        $movieUrl = "https://api.themoviedb.org/3/movie/{$movieId}?api_key=4ec327e462149c3710d63be84b81cf4f&language=pt-BR";

        $movieInfos = Http::get($movieUrl)->json();

        return response()->json([
            'movieInfos' => $movieInfos
        ],Response::HTTP_OK); 
    }

}
