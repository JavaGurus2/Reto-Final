<?php

namespace App\Http\Controllers;

use App\Models\Actore;
use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = Actore::paginate(9);
        return view('series.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('series.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Serie $serie)
    {
        return view('series.show', compact('serie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Serie $serie)
    {
        return view('series.edit', compact('serie'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Serie $serie)
    {
        $serie->delete();
        return redirect()->route('series.index')->with('success','Serie eliminada correctamente');
    }
}
