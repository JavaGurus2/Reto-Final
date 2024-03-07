<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeliculasCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peliculasCategorias = [
            [
                'categoria_id' => 1, // ID de la categoría
                'pelicula_id' => 1, // ID de la película
            ],
            [
                'categoria_id' => 4, // ID de la categoría
                'pelicula_id' => 1, // ID de la película
            ],
            [
                'categoria_id' => 8,
                'pelicula_id' => 1,
            ],
            [
                'categoria_id' => 9, // ID de la categoría
                'pelicula_id' => 2, // ID de la película
            ],
            [
                'categoria_id' => 8,
                'pelicula_id' => 2,
            ],
            [
                'categoria_id' => 8,
                'pelicula_id' => 3,
            ],
            [
                'categoria_id' => 9,
                'pelicula_id' => 3,
            ],
            [
                'categoria_id' => 8,
                'pelicula_id' => 4,
            ],
            [
                'categoria_id' => 9,
                'pelicula_id' => 4,
            ],
            [
                'categoria_id' => 5,
                'pelicula_id' => 5,
            ],
            [
                'categoria_id' => 10,
                'pelicula_id' => 5,
            ],
            [
                'categoria_id' => 1,
                'pelicula_id' => 6,
            ],
            [
                'categoria_id' => 8,
                'pelicula_id' => 6,
            ],
            [
                'categoria_id' => 10,
                'pelicula_id' => 7,
            ],
            [
                'categoria_id' => 3,
                'pelicula_id' => 7,
            ],
            [
                'categoria_id' => 3,
                'pelicula_id' => 8,
            ],
            [
                'categoria_id' => 9,
                'pelicula_id' => 8,
            ],
            [
                'categoria_id' => 3,
                'pelicula_id' => 9,
            ],
            [
                'categoria_id' => 2,
                'pelicula_id' => 9,
            ],
            [
                'categoria_id' => 7,
                'pelicula_id' => 9,
            ],
            [
                'categoria_id' => 3,
                'pelicula_id' => 10,
            ],
            [
                'categoria_id' => 2,
                'pelicula_id' => 10,
            ],
            [
                'categoria_id' => 7,
                'pelicula_id' => 10,
            ],
            [
                'categoria_id' => 3,
                'pelicula_id' => 11,
            ],
            [
                'categoria_id' => 2,
                'pelicula_id' => 11,
            ],
            [
                'categoria_id' => 7,
                'pelicula_id' => 11,
            ],
            [
                'categoria_id' => 5,
                'pelicula_id' => 12,
            ],
            [
                'categoria_id' => 6,
                'pelicula_id' => 12,
            ],
            [
                'categoria_id' => 12,
                'pelicula_id' => 12,
            ],
            [
                'categoria_id' => 5,
                'pelicula_id' => 13,
            ],
            [
                'categoria_id' => 6,
                'pelicula_id' => 13,
            ],
            [
                'categoria_id' => 12,
                'pelicula_id' => 13,
            ],
            [
                'categoria_id' => 5,
                'pelicula_id' => 14,
            ],
            [
                'categoria_id' => 6,
                'pelicula_id' => 14,
            ],
            [
                'categoria_id' => 12,
                'pelicula_id' => 14,
            ],
            [
                'categoria_id' => 1,
                'pelicula_id' => 15,
            ],
            [
                'categoria_id' => 2,
                'pelicula_id' => 15,
            ],
            [
                'categoria_id' => 8,
                'pelicula_id' => 15,
            ],
            [
                'categoria_id' => 9,
                'pelicula_id' => 15,
            ],
            [
                'categoria_id' => 3,
                'pelicula_id' => 16,
            ],
            [
                'categoria_id' => 14,
                'pelicula_id' => 16,
            ],
            [
                'categoria_id' => 1,
                'pelicula_id' => 17,
            ],
            [
                'categoria_id' => 4,
                'pelicula_id' => 17,
            ],
            [
                'categoria_id' => 1,
                'pelicula_id' => 18,
            ],
            [
                'categoria_id' => 4,
                'pelicula_id' => 18,
            ],
            [
                'categoria_id' => 1,
                'pelicula_id' => 19,
            ],
            [
                'categoria_id' => 4,
                'pelicula_id' => 19,
            ],
            [
                'categoria_id' => 1,
                'pelicula_id' => 20,
            ],
            [
                'categoria_id' => 4,
                'pelicula_id' => 20,
            ],

            [
                'categoria_id' => 1,
                'pelicula_id' => 21,
            ],
            [
                'categoria_id' => 4,
                'pelicula_id' => 21,
            ],

        ];

        foreach ($peliculasCategorias as $relacion) {
            DB::table('pelicula_categoria')->insert($relacion);
        }
    }
}
