<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeliculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peliculas = [
            [
                'titulo' => 'Aquaman',
                'sinopsis' => 'Aquaman compagina sus obligaciones como rey y como miembro de la Liga de la Justicia mientras planea su boda. Manta Negra busca tecnología atlante para reconstruir su armadura.',
                'imagen' => 'storage/images/aquaman.jpg',
                'archivo' => 'storage/videos/aquaman.mp4',
                'fecha_estreno' => '2023-01-01',
            ],
            [
                'titulo' => 'Alvin y las ardillas',
                'sinopsis' => 'A través de una serie de malentendidos, Alvin, Simon y Theodore llegan a creer que Dave va a proponer matrimonio a su nueva novia de Nueva York… y a olvidarse de ellos. Tienen tres días para hacer que retire la proposición, salvándose así ellos no sólo de perder a Dave sino, posiblemente, de ganar a un terrible hermanastro.',
                'imagen' => 'storage/images/alvinylasardillas.jpg',
                'archivo' => 'storage/videos/alvinylasardillas.mp4',
                'fecha_estreno' => '2023-01-02',
            ],
            [
                'titulo' => 'Madagascar',
                'sinopsis' => '“¡Queremos marcha, marcha!” Es la canción de MADAGASCAR, la comedia más divertida del año, del estudio que te trajo Shrek y El Espantatiburones. Cuando 4 mimados animales del Zoo de Central Park de Nueva York naufragan por accidente en la exótica isla de Madagascar, descubren que realmente ¡esto es una jungla! Paco León, Alexis Valdés, Belén Rueda y Gonzalo de Castro ponen voz a estos animales.',
                'imagen' => 'storage/images/madagascar.jpg',
                'archivo' => 'storage/videos/alvinylasardillas.mp4',
                'fecha_estreno' => '2023-01-03',
            ],
            [
                'titulo' => 'Pocoyo',
                'sinopsis' => '¡El mundo está en peligro y solo Pocoyó y los Súper Amigos pueden salvarnos! Nina, Pato y Elly tendrán que trabajar en equipo y superar sus miedos para derrotar a un villano que amenaza la paz del Mundo Pocoyó. ¿Conseguirán salir de este entuerto? ¡Pero eso no es todo! Prepárate para vivir historias divertidas, bailar, cantar y aprender con Pocoyó!',
                'imagen' => 'storage/images/pocoyo.jpg',
                'archivo' => 'storage/videos/aquaman.mp4',
                'fecha_estreno' => '2023-01-04',
            ],
            [
                'titulo' => 'Los juegos del hambre',
                'sinopsis' => 'Los juegos del hambre es un evento televisado nacionalmente en el cual los "Tributos" tienen que luchar entre ellos hasta quedar solamente un superviviente.',
                'imagen' => 'storage/images/ljdh.jpg',
                'archivo' => 'storage/videos/ljdh.mp4',
                'fecha_estreno' => '2023-01-05',
            ],
            [
                'titulo' => 'Oppenheimer',
                'sinopsis' => 'Experimenta el impresionante fenómeno global que ha cautivado al público de todo el mundo. Escrita y dirigida por Christopher Nolan, Oppenheimer sumerge al público en la mente del físico J. Robert Oppenheimer, cuyo trabajo en el Proyecto Manhattan creó la primera bomba atómica.',
                'imagen' => 'storage/images/Oppenheimer.jpg',
                'archivo' => 'storage/videos/ljdh.mp4',
                'fecha_estreno' => '2023-01-06',
            ],
            [
                'titulo' => 'John Wick',
                'sinopsis' => 'John Wick (Keanu Reeves) descubre un camino para derrotar a la Alta Mesa. Pero para poder ganar su libertad, Wick deberá enfrentarse a un nuevo rival con poderosas alianzas en todo el mundo, capaz de convertir a viejos amigos en enemigos.',
                'imagen' => 'storage/images/John.jpg',
                'archivo' => 'storage/videos/jhon.mp4',
                'fecha_estreno' => '2023-01-07',
            ],
            [
                'titulo' => 'Napoleon',
                'sinopsis' => 'DEL CINE A TU CASA. Napoleón es una epopeya de acción llena de espectáculo que detalla el accidentado ascenso y caída del emblemático emperador francés Napoleón Bonaparte, interpretado por el ganador del Oscar® Joaquin Phoenix (Mejor Actor, Joker, 2020).',
                'imagen' => 'storage/images/napoleon.jpg',
                'archivo' => 'storage/videos/napoleon.mp4',
                'fecha_estreno' => '2023-01-08',
            ],
            [
                'titulo' => 'Pinocho',
                'sinopsis' => 'El carpintero Gepetto crea una marioneta de madera que, un día, comienza a hablar y andar. Su nombre: Pinocho, su deseo: convertirse en un niño de verdad.',
                'imagen' => 'storage/images/pinocho.png',
                'archivo' => 'storage/videos/jhon.mp4',
                'fecha_estreno' => '2023-01-09',
            ],
            [
                'titulo' => 'Lujuria',
                'sinopsis' => 'Emi es una joven ambiciosa que lleva años soñando con un gran mundo. Cuando surge una oportunidad, se lanza sin dudarlo, convirtiéndose en una exclusiva acompañante. Pronto es ella quien, invitada por jeques árabes, comienza a reclutar a celebridades, estrellas de la pantalla y modelos. Sin embargo, este mundo inaccesible y lujoso pronto mostrará su lado más oscuro.',
                'imagen' => 'storage/images/lujuria.jpg',
                'archivo' => 'storage/videos/napoleon.mp4',
                'fecha_estreno' => '2023-01-10',
            ],
            [
                'titulo' => 'Babysitter',
                'sinopsis' => 'Una adolescente convierte su servicio de niñera en un servicio de prostitutas para hombres casados después de haber estado jugando con uno de sus clientes.',
                'imagen' => 'storage/images/babysitter.jpg',
                'archivo' => 'storage/videos/babysitter.mp4',
                'fecha_estreno' => '2023-01-11',
            ],
            [
                'titulo' => 'Antes de que te vayas',
                'sinopsis' => 'Una mujer pierde el tren de la 1:30 que debía llevarla de Nueva York hasta Boston, quedando atrapada en la Gran Manzana en medio de la noche al descubrir que en un descuido le han robado la cartera. Sin embargo, Nick, un trompetista ambulante que tocaba en la estación de Grand Central ha visto lo ocurrido y le ofrece su ayuda para que pueda llegar a su casa.',
                'imagen' => 'storage/images/adqtv.jpg',
                'archivo' => 'storage/videos/babysitter.mp4',
                'fecha_estreno' => '2023-01-12',
            ],
            [
                'titulo' => 'Smile',
                'sinopsis' => 'Tras presenciar un extraño y traumático incidente con un paciente, la doctora Rose Cotter (Sosie Bacon) comienza a experimentar sucesos aterradores que no puede explicar. A medida que un terror abrumador comienza a apoderarse de su vida, Rose debe enfrentarse a su problemático pasado para sobrevivir y escapar de su horripilante nueva realidad.',
                'imagen' => 'storage/images/smile.jpg',
                'archivo' => 'storage/videos/lmdi.mp4',
                'fecha_estreno' => '2023-01-13',
            ],
            [
                'titulo' => 'Terrofier2',
                'sinopsis' => 'Mientras cuida a dos niños en Halloween, una niñera encuentra un cinta VHS en la bolsa de dulces de los niños. La cinta contiene tres historias de terror, todas relacionadas entre sí por un payaso asesino. A medida que avanza la noche, empiezan a ocurrir cosas extrañas en la casa. La niñera no tarda en descubrir la espeluznante verdad: el payaso maníaco se está convirtiendo en realidad.',
                'imagen' => 'storage/images/terrofier.jpg',
                'archivo' => 'storage/videos/lmdi.mp4',
                'fecha_estreno' => '2023-01-14',
            ],
            [
                'titulo' => 'La mujer del infierno',
                'sinopsis' => 'Película pre-candidata a los Oscar 2021. Maya es una mujer sin pasado ni familia, que cuenta con la única compañía de su mejor amiga Dini. Un día recibe una carta donde se le informa que ha heredado una casa ancestral en una aldea rural. Al llegar, se topa con una comunidad violenta que la ha buscado por años, considerándola el origen de una maldición que los ha torturado por generaciones.',
                'imagen' => 'storage/images/lmdi.jpg',
                'archivo' => 'storage/videos/lmdi.mp4',
                'fecha_estreno' => '2023-01-15',
            ],
            [
                'titulo' => 'Shrek',
                'sinopsis' => 'Nunca has conocido un héroe como Shrek, el encantador ogro que ha acaparado la atención de todo el mundo con…¡El Mayor Cuento de Hadas Jamás Contado! Vuelve a vivir cada momento de las andanzas de Shrek para rescatar a la Princesa Fiona, con la ayuda de Asno, y conseguir a cambio la escritura de su amado pantano de manos de Lord Farquaad. ¡SHREK es una aventura que querrás ver una y otra vez!',
                'imagen' => 'storage/images/shrek.jpg',
                'archivo' => 'storage/videos/shrek.mp4',
                'fecha_estreno' => '2023-01-16',
            ],
            [
                'titulo' => 'Intocable',
                'sinopsis' => 'Comedia basada en hechos reales, sobre dos hombres que nunca deberían haberse encontrado: un aristócrata herido en un accidente y un joven de los suburbios de París quien se convierte en su asistente y le devuelve las ganas de vivir.',
                'imagen' => 'storage/images/intocable.jpg',
                'archivo' => 'storage/videos/intocable.mp4',
                'fecha_estreno' => '2023-01-17',
            ],
            [
                'titulo' => 'Matrix',
                'sinopsis' => 'Neo trabajada en una empresa de software. Su vida se ve alterada cuando entabla contacto telefónico con el que cree que es otro hacker y unos misteriosos agentes comienzan a seguirle.',
                'imagen' => 'storage/images/matrix.jpg',
                'archivo' => 'storage/videos/matrix.mp4',
                'fecha_estreno' => '2023-01-18',
            ],
            [
                'titulo' => 'Origen',
                'sinopsis' => 'Dom Cobb es un ladrón que puede entrar en los sueños de la gente y hacerse con sus secretos.',
                'imagen' => 'storage/images/origen.jpg',
                'archivo' => 'storage/videos/intocable.mp4',
                'fecha_estreno' => '2023-01-19',
            ],
            [
                'titulo' => 'Los Vengadores: Infinity War',
                'sinopsis' => 'Un nuevo peligro acecha procedente de las sombras del cosmos. Thanos, el infame tirano intergaláctico, tiene como objetivo reunir las seis Gemas del Infinito, artefactos de poder inimaginable, y usarlas para imponer su perversa voluntad a toda la existencia. Los Vengadores y sus aliados tendrán que luchar contra el mayor villano al que se han enfrentado nunca, y evitar que se haga con el control de la galaxia. En su nueva e impactante aventura, el destino de la Tierra nunca había sido más incierto, las Gemas del Infinito estarán en juego, unos querrán protegerlas y otros controlarlas, ¿quién ganará?',
                'imagen' => 'storage/images/infinity.jpg',
                'archivo' => 'storage/videos/marvel.mp4',
                'fecha_estreno' => '2023-01-20',
            ],
            [
                'titulo' => 'Los Vengadores: Endgame',
                'sinopsis' => 'Después de los devastadores eventos ocurridos en Vengadores: Infinity War, el universo está en ruinas debido a las acciones de Thanos, el Titán Loco. Tras la derrota, las cosas no pintan bien para los Vengadores. Mientras Iron Man (Robert Downey Jr.) vaga en soledad junto a Nebula (Karen Gillan) en una nave lejos de la Tierra, el grupo encabezado por Capitán América (Chris Evans), Viuda Negra (Scarlett Johansson), Hulk (Mark Ruffalo) y Thor (Chris Hemsworth) deberá tratar de revertir los efectos de la catástrofe provocada por Thanos. Los Vengadores deberán reunirse una vez más para deshacer sus acciones y restaurar el orden en el universo de una vez por todas. Esta vez, contarán también con aliados como Ojo de Halcón (Jeremy Renner) y Capitana Marvel (Brie Larson), además de Ant-Man (Paul Rudd), que presumiblemente podría haber estado atrapado en el Reino Cuántico. Juntos, se prepararán para la batalla final, sin importar cuáles sean las consecuencias.',
                'imagen' => 'storage/images/endgame.jpg',
                'archivo' => 'storage/videos/marvel.mp4',
                'fecha_estreno' => '2023-01-21',
            ],
        ];
        foreach ($peliculas as $pelicula) {
            $binaryData = file_get_contents(asset($pelicula["imagen"]));
            $base64 = base64_encode($binaryData);

            DB::table('peliculas')->insert([
                "titulo" => $pelicula["titulo"],
                "sinopsis" => $pelicula["sinopsis"],
                "imagen" => $base64,
                "archivo" => $pelicula["archivo"],
                "fecha_estrenos" => $pelicula["fecha_estreno"],
            ]);
        }
    }
}
