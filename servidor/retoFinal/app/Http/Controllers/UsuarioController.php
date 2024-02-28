<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function index()
    {
        $usuarios = User::paginate(9);
        return view('usuarios.index',compact('usuarios'));
    }


    public function create()
    {
        return view('usuarios.create');
    }


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


    public function show(User $user)
    {
        return view('usuarios.show', compact('user'));
    }


    public function edit(User $user)
    {
        return view('usuarios.edit', compact('user'));
    }


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


    public function destroy(User $user)
    {
     $user->delete();
     return redirect()->route('usuarios.index')->with('success','Usuario eliminado correctamente');
    }
}
