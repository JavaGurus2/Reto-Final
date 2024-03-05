<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class APIPeliculaController extends Controller
{

    public function BuscarSerie(Request $request)
    {

        $serie = Serie::where('id', $request['id'])->first();

        $temporadas = $serie->temporadas()->get();

        $episodios = $temporadas->episodios()->get();

        $actores = $serie->actores()->get();

        return response()->json(["data" => 'Encontrado', 'serie' => $serie, 
                                'temporadas' => $temporadas,
                                'episodios' => $episodios,
                                'actores' => $actores]);
    }
}
