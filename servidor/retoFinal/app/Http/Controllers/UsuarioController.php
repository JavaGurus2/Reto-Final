<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $usuarios = User::paginate(9);
        return view('usuarios.index', compact('usuarios'));
    }


    public function create()
    {
        return view('usuarios.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|max:255',
            'imagen' => 'nullable',
            'rol' => 'boolean'
        ]);

        // Guardar la imagen
        $imagen = $request->file('imagen')->storeAs('public/imagenes', uniqid() . '.' . $request->file('imagen')->getClientOriginalExtension());
        $imagenUrl = str_replace('public/', 'storage/', $imagen);

        try {
            $user = User::create([
                'name'=> $request->input('name'),
                'email'=>$request->input('email'),
                'password'=>$request->input('password'),
                'imagen'=>$imagenUrl,
                'rol'=> $request->input('rol')
            ]);
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required|string|max:255',
            'imagen' => 'nullable',
            'rol' => 'boolean'
        ]);

        // Guardar la nueva imagen si se proporciona
        if ($request->hasFile('imagen')) {
            Storage::delete(str_replace('storage/','public/', $user->imagen));
            $imagen = $request->file('imagen')->store('public/imagenes');
            $user->imagen = str_replace('public/', 'storage/', $imagen);

        }

        $user->name = $request->input('name');
        $user->email= $request->input('email');
        $user->password= $request->input('password');
        $user->rol= $request->input('rol');


        $user->save();
        return redirect()->route('usuarios.index')->with('success', 'Usuario editado correctamente');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');
    }
}
