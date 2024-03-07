<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Categorías para películas
        $categorias = [
            'Acción',
            'Comedia',
            'Drama',
            'Ciencia Ficción',
            'Suspense',
            "Terror",
            "Amor",
            "Aventura",
            "Animacion",
            "Historico",
            "Intelectual",
            "Oscura",
            "Cruda",
            "Emocional"
        ];

        // Insertar las categorías para películas
        foreach ($categorias as $categoria) {
            DB::table('categorias')->insert([
                'nombre' => $categoria,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        // Categorías para series
        $categoriasSeries = [
            'Acción',
            'Comedia',
            'Drama',
            'Ciencia Ficción',
            'Suspense',
            "Terror",
            "Amor",
            "Aventura",
            "Animacion",
            "Historico",
            "Intelectual",
            "Oscura",
            "Cruda",
            "Emocional"
        ];

        // Insertar las categorías para series
        foreach ($categoriasSeries as $categoria) {
            DB::table('categorias')->insert([
                'nombre' => $categoria,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
