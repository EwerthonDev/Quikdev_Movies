<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class PagesController extends Controller
{
    public function index()
    {
        return Inertia::render('Movies');
    }

    public function detail(int $movieId)
    {
        session(['movieId' => $movieId]);

        return Inertia::render('Detail');
    }
}
