<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeriesCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            $seriesCategorias = [
                [
                    'categoria_id' => 2,
                    'serie_id' => 1,
                ],
                [
                    'categoria_id' => 3,
                    'serie_id' => 1,
                ],
                [
                    'categoria_id' => 1,
                    'serie_id' => 2,
                ],
                [
                    'categoria_id' => 4,
                    'serie_id' => 2,
                ],
                [
                    'categoria_id' => 5,
                    'serie_id' => 2,
                ],
                [
                    'categoria_id' => 8,
                    'serie_id' => 2,
                ],
                [
                    'categoria_id' => 1,
                    'serie_id' => 3,
                ],
                [
                    'categoria_id' => 2,
                    'serie_id' => 3,
                ],
                [
                    'categoria_id' => 9,
                    'serie_id' => 3,
                ],
                [
                    'categoria_id' => 9,
                    'serie_id' => 4,
                ],
                [
                    'categoria_id' => 1,
                    'serie_id' => 4,
                ],
                [
                    'categoria_id' => 5,
                    'serie_id' => 4,
                ],
                [
                    'categoria_id' => 10,
                    'serie_id' => 4,
                ],
                [
                    'categoria_id' => 13,
                    'serie_id' => 4,
                ],
                [
                    'categoria_id' => 1,
                    'serie_id' => 5,
                ],
                [
                    'categoria_id' => 2,
                    'serie_id' => 5,
                ],
                [
                    'categoria_id' => 9,
                    'serie_id' => 5,
                ],
                [
                    'categoria_id' => 1,
                    'serie_id' => 6,
                ],
                [
                    'categoria_id' => 2,
                    'serie_id' => 6,
                ],
                [
                    'categoria_id' => 2,
                    'serie_id' => 6,
                ],
                [
                    'categoria_id' => 9,
                    'serie_id' => 6,
                ],
                [
                    'categoria_id' => 1,
                    'serie_id' => 7,
                ],
                [
                    'categoria_id' => 12,
                    'serie_id' => 7,
                ],
                [
                    'categoria_id' => 13,
                    'serie_id' => 7,
                ],
                [
                    'categoria_id' => 2,
                    'serie_id' => 8,
                ],
                [
                    'categoria_id' => 3,
                    'serie_id' => 8,
                ],
                [
                    'categoria_id' => 7,
                    'serie_id' => 8,
                ],
            ];
            foreach ($seriesCategorias as $relacion) {
                DB::table('serie_categoria')->insert($relacion);
            }
    }
}
