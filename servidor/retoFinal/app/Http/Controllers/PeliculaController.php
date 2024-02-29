<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PeliculaController extends Controller
{

    public function index()
    {
        $peliculas = Pelicula::paginate(9);
        return view('peliculas.index', compact('peliculas'));
    }


    public function create()
    {
        return view('peliculas.create');
    }


    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'sinopsis' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif', // Validar que sea una imagen
            'archivo' => 'required|mimes:mp4,mov,avi', // Validar que sea un archivo de video
            'fecha_estreno' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if (strtotime($value) > strtotime(now())) {
                        $fail('La fecha no puede ser posterior a la actual.');
                    }
                },
            ],
        ]);

        // Guardar la imagen
        $imagen = $request->file('imagen')->store('public/imagenes');
        $imagenUrl = str_replace('public/', 'storage/', $imagen);

        // Guardar el archivo
        $archivo = $request->file('archivo')->store('public/videos');
        $archivoUrl = str_replace('public/', 'storage/', $archivo);

        // Crear la película en la base de datos
        $pelicula = Pelicula::create([
            'titulo' => $request->input('titulo'),
            'sinopsis' => $request->input('sinopsis'),
            'imagen' => $imagenUrl,
            'archivo' => $archivoUrl,
            'fecha_estreno' => $request->input('fecha_estreno'),
        ]);

        return redirect()->route('peliculas.index')->with('success', 'La película ha sido creada correctamente.');
    }



    public function show(Pelicula $pelicula)
    {
        return view('peliculas.show', [
            "pelicula" => $pelicula,
            "edit" => false
        ]);
    }


    public function edit(Pelicula $pelicula)
    {
        return view('peliculas.show',  [
            "pelicula" => $pelicula,
            "edit" => true
        ]);
    }


    public function update(Request $request, Pelicula $pelicula)
    {
        // Validar los datos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'sinopsis' => 'required|string',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif', // Validar que sea una imagen
            'archivo' => 'mimes:mp4,mov,avi',
            'fecha_estreno' => [
                'required',
                'date',
                Rule::unique('peliculas')->ignore($pelicula->id),
                function ($attribute, $value, $fail) {
                    if (strtotime($value) > strtotime(now())) {
                        $fail('La fecha no puede ser posterior a la actual.');
                    }
                },
            ],
        ]);

        // Actualizar los campos de la película
        $pelicula->titulo = $request->input('titulo');
        $pelicula->sinopsis = $request->input('sinopsis');
        $pelicula->fecha_estreno = $request->input('fecha_estreno');

        // Guardar la nueva imagen si se proporciona
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen')->store('public/imagenes');
            $pelicula->imagen = str_replace('public/', 'storage/', $imagen);
        }

        // Guardar el nuevo archivo de video si se proporciona
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo')->store('public/videos');
            $pelicula->archivo = str_replace('public/', 'storage/', $archivo);
        }

        // Guardar los cambios en la base de datos
        $pelicula->save();

        return redirect()->route('peliculas.index')->with('success', 'La película ha sido actualizada correctamente.');
    }
}
