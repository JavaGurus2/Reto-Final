<?php

namespace App\Http\Controllers;

use App\Models\Actore;
use App\Models\Categoria;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SerieController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $series = Serie::paginate(9);
        return view('series.index', compact('series'));
    }


    public function create()
    {
        $categorias = Categoria::all();
        $actores = Actore::all();
        return view('series.create', compact("categorias", "actores"));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'sinopsis' => 'required|string|max:500',
            'clasificacion' => 'required|string|max:255',
            'imagen' => 'nullable',
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

        // Guardar la imagen con un nombre único
        $imagen = $request->file('imagen')->store('public/imagenes');
        $imagenUrl = str_replace('public/', 'storage/', $imagen);


        $serie = Serie::create([
            'nombre' => $request->input('nombre'),
            'sinopsis' => $request->input('sinopsis'),
            'clasificacion' => $request->input('clasificacion'),
            'imagen' => $imagenUrl,
            'fecha_estreno' => $request->input('fecha_estreno'),

        ]);

        $categoriasSeleccionadas = $request->input('categorias', []);

        // Asociar las categorías al producto
        $serie->categorias()->attach($categoriasSeleccionadas);

        $actoresSeleccionados = $request->input('actores', []);

        // Asociar las categorías al producto
        $serie->actores()->attach($actoresSeleccionados);

        return redirect()->route('series.index')->with('success', 'La serie ha sido creada correctamente.');
    }

    //bea bea bea
    public function show(Serie $serie)
    {
        $categorias = Categoria::all();
        $actores = Actore::all();
        $temporadas = $serie->temporadas()->paginate(10);
        return view('series.show', compact('serie', 'temporadas', "actores", "categorias"));
    }


    public function edit(Serie $serie)
    {
        $categorias = Categoria::all();
        $actores = Actore::all();
        return view('series.edit', compact('serie', "actores", "categorias"));
    }


    public function update(Request $request, Serie $serie)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'sinopsis' => 'required|string|max:500',
            'clasificacion' => 'required|string|max:255',
            'imagen' => 'nullable', // Permitir que la imagen sea opcional
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

        // Actualizar los campos de la serie
        $serie->nombre = $request->input('nombre');
        $serie->sinopsis = $request->input('sinopsis');
        $serie->clasificacion = $request->input('clasificacion');
        $serie->fecha_estreno = $request->input('fecha_estreno');

        // Actualizar la imagen si se proporciona una nueva
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            Storage::delete(str_replace('storage/', 'public/', $serie->imagen));

            // Guardar la nueva imagen con un nombre único
            $imagen = $request->file('imagen')->store('public/imagenes');
            $serie->imagen = str_replace('public/', 'storage/', $imagen);
        }

        // Guardar los cambios en la base de datos
        $serie->save();

        // Actualizar las categorías asociadas
        $categoriasSeleccionadas = $request->input('categorias', []);
        $serie->categorias()->sync($categoriasSeleccionadas);

        // Actualizar los actores asociados
        $actoresSeleccionados = $request->input('actores', []);
        $serie->actores()->sync($actoresSeleccionados);

        return redirect()->route('series.index')->with('success', 'La serie ha sido actualizada correctamente.');
    }


    public function destroy(Serie $serie)
    {
        $serie->delete();

        return redirect()->route('series.index')->with('success', 'Serie eliminada correctamente');
    }
}
