<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $series = [
            [
                'nombre' => 'La que se avecina',
                'sinopsis' => 'S"La que se avecina" es una serie de televisión española que se centra en las vidas y las interacciones de los residentes de un complejo de apartamentos llamado "Mirador de Montepinar". La serie se caracteriza por su humor ácido, situaciones absurdas y personajes excéntricos.',
                'imagen' => 'storage/images/lqsa.jpg',
                'fecha_estreno' => '2023-01-01',
                'clasificacion' => '+13',
            ],
            [
                'nombre' => 'The Walking dead',
                'sinopsis' => '"The Walking Dead" es una serie de televisión basada en el cómic del mismo nombre creado por Robert Kirkman, Tony Moore y Charlie Adlard. La primera temporada de "The Walking Dead" sigue a un grupo de sobrevivientes liderados por el oficial de policía Rick Grimes, quien despierta de un coma para encontrarse en un mundo apocalíptico invadido por muertos vivientes conocidos como "caminantes".',
                'imagen' => 'storage/images/twd.jpg',
                'fecha_estreno' => '2023-01-02',
                'clasificacion' => '+16',
            ],
            [
                'nombre' => 'Naruto',
                'sinopsis' => 'Naruto Uzumaki es un joven ninja que sueña con convertirse en el líder de su aldea y ser reconocido como el más poderoso de todos. Sin embargo, Naruto oculta en su interior un gran poder: es el recipiente de un poderoso zorro demoníaco que alguna vez amenazó a su aldea, la Aldea Oculta de la Hoja.',
                'imagen' => 'storage/images/naruto.jpg',
                'fecha_estreno' => '2023-01-03',
                'clasificacion' => '+13',
            ],
            [
                'nombre' => 'Attack on titan',
                'sinopsis' => 'Hace más de 100 años, los Titanes, gigantescos seres carentes de inteligencia con un apetito insaciable de seres humanos, aparecieron de la nada y llevaron a la humanidad al borde de la extinción. Convertidos en alimento para los Titanes, los supervivientes construyeron muros gigantescos de 50 metros de alto tras los que se refugiaron renunciando así al mundo más allá de los muros.',
                'imagen' => 'storage/images/aot.jpg',
                'fecha_estreno' => '2023-01-04',
                'clasificacion' => '+13',
            ],
            [
                'nombre' => 'Demon Slayer',
                'sinopsis' => '"Demon Slayer" (también conocido como "Kimetsu no Yaiba") es un manga y anime japonés creado por Koyoharu Gotouge. La historia sigue a Tanjiro Kamado, un joven que se convierte en un cazador de demonios después de que su familia es masacrada por un demonio, excepto su hermana menor Nezuko, quien es transformada en un demonio pero conserva parte de su humanidad.',
                'imagen' => 'storage/images/demonSlayer.png',
                'fecha_estreno' => '2023-01-06',
                'clasificacion' => '+13',
            ],
            [
                'nombre' => 'Full Metal Alchemist Brotherhood',
                'sinopsis' => '"Fullmetal Alchemist: Brotherhood" es un anime basado en el manga de Hiromu Arakawa y es una versión más fiel y completa de la historia que su predecesora, "Fullmetal Alchemist". La serie sigue las aventuras de dos hermanos alquimistas, Edward y Alphonse Elric, en un mundo donde la alquimia es una ciencia avanzada.',
                'imagen' => 'storage/images/fma.jpg',
                'fecha_estreno' => '2023-01-05',
                'clasificacion' => '+13',
            ],
            [
                'nombre' => 'The boys',
                'sinopsis' => '"The Boys" es una serie de televisión estadounidense basada en el cómic del mismo nombre creado por Garth Ennis y Darick Robertson. La serie, desarrollada por Eric Kripke, se sitúa en un mundo donde los superhéroes son comercializados y venerados por el público, pero en realidad son manipuladores, corruptos y moralmente ambiguos.',
                'imagen' => 'storage/images/theboys.jpg',
                'fecha_estreno' => '2023-01-07',
                'clasificacion' => '+16',
            ],
            [
                'nombre' => 'Friends',
                'sinopsis' => '"Friends" es una serie de televisión estadounidense creada por David Crane y Marta Kauffman, que se emitió originalmente desde 1994 hasta 2004. La serie sigue las vidas, amistades y relaciones de seis amigos que viven en la ciudad de Nueva York: Rachel Green, Ross Geller, Monica Geller, Chandler Bing, Joey Tribbiani y Phoebe Buffay.',
                'imagen' => 'storage/images/friends.jpg',
                'fecha_estreno' => '2023-01-08',
                'clasificacion' => '+13',
            ],

        ];

        foreach ($series as $serie) {
            $binaryData = file_get_contents(asset($serie["imagen"]));
            $base64 = base64_encode($binaryData);
            DB::table('series')->insert([
                "nombre" => $serie["nombre"],
                "sinopsis" => $serie["sinopsis"],
                "imagen" => $base64,
                "fecha_estreno" => $serie["fecha_estreno"],
                "clasificacion" => $serie["clasificacion"],
            ]);

        }
    }
}
