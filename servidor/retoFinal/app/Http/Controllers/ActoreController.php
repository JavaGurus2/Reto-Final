<?php

namespace App\Http\Controllers;

use App\Models\Actore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class ActoreController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

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
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'email' => 'required|email|unique:actores,email',
                'imagen' => 'nullable|image', // Validar que sea una imagen
            ]);

            // Guardar la imagen con un nombre único
            $imagen = $request->file('imagen')->storeAs('public/imagenes', uniqid() . '.' . $request->file('imagen')->getClientOriginalExtension());
            $imagenUrl = str_replace('public/', 'storage/', $imagen);

            Actore::create([
                'nombre' => $request->input('nombre'),
                'apellido' => $request->input('apellido'),
                'email' => $request->input('email'),
                'imagen' => $imagenUrl
            ]);
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
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'email' => 'required|email|unique:actores,email,' . $actore->id,
                'imagen' => 'nullable', // Validar que sea una imagen
            ]);

            $actore->nombre = $request->input('nombre');
            $actore->apellido = $request->input('apellido');
            $actore->email = $request->input('email');

            // Guardar la nueva imagen si se proporciona
            if ($request->hasFile('imagen')) {
                // Eliminar la imagen anterior si existe
                if ($actore->imagen) {
                    Storage::delete(str_replace('storage/', 'public/', $actore->imagen));
                }
                // Guardar la nueva imagen con un nombre único
                $imagen = $request->file('imagen')->storeAs('public/imagenes', uniqid() . '.' . $request->file('imagen')->getClientOriginalExtension());
                $actore->imagen = str_replace('public/', 'storage/', $imagen);
            }
            $actore->save();

            return redirect()->route('actores.index')->with('success', 'Actor/Actriz editado/a correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al editar el actor: ' . $e->getMessage());
        }
    }


    public function destroy(Actore $actore)
    {
        $actore->delete();
        return redirect()->route('actores.index')->with('success', 'Actor/Actriz eliminado/a correctamente');
    }
}
