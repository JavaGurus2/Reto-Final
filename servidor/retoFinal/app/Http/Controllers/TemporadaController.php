<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Http\Request;

class TemporadaController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index(Serie $serie)
    {
        $temporadas = $serie->temporadas()->paginate(10);
        return view('temporadas.index', compact('serie', 'temporadas'));
    }


    public function create(Serie $serie)
    {
        return view('temporadas.create', compact('serie'));
    }


    public function store(Request $request, Serie $serie)
    {
        $request->validate([
            'nombre' => 'required|string',
            'numero' => 'required|integer',
            'fecha_estreno' => 'required|date',
            'serie_id' => 'required|integer'
        ]);

        Temporada::create([
            'nombre' => $request->nombre,
            'numero' => $request->numero,
            'fecha_estreno' => $request->fecha_estreno,
            'serie_id' => $request->serie_id
        ]);

        return redirect()->route('series.show', $serie->id)->with('success', 'Temporada creada correctamente.');
    }





    //bea bea bea

    public function show(Serie $serie, Temporada $temporada)
    {
        $episodios = $temporada->episodios()->paginate(10);


        return view('temporadas.show', compact('temporada', 'episodios', 'serie'));
    }

    public function edit(Serie $serie, Temporada $temporada)
    {
        return view('temporadas.edit', compact('temporada', 'serie'));
    }


    public function update(Request $request, Serie $serie, Temporada $temporada)
    {
        $request->validate([
            'nombre' => 'required|string',
            'numero' => 'required|integer',
            'fecha_estreno' => 'required|date',
        ]);

        // Actualizar los campos de la temporada
        $temporada->nombre = $request->nombre;
        $temporada->numero = $request->numero;
        $temporada->fecha_estreno = $request->fecha_estreno;
        $temporada->save();

        return redirect()->route('series.show', $serie->id)->with('success', 'Temporada actualizada correctamente.');
    }



    public function destroy(Serie $serie, Temporada $temporada)
    {
        $temporada->delete();

        return redirect()->route('series.show', $serie->id)->with('success', 'Temporada eliminada correctamente.');
    }
}
