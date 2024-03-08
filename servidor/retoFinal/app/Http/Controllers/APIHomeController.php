<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pelicula;
use App\Models\Serie;
use App\Models\User;
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
            $peliculas = $categoria->peliculas()->inRandomOrder()->limit(5)->get();
            $series = $categoria->series()->inRandomOrder()->limit(5)->get();

            return [
                'categoria' => $categoria,
                'peliculas' => $peliculas,
                'series' => $series,
                'peliserie' => null
            ];
        });

        return $categoriasConPeliculasYSeries;
    }



    public function todasCategorias()
    {
        $categorias = Categoria::all();
        return $categorias;
    }

    public function milista($user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return null;
        }
        $milistas = $user->milistas()->get();

        $series = [];
        $peliculas = [];

        foreach ($milistas as $milista) {
            if ($milista->tipo == 'pelicula') {
                $pelicula = Pelicula::find($milista->referencia_id);
                if ($pelicula) {
                    $peliculas[] = $pelicula;
                }
            } elseif ($milista->tipo == 'serie') {
                $serie = Serie::find($milista->referencia_id);
                if ($serie) {
                    $series[] = $serie;
                }
            }
        }
        return [$series, $peliculas];
    }

    public function rellenar(Request $request)
    {
        $user_id = $request["user_id"];
        $novedades = $this->novedades();
        $tendencias = $this->tendencias();
        $randomCategorias = $this->randomcategorias();
        $milista = $this->milista($user_id);
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
            'milista' => [
                'series' => $milista[0],
                'peliculas' => $milista[1]
            ]
        ];

        return response()->json($data);
    }
    public function filtro(Request $request)
    {
        $categoria = Categoria::find($request["categoria"]);
        $series = $categoria->series()->get();
        $peliculas = $categoria->peliculas()->get();
        return response()->json(["peliculas" => $peliculas, "series" => $series]);
    }

}
