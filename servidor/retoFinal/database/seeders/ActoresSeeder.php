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
                'imagen' => 'storage/images/andrew.jpg',
            ],
            [
                'nombre' => 'Norman',
                'apellido' => 'Reedus',
                'email' => 'norman@email.com',
                'imagen' => 'storage/images/norman.jpg',
            ],
            [
                'nombre' => 'Leonardo',
                'apellido' => 'DiCaprio',
                'email' => 'leonardo@email.com',
                'imagen' => 'storage/images/leonardo.jpg',
            ],
            [
                'nombre' => 'Will',
                'apellido' => 'Smith',
                'email' => 'will@email.com',
                'imagen' => 'storage/images/will.jpg',
            ],
            [
                'nombre' => 'Evan',
                'apellido' => 'Peters',
                'email' => 'evan@email.com',
                'imagen' => 'storage/images/evan.jpg',
            ],
            [
                'nombre' => 'Tom',
                'apellido' => 'Hanks',
                'email' => 'tom@email.com',
                'imagen' => 'storage/images/tom.jpg',
            ],
            [
                'nombre' => 'Scarlett',
                'apellido' => 'Johansson',
                'email' => 'scarlett@email.com',
                'imagen' => 'storage/images/scarlett.jpg',
            ],
            [
                'nombre' => 'Brad',
                'apellido' => 'Pitt',
                'email' => 'brad@email.com',
                'imagen' => 'storage/images/brad.jpg',
            ],
            [
                'nombre' => 'Jennifer',
                'apellido' => 'Lawrence',
                'email' => 'jennifer@email.com',
                'imagen' => 'storage/images/jennifer.jpg',
            ],
            [
                'nombre' => 'Chris',
                'apellido' => 'Hemsworth',
                'email' => 'chris@email.com',
                'imagen' => 'storage/images/Chris.jpg',
            ],
        ];

        // Insertar los datos en la tabla
        foreach ($actores as $actor) {

            $binaryData = file_get_contents(asset($actor["imagen"]));
            $base64 = base64_encode($binaryData);

            DB::table('actores')->insert([
                "nombre" => $actor["nombre"],
                "apellido" => $actor["apellido"],
                "email" => $actor["email"],
                "imagen" => $base64,
            ]);
        }
    }
}
