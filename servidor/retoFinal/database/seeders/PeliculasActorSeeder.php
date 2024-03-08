<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeliculasActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $peliculaActor=
       [
        [
            'actor_id' => 2,
            'pelicula_id' => 1,
        ],
        [
            'actor_id' => 4,
            'pelicula_id' => 1,
        ],

        [
            'actor_id' => 1,
            'pelicula_id' => 2,
        ],
        [
            'actor_id' => 4,
            'pelicula_id' => 2,
        ],
        [
            'actor_id' => 5,
            'pelicula_id' => 3,
        ],

        [
            'actor_id' => 8,
            'pelicula_id' => 3,
        ],

        [
            'actor_id' => 7,
            'pelicula_id' => 4,
        ],
        [
            'actor_id' => 10,
            'pelicula_id' => 4,
        ],

        [
            'actor_id' => 9,
            'pelicula_id' => 5,
        ],
        [
            'actor_id' => 6,
            'pelicula_id' => 5,
        ],

        [
            'actor_id' => 1,
            'pelicula_id' => 6,
        ],
        [
            'actor_id' => 2,
            'pelicula_id' => 6,
        ],
        [
            'actor_id' => 3,
            'pelicula_id' => 7,
        ],
        [
            'actor_id' => 4,
            'pelicula_id' => 7,
        ],
        [
            'actor_id' => 5,
            'pelicula_id' => 8,
        ],
        [
            'actor_id' => 6,
            'pelicula_id' => 8,
        ],
        [
            'actor_id' => 7,
            'pelicula_id' => 9,
        ],
        [
            'actor_id' => 8,
            'pelicula_id' => 9,
        ],
        [
            'actor_id' => 9,
            'pelicula_id' => 10,
        ],
        [
            'actor_id' => 10,
            'pelicula_id' => 10,
        ],
        [
            'actor_id' => 9,
            'pelicula_id' => 11,
        ],
        [
            'actor_id' => 10,
            'pelicula_id' => 11,
        ],
        [
            'actor_id' => 7,
            'pelicula_id' => 12,
        ],
        [
            'actor_id' => 5,
            'pelicula_id' => 12,
        ],
        [
            'actor_id' => 9,
            'pelicula_id' => 13,
        ],
        [
            'actor_id' => 10,
            'pelicula_id' => 13,
        ],
        [
            'actor_id' => 8,
            'pelicula_id' => 14,
        ],
        [
            'actor_id' => 7,
            'pelicula_id' => 14,
        ],
        [
            'actor_id' => 6,
            'pelicula_id' => 15,
        ],
        [
            'actor_id' => 5,
            'pelicula_id' => 15,
        ],
        [
            'actor_id' => 4,
            'pelicula_id' => 16,
        ],
        [
            'actor_id' => 3,
            'pelicula_id' => 16,
        ],
        [
            'actor_id' => 2,
            'pelicula_id' => 17,
        ],
        [
            'actor_id' => 1,
            'pelicula_id' => 17,
        ],
        [
            'actor_id' => 1,
            'pelicula_id' => 18,
        ],
        [
            'actor_id' => 10,
            'pelicula_id' => 18,
        ],
        [
            'actor_id' => 2,
            'pelicula_id' => 19,
        ],
        [
            'actor_id' => 3,
            'pelicula_id' => 19,
        ],
        [
            'actor_id' => 9,
            'pelicula_id' => 20,
        ],
        [
            'actor_id' => 10,
            'pelicula_id' => 20,
        ],
        [
            'actor_id' => 7,
            'pelicula_id' => 20,
        ],
        [
            'actor_id' => 4,
            'pelicula_id' => 20,
        ],
        [
            'actor_id' => 9,
            'pelicula_id' => 21,
        ],
        [
            'actor_id' => 10,
            'pelicula_id' => 21,
        ],
        [
            'actor_id' => 7,
            'pelicula_id' => 21,
        ],
        [
            'actor_id' => 4,
            'pelicula_id' => 21,
        ],

       ] ;
       foreach ($peliculaActor as $relacion) {
        DB::table('pelicula_actor')->insert($relacion);
    }
    }
}
