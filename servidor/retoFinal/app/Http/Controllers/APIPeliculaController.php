<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class APIPeliculaController extends Controller
{

    public function BuscarPelicula(Request $request)
    {

        $pelicula = Pelicula::where('id', $request['id'])->first();

        $actores = $pelicula->actores()->get();

        return response()->json(["data" => 'Encontrado', 'pelicula' => $pelicula, 'actores' => $actores]);
    }
}
