<?php

namespace App\Http\Controllers;

use App\Models\Actore;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Http\Request;

class SerieController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $series = Actore::paginate(9);
        return view('series.index', compact('series'));
    }


    public function create()
    {
        return view('series.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'sinopsis' => 'required|string|max:500',
            'archivo' => 'required|string',
            'imagen' => 'nullable'
        ]);
        try {
            Serie::create($request->all());
            return redirect()->route('series.index')->with('success', 'Serie creada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al crear la pelicula: ' . $e->getMessage());
        }
    }

    //bea bea bea
    public function show(Serie $serie)
    {
        $temporadas = $serie->temporadas;
        return view('series.show', compact('serie', 'temporadas'));
    }


    public function edit(Serie $serie)
    {
        return view('series.edit', compact('serie'));
    }


    public function update(Request $request, Serie $serie)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'sinopsis' => 'required|string|max:500',
            'archivo' => 'required|string',
            'imagen' => 'nullable'
        ]);
        $serie->update($request->all());

        return redirect()->route('series.index')->with('success', 'Serie editada correctamente');
    }


    public function destroy(Serie $serie)
    {
        $serie->delete();

        return redirect()->route('series.index')->with('success', 'Serie eliminada correctamente');
    }
}
