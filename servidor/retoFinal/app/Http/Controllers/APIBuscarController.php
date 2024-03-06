<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Serie;
use Illuminate\Http\Request;

class APIBuscarController extends Controller
{

    public function buscar(Request $request)
    {
        $peliculas = Pelicula::where('titulo', $request["texto"]);
        $series = Serie::where('nombre', $request["texto"]);
        return response()->json(["peliculas" => $peliculas, "series" => $series]);
    }
}
