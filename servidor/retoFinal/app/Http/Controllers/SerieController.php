<?php

namespace App\Http\Controllers;

use App\Models\Actore;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Http\Request;

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
        return view('series.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'sinopsis' => 'required|string|max:500',
            'archivo' => 'mimes:mp4,mov,avi',
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
        $imagen = $request->file('imagen')->storeAs('public/imagenes', uniqid() . '.' . $request->file('imagen')->getClientOriginalExtension());
        $imagenUrl = str_replace('public/', 'storage/', $imagen);

        // Guardar el archivo
        $archivo = $request->file('archivo')->store('public/videos');
        $archivoUrl = str_replace('public/', 'storage/', $archivo);

        Serie::create([
            'nombre' => $request->input('nombre'),
            'sinopsis' => $request->input('sinopsis'),
            'archivo' => $archivoUrl,
            'imagen' => $imagenUrl,
            'fecha_estreno' => $request->input('fecha_estreno'),

        ]);

        return redirect()->route('series.index')->with('success', 'La serie ha sido creada correctamente.');
    }

    //bea bea bea
    public function show(Serie $serie)
    {
        $temporadas = $serie->temporadas;
        return view('series.show', compact('serie', 'temporadas'));
    }


    public function edit(Serie $serie)
    {
        return view('series.edit', compact('serie'));
    }


    public function update(Request $request, Serie $serie)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'sinopsis' => 'required|string|max:500',
            'archivo' => 'required|string',
            'imagen' => 'nullable'
        ]);
        $serie->update($request->all());

        return redirect()->route('series.index')->with('success', 'Serie editada correctamente');
    }


    public function destroy(Serie $serie)
    {
        $serie->delete();

        return redirect()->route('series.index')->with('success', 'Serie eliminada correctamente');
    }
}
