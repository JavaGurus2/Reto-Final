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
                'categoria_id' => 2, // ID de la categoría
                'pelicula_id' => 2, // ID de la película
            ],
            // Agrega más relaciones película-categoría aquí
        ];

        foreach ($peliculasCategorias as $relacion) {
            DB::table('pelicula_categoria')->insert($relacion);
        }
    }
}
