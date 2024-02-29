<?php

namespace App\Http\Controllers;

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
        $temporadas = $serie->temporadas;
        return view('temporadas.index', compact('serie', 'temporadas'));
    }


    public function create(Serie $serie)
    {
        return view('temporadas.create', compact('serie'));
    }


    public function store(Request $request, Serie $serie)
    {
        $request->validate([
            'numero' => 'required|integer',
            'fecha_estreno' => 'required|date',
        ]);


        /*
         $serie->temporadas()->create([
            'numero' => $request->numero,
            'fecha_estreno' => $request->fecha_estreno,
        ]);
        */

        $temporada = new Temporada();
        $temporada->serie_id = $serie->id;
        $temporada->numero = $request->numero;
        $temporada->fecha_estreno = $request->fecha_estreno;
        $temporada->save();


        return redirect()->route('temporadas.index', $serie->id)->with('success', 'Temporada creada correctamente.');
    }


    //bea bea bea

    public function show(Temporada $temporada, Serie $serie)
    {
        $episodios = $temporada->episodios;


        return view('temporadas.show', compact('temporada', 'episodios', 'serie'));
    }

    public function edit(Temporada $temporada, Serie $serie)
    {
        return view('temporadas.edit', compact('temporada', 'serie'));
    }


    public function update(Request $request, Temporada $temporada, Serie $serie)
    {
        $request->validate([
            'numero' => 'required|integer',
            'fecha_estreno' => 'required|date',
        ]);


        $temporada->update([
            'numero' => $request->numero,
            'fecha_estreno' => $request->fecha_estreno,
        ]);

        return redirect()->route('temporadas.index', $serie->id)->with('success', 'Temporada actualizada correctamente.');
    }


    public function destroy(Temporada $temporada, Serie $serie)
    {
        $temporada->delete();

        return redirect()->route('temporadas.index', $serie->id)->with('success', 'Temporada eliminada correctamente.');
    }
}
