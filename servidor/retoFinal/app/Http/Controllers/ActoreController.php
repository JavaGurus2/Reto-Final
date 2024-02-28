<?php

namespace App\Http\Controllers;

use App\Models\Actore;
use Illuminate\Http\Request;

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
            'direccion' => 'required|string|max:255',
            'email' => 'required|email|unique:bodegas,email',
            'telefono' => 'required|string|max:20',
            'persona_contacto' => 'required|string|max:255',
            'anno_fundacion' => 'required|integer|min:1800|max:' . date('Y'),
            'comentarios' => 'nullable|string',
            'tiene_restaurante' => 'boolean',
            'tiene_hotel' => 'boolean',
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Actore $actore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actore $actore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actore $actore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actore $actore)
    {
        //
    }
}
