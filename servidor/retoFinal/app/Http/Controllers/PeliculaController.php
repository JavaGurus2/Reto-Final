<?php

namespace App\Http\Controllers;

use App\Models\Actore;
use App\Models\Categoria;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PeliculaController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $peliculas = Pelicula::paginate(9);
        return view('peliculas.index', compact('peliculas'));
    }


    public function create()
    {
        $categorias = Categoria::all();
        $actores = Actore::all();
        return view('peliculas.create', compact("categorias", "actores"));
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

        $categoriasSeleccionadas = $request->input('categorias', []);

        // Asociar las categorías al producto
        $pelicula->categorias()->attach($categoriasSeleccionadas);

        $actoresSeleccionados = $request->input('actores', []);

        // Asociar las categorías al producto
        $pelicula->actores()->attach($actoresSeleccionados);

        return redirect()->route('peliculas.index')->with('success', 'La película ha sido creada correctamente.');
    }



    public function show(Pelicula $pelicula)
    {
        $categorias = Categoria::all();
        $actores = Actore::all();
        return view('peliculas.show',  [
            "pelicula" => $pelicula,
            "actores" => $actores,
            "categorias" => $categorias,
            "edit" => false
        ]);
    }


    public function edit(Pelicula $pelicula)
    {
        $categorias = Categoria::all();
        $actores = Actore::all();
        return view('peliculas.show',  [
            "pelicula" => $pelicula,
            "actores" => $actores,
            "categorias" => $categorias,
            "edit" => true
        ]);
    }


    public function update(Request $request, Pelicula $pelicula)
    {
        // Validar los datos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'sinopsis' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Permitir que la imagen sea opcional
            'archivo' => 'nullable|mimes:mp4,mov,avi', // Permitir que el archivo de video sea opcional
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

        // Actualizar los campos de la película
        $pelicula->titulo = $request->input('titulo');
        $pelicula->sinopsis = $request->input('sinopsis');
        $pelicula->fecha_estreno = $request->input('fecha_estreno');

        // Actualizar la imagen si se proporciona una nueva
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            Storage::delete(str_replace('storage/', 'public/', $pelicula->imagen));

            // Guardar la nueva imagen
            $imagen = $request->file('imagen')->store('public/imagenes');
            $pelicula->imagen = str_replace('public/', 'storage/', $imagen);
        }

        // Actualizar el archivo si se proporciona uno nuevo
        if ($request->hasFile('archivo')) {
            // Eliminar el archivo anterior si existe
            Storage::delete(str_replace('storage/', 'public/', $pelicula->archivo));

            // Guardar el nuevo archivo
            $archivo = $request->file('archivo')->store('public/videos');
            $pelicula->archivo = str_replace('public/', 'storage/', $archivo);
        }

        // Guardar los cambios en la base de datos
        $pelicula->save();

        // Actualizar las categorías asociadas
        $categoriasSeleccionadas = $request->input('categorias', []);
        $pelicula->categorias()->sync($categoriasSeleccionadas);

        // Actualizar los actores asociados
        $actoresSeleccionados = $request->input('actores', []);
        $pelicula->actores()->sync($actoresSeleccionados);

        return redirect()->route('peliculas.index')->with('success', 'La película ha sido actualizada correctamente.');
    }


    public function destroy(Pelicula $pelicula)
    {

        $pelicula->delete();

        session()->flash('danger', 'pelicula borrado correctamente');

        return redirect()->back();
    }
}
