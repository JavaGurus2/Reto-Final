<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class APIHPeliculasController extends Controller
{
    public function novedades()
    {
        $peliculas = Pelicula::latest()->take(20)->get();
        return $peliculas;
    }

    public function tendencias()
    {
        $peliculas = Pelicula::latest()->take(20)->get();
        return $peliculas;
    }

    public function randomcategorias()
    {
        $categorias = Categoria::inRandomOrder()->limit(5)->get();

        $categoriasConPeliculas = $categorias->map(function ($categoria) {
            $peliculas = Pelicula::whereHas('categorias', function ($query) use ($categoria) {
                $query->where('categoria_id', $categoria->id);
            })->inRandomOrder()->limit(5)->get();

            return [
                'categoria' => $categoria,
                'peliculas' => $peliculas,
            ];
        });

        return $categoriasConPeliculas;
    }

    public function todasCategorias()
    {
        $categorias = Categoria::all();
        return $categorias;
    }

    public function rellenar(Request $request)
{
    $novedades = $this->novedades();
    $tendencias = $this->tendencias();
    $randomCategorias = $this->randomcategorias();
    $todasCategorias = $this->todasCategorias();

    $data = [
        'novedades' => $novedades,
        'tendencias' => $tendencias,
        'randomCategorias' => $randomCategorias,
        'todasCategorias' => $todasCategorias,
    ];

    return response()->json($data);
}

    public function filtro(Request $request)
    {
        $categoria = Categoria::find($request["categoria"]);
        $peliculas = $categoria->peliculas()->get();
        return response()->json(["peliculas" => $peliculas]);
    }
}
