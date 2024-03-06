<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class APISerieController extends Controller
{

    public function BuscarSerie(Request $request)
    {

        $serie = Serie::where('id', $request['id'])->first();

        $temporadas = $serie->temporadas()->get();

        $episodios = [];

        // Obtener los episodios de cada temporada
        foreach ($temporadas as $temporada) {
            $episodiosTemporada = $temporada->episodios()->get();
            $episodios = array_merge($episodios, $episodiosTemporada->toArray());
        }

        $actores = $serie->actores()->get();

        return response()->json([
            "data" => 'Encontrado',
            'serie' => $serie,
            'temporadas' => $temporadas,
            'episodios' => $episodios,
            'actores' => $actores
        ]);
    }
}
