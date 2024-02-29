<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Http\Request;

class EpisodioController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index(Temporada $temporada, Serie $serie)
    {
        $episodios = $temporada->episodios;

        return view('episodios.index', compact('episodios', 'serie', 'temporada'));
    }


    public function create(Temporada $temporada, Serie $serie)
    {
        return view('episodios.create', compact('temporada', 'serie'));
    }


    public function store(Request $request, Temporada $temporada, Serie $serie)
    {

        $request->validate([
            'numero' => 'required|integer',
            'archivo' => 'required|string',

        ]);

        $episodio = new Episodio();
        $episodio->numero = $request->numero;
        $episodio->archivo = $request->archivo;
        $episodio->temporada_id = $temporada->id;
        $episodio->save();


        return redirect()->route('episodios.index', ['serie' => $serie->id, 'temporada' => $temporada->id])->with('success', 'Episodio creado correctamente.');
    }


    public function show(Episodio $episodio, Temporada $temporada, Serie $serie)
    {
        return view('episodios.show', compact('episodio', 'temporada', 'serie'));
    }

    public function edit(Episodio $episodio, Temporada $temporada, Serie $serie)
    {
        return view('episodios.edit', compact('episodio', 'temporada', 'serie'));
    }

    public function update(Request $request, Episodio $episodio, Temporada $temporada, Serie $serie)
    {
        $request->validate([
            'numero' => 'required|integer',
            'archivo' => 'required|string',
        ]);

        $episodio->update([
            'numero' => $request->numero,
            'archivo' => $request->archivo,
        ]);

        return redirect()->route('episodios.index', ['serie' => $serie->id, 'temporada' => $temporada->id, 'episodio' => $episodio->id])->with('success', 'Episodio actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Episodio $episodio, Temporada $temporada, Serie $serie)
    {
        $episodio->delete();

        return redirect()->route('episodios.index', ['serie' => $serie->id, 'temporada' => $temporada->id])->with('success', 'Episodio eliminado correctamente.');
    }
}
