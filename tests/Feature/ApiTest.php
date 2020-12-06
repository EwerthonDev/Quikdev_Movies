<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMoviesAuth()
    {
        $this->json('GET', '/api/week/movies')->assertStatus(401);
    }

    public function testDetailsAuth()
    {
        $this->json('GET', '/api/movie/detail')->assertStatus(401);
    }

    public function testTrendingMoviesAuth()
    {
        $this->json('GET', 'https://api.themoviedb.org/3/trending/movie/week?api_key=4ec327e462149c3710d63be84b81cf4f&language=pt-BR')->assertStatus(404);
    }

    public function testMoviesPageStatus()
    {
        $response = $this->get('/');

        $response->assertStatus(200);    
    }

    public function testMoviesPageStatus2()
    {
        $response = $this->get('/movies');

        $response->assertStatus(200);    
    }
}
