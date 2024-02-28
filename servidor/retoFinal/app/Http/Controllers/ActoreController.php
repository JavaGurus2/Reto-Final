<?php

namespace App\Http\Controllers;

use App\Models\Actore;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ActoreController extends Controller
{

    public function index()
    {
        $actores = Actore::paginate(9);
        return view('actores.index', compact('actores'));
    }


    public function create()
    {
        return view('actores.create');
    }


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


    public function show(Actore $actore)
    {
        return view('actores.show', compact('actore'));
    }


    public function edit(Actore $actore)
    {
        return view('actores.edit', compact('actore'));
    }


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


    public function destroy(Actore $actore)
    {
        $actore->delete();
        return redirect()->route('actores.index')->with('success', 'Actor/Actriz eliminado/a correctamente');

    }
}
