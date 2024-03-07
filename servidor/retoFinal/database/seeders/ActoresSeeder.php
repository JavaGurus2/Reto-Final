<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actores = [
            [
                'nombre' => 'Andrew',
                'apellido' => 'Lincoln',
                'email' => 'andrew@email.com',
                'imagen' => 'https://example.com/john.jpg',
            ],
            [
                'nombre' => 'Norman',
                'apellido' => 'Reedus',
                'email' => 'norman@email.com',
                'imagen' => 'https://example.com/jane.jpg',
            ],
            [
                'nombre' => 'Leonardo',
                'apellido' => 'DiCaprio',
                'email' => 'leonardo@email.com',
                'imagen' => 'https://example.com/michael.jpg',
            ],
            [
                'nombre' => 'Will',
                'apellido' => 'Smith',
                'email' => 'will@email.com',
                'imagen' => 'https://example.com/emily.jpg',
            ],
            [
                'nombre' => 'Evan',
                'apellido' => 'Peters',
                'email' => 'evan@email.com',
                'imagen' => 'https://example.com/david.jpg',
            ],
            [
                    'nombre' => 'Tom',
                'apellido' => 'Hanks',
                'email' => 'tom@email.com',
                'imagen' => 'https://example.com/tom.jpg',
            ],
            [
                'nombre' => 'Scarlett',
                'apellido' => 'Johansson',
                'email' => 'scarlett@email.com',
                'imagen' => 'https://example.com/scarlett.jpg',
            ],
            [
                'nombre' => 'Brad',
                'apellido' => 'Pitt',
                'email' => 'brad@email.com',
                'imagen' => 'https://example.com/brad.jpg',
            ],
            [
                'nombre' => 'Jennifer',
                'apellido' => 'Lawrence',
                'email' => 'jennifer@email.com',
                'imagen' => 'https://example.com/jennifer.jpg',
            ],
            [
                'nombre' => 'Chris',
                'apellido' => 'Hemsworth',
                'email' => 'chris@email.com',
                'imagen' => 'https://example.com/chris.jpg',
            ],
        ];

        // Insertar los datos en la tabla
        foreach ($actores as $actor) {
            DB::table('actores')->insert($actor);
        }
    }
}
