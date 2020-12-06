<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class MoviesController extends Controller
{
    public function weekTrendingMovies()
    {   
        $weekTrendingMovies = Http::get('https://api.themoviedb.org/3/trending/movie/week?api_key=4ec327e462149c3710d63be84b81cf4f&language=pt-BR')->json()['results'];
        
        return response()->json([
            'weekTrendingMovies' => $weekTrendingMovies
        ],Response::HTTP_OK);  
    }

   /*
    *Tentei fazer o match dos ids de genero de cada filme com a lista de generos via javascript com map e filter, porém não consegui 
    *A idea passou a fazer isso no backend, mas também acabei não atingindo o meu objetivo de retornar algo parecido com isso:

    {[
        [0] => [
            'movie_genre_id' => x,
            'movie_genre_name' => y,
        ],
        ...
    ]}
    
    Vai ficar como uma feature pro futuro :/


    public function genres()
    {
        $genres = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=4ec327e462149c3710d63be84b81cf4f&language=pt-BR')->json()['genres'];
        
        return response()->json([
            'genres' => $genres,
        ],Response::HTTP_OK);  
    }*/
    
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
