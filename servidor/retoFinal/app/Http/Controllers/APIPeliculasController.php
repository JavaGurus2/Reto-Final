<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class APIPeliculasController extends Controller
{
    public function novedades()
    {
        $peliculas = Pelicula::latest()->take(15)->get();
        return response()->json($peliculas);
    }


}
