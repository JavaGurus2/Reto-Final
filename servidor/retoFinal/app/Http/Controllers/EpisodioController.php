<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Http\Request;

class EpisodioController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index(Serie $serie, Temporada $temporada)
    {
        $episodios = $temporada->episodios()->paginate(10);

        return view('episodios.index', compact('episodios', 'serie', 'temporada'));
    }


    public function create(Serie $serie, Temporada $temporada)
    {
        $ultimoNumeroEpisodio = Episodio::where('temporada_id', $temporada->id)->max('numero');

        return view('episodios.create', compact('temporada', 'serie', "ultimoNumeroEpisodio"));
    }


    public function store(Request $request, Serie $serie,  Temporada $temporada)
    {

        $validated = $request->validate([
            "titulo"  => 'required|string',
            "sinopsis"  => 'required|string',
            'numero' => 'required|integer',
            'duracion' => 'required|integer',
            'fecha_estreno' => "required|date",
            'archivo' => 'required|mimes:mp4,mov,avi', // Validar que sea un archivo de video
            "temporada_id" => 'required|integer'
        ]);


        // Guardar el archivo
        $archivo = $request->file('archivo')->store('public/videos');
        $archivoUrl = str_replace('public/', 'storage/', $archivo);

        // Crear la película en la base de datos
        $episodio = Episodio::create([
            'numero' => $request->input('numero'),
            'archivo' => $archivoUrl,
            "duracion" => $request->input('duracion'),
            "titulo"  => $request->input('titulo'),
            "sinopsis"  => $request->input('sinopsis'),
            'temporada_id' => $request->input('temporada_id'),
            'fecha_estreno' => $request->input('fecha_estreno')

        ]);


        return redirect()->route('temporadas.show', ['serie' => $serie->id, 'temporada' => $temporada->id])->with('success', 'Episodio creado correctamente.');
    }


    public function show(Serie $serie,  Temporada $temporada, Episodio $episodio)
    {
        return view('episodios.show', compact('episodio', 'temporada', 'serie'));
    }

    public function edit(Serie $serie, Temporada $temporada, Episodio $episodio)
    {
        return view('episodios.edit', compact('episodio', 'temporada', 'serie'));
    }

    public function update(Request $request, Serie $serie, Temporada $temporada, Episodio $episodio)
    {
        $validated = $request->validate([
            'titulo' => 'required|string',
            'sinopsis' => 'required|string',
            'numero' => 'required|integer',
            'duracion' => 'required|integer',
            'fecha_estreno' => "required|date",

            'archivo' => 'nullable|mimes:mp4,mov,avi', // Cambiado a 'nullable' para permitir la actualización opcional del archivo
            'temporada_id' => 'required|integer'
        ]);

        // Actualizar los campos de la película
        $episodio->titulo = $request->input('titulo');
        $episodio->sinopsis = $request->input('sinopsis');
        $episodio->numero = $request->input('numero');
        $episodio->duracion = $request->input('duracion');
        $episodio->temporada_id = $request->input('temporada_id');
        $episodio->fecha_estreno = $request->input('fecha_estreno');


        // Si se proporciona un nuevo archivo, actualizarlo
        if ($request->hasFile('archivo')) {
            // Guardar el nuevo archivo
            $archivo = $request->file('archivo')->store('public/videos');
            $archivoUrl = str_replace('public/', 'storage/', $archivo);
            $episodio->archivo = $archivoUrl;
        }

        // Guardar los cambios en la base de datos
        $episodio->save();

        return redirect()->route('temporadas.show', ['serie' => $serie->id, 'temporada' => $temporada->id])->with('success', 'Episodio actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Serie $serie, Temporada $temporada, Episodio $episodio)
    {
        $episodio->delete();

        return redirect()->route('temporadas.show', ['serie' => $serie->id, 'temporada' => $temporada->id])->with('success', 'Episodio eliminado correctamente.');
    }
}
