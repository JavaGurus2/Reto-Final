<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pelicula;
use App\Models\User;
use Illuminate\Http\Request;

class APIPeliculasController extends Controller
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
            $peliculas = $categoria->peliculas()->inRandomOrder()->limit(5)->get();

            return [
                'categoria' => $categoria,
                'peliculas' => $peliculas,
                'peliserie' => null,
            ];
        });

        return $categoriasConPeliculas;
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

        $peliculas = [];

        foreach ($milistas as $milista) {
            if ($milista->tipo == 'pelicula') {
                $pelicula = Pelicula::find($milista->referencia_id);
                if ($pelicula) {
                    $peliculas[] = $pelicula;
                }
            }
        }
        return $peliculas;
    }

    public function rellenar(Request $request)
    {
        $novedades = $this->novedades();
        $tendencias = $this->tendencias();
        $randomCategorias = $this->randomcategorias();
        $todasCategorias = $this->todasCategorias();
        $milista = $this->milista($request["user_id"]);

        $data = [
            'novedades' => $novedades,
            'tendencias' => $tendencias,
            'randomCategorias' => $randomCategorias,
            'todasCategorias' => $todasCategorias,
            'milista' => $milista,
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
