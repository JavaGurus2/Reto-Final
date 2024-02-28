<?php

namespace App\Http\Controllers;

use App\Models\Actore;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ActoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actores = Actore::all();
        return view('actores.index', compact('actores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('actores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:actores,email',
            'imagen' => 'nullable'
        ]);

        try {
            Actore::create($request->all());
            return redirect()->route('actores.index')->with('success', 'Actor/Actriz creado/a correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al crear el actor: ' . $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Actore $actore)
    {
        return view('actores.show', compact('actore'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actore $actore)
    {
        return view('actores.edit', compact('actore'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actore $actore)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:actores,email,' . $actore->id,
            'imagen' => 'nullable'
        ]);
        $actore->update($request->all());

        return redirect()->route('actores.index')->with('success', 'Actor/Actriz editado/a correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actore $actore)
    {
        $actore->delete();
        return redirect()->route('actores.index')->with('success', 'Actor/Actriz eliminado/a correctamente');

    }
}
