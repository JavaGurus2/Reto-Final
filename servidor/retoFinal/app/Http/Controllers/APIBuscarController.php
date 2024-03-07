<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Serie;
use Illuminate\Http\Request;

class APIBuscarController extends Controller
{

    public function buscar(Request $request)
    {
        $texto = '%' . $request["texto"] . '%';
        $peliculas = Pelicula::where('titulo', 'like', $texto)->get();
        $series = Serie::where('nombre', 'like', $texto)->get();
        return response()->json(["peliculas" => $peliculas, "series" => $series]);
    }
}
