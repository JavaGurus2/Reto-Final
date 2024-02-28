<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculas = Pelicula::paginate(9);
        return view('peliculas.index',compact('peliculas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('peliculas.create');
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
        Pelicula::create($request->all());
            return redirect()->route('peliculas.index')->with('success', 'Pelicula creada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al crear la pelicula: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelicula $pelicula)
    {
        return view('peliculas.show', compact('pelicula'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelicula $pelicula)
    {
        return view('peliculas.edit', compact('pelicula'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'sinopsis' => 'required|string|max:500',
            'archivo' => 'required|string',
            'imagen' => 'nullable'
           ]);
           $pelicula->update($request->all());

           return redirect()->route('peliculas.index')->with('success', 'Pelicula editada correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelicula $pelicula)
    {
        $pelicula->delete();
        return redirect()->route('peliculas.index')->with('success', 'Pelicula eliminada correctamente');
    }
}
