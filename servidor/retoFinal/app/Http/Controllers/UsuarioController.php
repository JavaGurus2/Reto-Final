<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::paginate(9);
        return view('usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:actores,email',
            'contraseña' => 'required|string|max:255',
            'imagen' => 'nullable',
            'rol' => 'required|string|max:255'
        ]);
        try {
            User::create($request->all());
                return redirect()->route('usuarios.index')->with('success', 'Usuario creada correctamente');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error al crear el usuario: ' . $e->getMessage());
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('usuarios.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('usuarios.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:actores,email',
            'contraseña' => 'required|string|max:255',
            'imagen' => 'nullable',
            'rol' => 'required|string|max:255'
        ]);
        $user->update($request->all());
        return redirect()->route('usuarios.index')->with('success','Usuario editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
     $user->delete();
     return redirect()->route('usuarios.index')->with('success','Usuario eliminado correctamente');
    }
}
