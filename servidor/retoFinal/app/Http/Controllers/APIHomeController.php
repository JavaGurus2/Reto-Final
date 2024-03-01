<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pelicula;
use App\Models\Serie;
use Illuminate\Http\Request;

class APIHomeController extends Controller
{
    public function novedades()
    {
        $peliculas = Pelicula::latest()->take(10)->get();
        $series = Serie::latest()->take(10)->get();

        return [$peliculas, $series];
    }
    public function tendencias()
    {
        $peliculas = Pelicula::latest()->take(10)->get();
        $series = Serie::latest()->take(10)->get();
        return [$peliculas, $series];
    }

    public function randomcategorias()
    {
        $categorias = Categoria::inRandomOrder()->limit(5)->get();

        $categoriasConPeliculasYSeries = $categorias->map(function ($categoria) {
            $peliculas = Pelicula::whereHas('categorias', function ($query) use ($categoria) {
                $query->where('categoria_id', $categoria->id);
            })->inRandomOrder()->limit(5)->get();

            $series = Serie::whereHas('categorias', function ($query) use ($categoria) {
                $query->where('categoria_id', $categoria->id);
            })->inRandomOrder()->limit(5)->get();

            return [
                'categoria' => $categoria,
                'peliculas' => $peliculas,
                'series' => $series,
            ];
        });

        return $categoriasConPeliculasYSeries;
    }


    public function todasCategorias()
    {
        $categorias = Categoria::all();
        return $categorias;
    }

    public function rellenar()
    {
        $novedades = $this->novedades();
        $tendencias = $this->tendencias();
        // $randomCategorias = $this->randomcategorias();
        $randomCategorias = "";
        $todasCategorias = $this->todasCategorias();

        $data = [
            'novedades' => [
                'peliculas' => $novedades[0],
                'series' => $novedades[1],
            ],
            'tendencias' => [
                'peliculas' => $tendencias[0],
                'series' => $tendencias[1],
            ],
            'randomCategorias' => $randomCategorias,
            'todasCategorias' => $todasCategorias,
        ];

        return response()->json($data);
    }


}
