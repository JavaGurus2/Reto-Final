<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemporadasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $temporadas = [
            [
            'nombre' => 'La que se avecina',
            'numero' => 1,
            'fecha_estreno' => '2023-01-01',
            'serie_id' => 1,

            ],
            [
                'nombre' => 'The walking dead season1',
                'numero' => 1,
                'fecha_estreno' => '2023-01-02',
                'serie_id' => 2,
            ],
            [
                'nombre' => 'The walking dead season2',
                'numero' => 2,
                'fecha_estreno' => '2023-02-02',
                'serie_id' => 2,
            ],
            [
                'nombre' => 'The walking dead season3',
                'numero' => 3,
                'fecha_estreno' => '2023-03-02',
                'serie_id' => 2,
            ],
            [
                'nombre' => 'Naruto',
                'numero' => 1,
                'fecha_estreno' => '2023-01-03',
                'serie_id' => 2,
            ],
            [
                'nombre' => 'Naruto Shippuden',
                'numero' => 2,
                'fecha_estreno' => '2023-02-03',
                'serie_id' => 3,
            ],
            [
                'nombre' => 'Attack on Titan',
                'numero' => 1,
                'fecha_estreno' => '2023-01-04',
                'serie_id' => 4,
            ],
            [
                'nombre' => 'Attack on Titan',
                'numero' => 2,
                'fecha_estreno' => '2023-02-04',
                'serie_id' => 4,
            ],
            [
                'nombre' => 'Attack on Titan',
                'numero' => 3,
                'fecha_estreno' => '2023-03-04',
                'serie_id' => 4,
            ],
            [
                'nombre' => 'Attack on Titan',
                'numero' => 4,
                'fecha_estreno' => '2023-04-04',
                'serie_id' => 4,
            ],

            [
                'nombre' => 'Demon Slayer',
                'numero' => 1,
                'fecha_estreno' => '2023-01-05',
                'serie_id' => 5,
            ],
            [
                'nombre' => 'Full Metal Alchemist Brotherhood',
                'numero' => 1,
                'fecha_estreno' => '2023-01-06',
                'serie_id' => 6,
            ],
            [
                'nombre' => 'The boys',
                'numero' => 1,
                'fecha_estreno' => '2023-01-07',
                'serie_id' => 7,
            ],
            [
                'nombre' => 'Friends',
                'numero' => 1,
                'fecha_estreno' => '2023-01-08',
                'serie_id' => 8,
            ],
        ];

        foreach ($temporadas as $temporada) {
            DB::table('temporadas')->insert($temporada);
        }
    }
    }
