<?php

namespace App\Http\Controllers;

use App\Models\Actore;
use App\Models\Categoria;
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
        $categorias = Categoria::all();
        return view('series.create', compact("categorias"));
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
        $imagen = $request->file('imagen')->storeAs('public/imagenes', uniqid() . '.' . $request->file('imagen')->getClientOriginalExtension());
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
        $serie->update($request->all());

        return redirect()->route('series.index')->with('success', 'Serie editada correctamente');
    }


    public function destroy(Serie $serie)
    {
        $serie->delete();

        return redirect()->route('series.index')->with('success', 'Serie eliminada correctamente');
    }
}
