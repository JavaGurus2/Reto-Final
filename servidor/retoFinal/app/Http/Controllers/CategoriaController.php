<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $categorias = Categoria::paginate(9);
        return view('categorias.index', compact('categorias'));
    }


    public function create()
    {
        return view('categorias.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
        try {
            Categoria::create($request->all());
            return redirect()->route('categorias.index')->with('success', 'Categoria creada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al crear el actor: ' . $e->getMessage());
        }
    }


    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }


    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }


    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoria editada correctamente');
    }


    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoria Eliminada correctamente');
    }
}
