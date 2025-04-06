<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class WebRadioController extends Controller
{
    //

    public function index()
    {
        $response = Http::get('http://51.222.86.192/api/images');
        $imagenes = $response->successful() ? $response->json() : [];

        // Obtener las últimas 6 imágenes (suponiendo que el array ya está ordenado de más reciente a más antigua)
        $imagenes = array_slice($imagenes, 0, 6);

        return view('welcome', compact('imagenes'));
    }
}
