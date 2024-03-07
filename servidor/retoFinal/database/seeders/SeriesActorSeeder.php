<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeriesActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seriesActor = [
            [
                'actor_id' => 2,
                'serie_id' => 1,
            ],
            [
                'actor_id' => 3,
                'serie_id' => 1,
            ],

            [
                'actor_id' => 1,
                'serie_id' => 2,
            ],
            [
                'actor_id' => 2,
                'serie_id' => 2,
            ],

            [
                'actor_id' => 4,
                'serie_id' => 3,
            ],
            [
                'actor_id' => 6,
                'serie_id' => 3,
            ],

            [
                'actor_id' => 1,
                'serie_id' => 4,
            ],
            [
                'actor_id' => 4,
                'serie_id' => 4,
            ],
            [
                'actor_id' => 7,
                'serie_id' => 4,
            ],

            [
                'actor_id' => 6,
                'serie_id' => 5,
            ],
            [
                'actor_id' => 9,
                'serie_id' => 5,
            ],

            [
                'actor_id' => 10,
                'serie_id' => 6,
            ],
            [
                'actor_id' => 4,
                'serie_id' => 6,
            ],


            [
                'actor_id' => 3,
                'serie_id' => 7,
            ],
            [
                'actor_id' => 8,
                'serie_id' => 7,
            ],


            [
                'actor_id' => 2,
                'serie_id' => 8,
            ],

            [
                'actor_id' => 7,
                'serie_id' => 8,
            ],
        ];
        foreach ($seriesActor as $relacion) {
            DB::table('serie_actor')->insert($relacion);
        }
    }
}
