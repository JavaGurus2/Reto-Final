<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EpisodiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $episodios =
        [
            [
                'numero' => 1,
                'archivo' => '1episodio1.mp4',
                'titulo' => 'La que se avecina',
                'fecha_estreno' => '2023-01-01',
                'duracion' => 45, // duración en minutos
                'sinopsis' => 'La serie sigue las vidas y relaciones de los variados personajes que residen en un complejo residencial llamado Mirador de Montepinar, donde se desarrollan situaciones cómicas y absurdas en la vida cotidiana de los vecinos. Desde la relación de la comunidad con los recién llegados hasta las peculiaridades y conflictos entre los propios vecinos, la serie ofrece una mirada humorística a la convivencia en un entorno residencial.',
                'temporada_id' => 1, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 2,
                'archivo' => '1episodio2.mp4',
                'titulo' => 'La que se avecina',
                'fecha_estreno' => '2023-01-02',
                'duracion' => 42, // duración en minutos
                'sinopsis' => 'En este episodio, se presentan más detalles sobre las relaciones entre los personajes, así como nuevas situaciones que generan humor y conflictos en la comunidad. Pueden surgir nuevos problemas entre los vecinos, o pueden continuar desarrollándose tramas presentadas en episodios anteriores.',
                'temporada_id' => 1, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 1,
                'archivo' => '2episodio1.mp4',
                'titulo' => 'Dias Pasados',
                'fecha_estreno' => '2023-01-02',
                'duracion' => 42, // duración en minutos
                'sinopsis' => 'Rick Grimes, un oficial de policía que queda gravemente herido en un tiroteo y entra en coma. Cuando despierta en un hospital abandonado, se encuentra en un mundo post-apocalíptico invadido por muertos vivientes.',
                'temporada_id' => 2, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 2,
                'archivo' => '2episodio2.mp4',
                'titulo' => 'Visceras',
                'fecha_estreno' => '2023-01-03',
                'duracion' => 45, // duración en minutos
                'sinopsis' => 'después de escapar del hospital, Rick Grimes sigue buscando a su familia en un mundo infestado de muertos vivientes. Durante su búsqueda, se encuentra con un grupo de sobrevivientes liderados por Shane Walsh, su antiguo compañero de policía.',
                'temporada_id' => 2, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 1,
                'archivo' => '21episodio1.mp4',
                'titulo' => 'Lo que se avecina',
                'fecha_estreno' => '2023-02-02',
                'duracion' => 44, // duración en minutos
                'sinopsis' => 'En este episodio, el grupo de supervivientes liderado por Rick Grimes abandona Atlanta en busca de un lugar seguro después de que la ciudad fuera invadida por hordas de zombis.',
                'temporada_id' => 3, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 2,
                'archivo' => '22episodio2.mp4',
                'titulo' => 'Sangria',
                'fecha_estreno' => '2023-02-03',
                'duracion' => 42, // duración en minutos
                'sinopsis' => ' después de los eventos traumáticos del primer episodio, el grupo de supervivientes liderado por Rick Grimes se encuentra en una situación desesperada. El hijo de Rick, Carl, ha sido gravemente herido por un disparo accidental y necesita atención médica urgente.',
                'temporada_id' => 3, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 1,
                'archivo' => '31episodio1.mp4',
                'titulo' => 'Semilla',
                'fecha_estreno' => '2023-03-03',
                'duracion' => 44, // duración en minutos
                'sinopsis' => 'después de los eventos traumáticos en la granja de Hershel al final de la temporada 2, el grupo de supervivientes liderado por Rick Grimes está en busca de un lugar seguro para establecerse.',
                'temporada_id' => 4, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 2,
                'archivo' => '32episodio1.mp4',
                'titulo' => 'Enfermo',
                'fecha_estreno' => '2023-03-03',
                'duracion' => 42, // duración en minutos
                'sinopsis' => 'Uno de los prisioneros sobrevivientes, Tomas, muestra ser una amenaza para el grupo al intentar sabotear sus esfuerzos para asegurar la prisión. Rick y los demás deben tomar medidas drásticas para proteger a su gente y mantener el control sobre la prisión.',
                'temporada_id' => 4, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 1,
                'archivo' => '3episodio1.mp4',
                'titulo' => 'Entra! Uzumaki Naruto',
                'fecha_estreno' => '2023-01-04',
                'duracion' =>24, // duración en minutos
                'sinopsis' => ' En este episodio, conocemos a Naruto Uzumaki, un joven ninja del pueblo de Konoha con el sueño de convertirse en el Hokage, el líder de su aldea y el ninja más poderoso.',
                'temporada_id' => 5, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 2,
                'archivo' => '3episodio2.mp4',
                'titulo' => 'Yo soy Konohamaru!',
                'fecha_estreno' => '2023-01-05',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Naruto continúa su entrenamiento en la Academia Ninja de Konoha y se encuentra con un joven ninja llamado Konohamaru Sarutobi, quien es el nieto del Tercer Hokage, el líder de la aldea.',
                'temporada_id' => 5, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 1,
                'archivo' => '33episodio1.mp4',
                'titulo' => 'Regreso a casa',
                'fecha_estreno' => '2023-01-04',
                'duracion' =>24, // duración en minutos
                'sinopsis' => ' En este episodio, conocemos a Naruto Uzumaki, un joven ninja del pueblo de Konoha con el sueño de convertirse en el Hokage, el líder de su aldea y el ninja más poderoso.',
                'temporada_id' => 6, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 2,
                'archivo' => '33episodio2.mp4',
                'titulo' => 'El Akatsuki hace su movimiento',
                'fecha_estreno' => '2023-01-05',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Naruto continúa su entrenamiento en la Academia Ninja de Konoha y se encuentra con un joven ninja llamado Konohamaru Sarutobi, quien es el nieto del Tercer Hokage, el líder de la aldea.',
                'temporada_id' => 6, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 1,
                'archivo' => '4aepisodio1.mp4',
                'titulo' => 'A ti, dentro de 2000 años',
                'fecha_estreno' => '2023-01-05',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'El distrito Shiganshina es una ciudad rodeada por un muro que supera los 50 metros de altura. Sus habitantes construyeron este muro colosal para protegerse del ataque de los Titanes. Eren, un chico que sueña con aventurarse en el mundo exterior, y Mikasa, quien mejor le comprende, viven pacíficamente intramuros. Un día se enteran del regreso del Cuerpo de Exploración.',
                'temporada_id' => 7, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 2,
                'archivo' => '4aepisodio1.mp4',
                'titulo' => 'Aquel dia',
                'fecha_estreno' => '2023-01-06',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'El ataque de los Titanes al distrito Shiganshina cambia la vida de sus habitantes. La gente huye presa del pánico mientras los Titanes los van devorando uno tras otro. Ante semejante espectáculo dantesco, a la humanidad le queda bien patente que no es más que alimento para los Titanes. Eren se siente impotente al no poder salvar a su madre y comienza a albergar un profundo rencor hacia ellos.',
                'temporada_id' => 7, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 3,
                'archivo' => '4aepisodio1.mp4',
                'titulo' => 'Una tenue luz en la desesperación',
                'fecha_estreno' => '2023-01-07',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'El método más efectivo para matar Titanes es una técnica conocida como “Maniobras Tridimensionales” y Eren, Mikasa y Armin se enrolan en el cuerpo de instrucción para aprenderla. Durante el duro entrenamiento a que los somete Keith empiezan a congeniar con sus compañeros, de distinta procedencia y forma de pensar.',
                'temporada_id' => 7, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 4,
                'archivo' => '4episodio1.mp4',
                'titulo' => 'La noche de la desbandada',
                'fecha_estreno' => '2023-01-08',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Después de tres años en el cuerpo de instrucción sometidos al duro entrenamiento de Keith, Eren, Mikasa, Armin y los demás están a punto de graduarse. Mientras tanto, Eren se da cuenta de una contradicción inherente a su formación: perfeccionar las Maniobras Tridimensionales y otras habilidades para matar a los Titanes es una oportunidad para alejarse lo máximo posible de ellos.',
                'temporada_id' => 7, // ID de la temporada a la que pertenece el episodio
            ],

            [
                'numero' => 1,
                'archivo' => '41bepisodio1.mp4',
                'titulo' => 'El titan bestia',
                'fecha_estreno' => '2023-02-05',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Annie es llevada bajo custodia cuando Hange y su equipo descubren a un Titán sellado dentro de uno de los muros. El Pastor Nick aparece instándolos a cubrirlo de la luz del sol con sábanas. Hange pregunta a Nick por qué hay un Titán atrapado en los muros, pero éste se niega a responderle. Mientras tanto, Erwin es informado de que una brecha se ha abierto en el Muro Rose.',
                'temporada_id' => 8, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 2,
                'archivo' => '42bepisodio1.mp4',
                'titulo' => 'He vuelto a casa',
                'fecha_estreno' => '2023-02-06',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'La Legión de Reconocimiento sale de Stohess para lidiar con los titanes que aparecieron del Muro Rose. Sasha corre hacia Dauper y advertir así a su padre y a su pueblo, lo que la enfrentará a un nuevo Titán. Por otro lado, cuando Conny y su grupo llegan a Ragako se dan cuenta que ya es demasiado tarde: los Titanes lo han arrasado todo.',
                'temporada_id' => 8, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 3,
                'archivo' => '43bepisodio1.mp4',
                'titulo' => 'Hacia el sudoeste',
                'fecha_estreno' => '2023-02-07',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Conny cree que su familia podría estar viva ya que no se encontraron los cuerpos. Cuando se reúne con su grupo para buscar la brecha en el Muro, el Titán retenido en su casa le habla, dandole la bienvenida a casa. Entrada la noche los dos grupos se reúnen para descubrir sorprendidos que no hubo ninguna brecha en el Muro.',
                'temporada_id' => 8, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 4,
                'archivo' => '4episodio1.mp4',
                'titulo' => 'Soldado',
                'fecha_estreno' => '2023-02-08',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Los grupos de Nanaba y Gelgar se refugian en el Castillo Utgard y hablan sobre los hechos ocurridos durante el día. Mientras tanto, una oleada de Titanes los acorrala. Los veteranos luchan contra los Titanes, mientras los reclutas se atrincheran en el interior.',
                'temporada_id' => 8, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 1,
                'archivo' => '41cepisodio1.mp4',
                'titulo' => 'Señales de humo',
                'fecha_estreno' => '2023-03-05',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Eren y los supervivientes del 104 se incorporan al escuadrón de Levi. Hange experimenta con Eren con la intención de emplear su habilidad para solidificar su cuerpo cuando se transforma en Titán para sellar el agujero del Muro María.',
                'temporada_id' => 9, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 2,
                'archivo' => '42cepisodio1.mp4',
                'titulo' => 'Dolor',
                'fecha_estreno' => '2023-03-06',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'El carruaje en el que viajaban Eren e Historia ha caído en una emboscada y ambos han sido capturados. Mientras Kenny se interpone en el camino de Levi, sus compañeros se ven obligados a usar fuerza letal contra otros seres humanos.',
                'temporada_id' => 9, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 3,
                'archivo' => '43cepisodio1.mp4',
                'titulo' => 'Relatos del pasado',
                'fecha_estreno' => '2023-03-07',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Cuando Historia despierta se encuentra con un hombre que asegura ser su padre y le revela el secreto de la familia Reiss. Hange parte para informar a Erwin de que los Reiss pretenden devorar a Eren para adquirir sus habilidades como Titán.',
                'temporada_id' => 9, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 1,
                'archivo' => '41depisodio1.mp4',
                'titulo' => 'Al otro lado del mar',
                'fecha_estreno' => '2023-04-05',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Eren y sus compañeros han puesto rumbo al otro lado del mar, donde tiene lugar una guerra sin fin. Allí, Gabi Braun y Falco Grice han entrenado toda su vida para heredar uno de los siete Titanes de Marley y ayudar a su nación a destruir Eldia.',
                'temporada_id' => 10, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 2,
                'archivo' => '42depisodio1.mp4',
                'titulo' => 'El tren en la noche oscura',
                'fecha_estreno' => '2023-04-06',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Eren y sus compañeros han puesto rumbo al otro lado del mar, donde tiene lugar una guerra sin fin. Allí, Gabi Braun y Falco Grice han entrenado toda su vida para heredar uno de los siete Titanes de Marley y ayudar a su nación a destruir Eldia.',
                'temporada_id' => 10, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 3,
                'archivo' => '43episodio1.mp4',
                'titulo' => 'La puerta de la esperanza',
                'fecha_estreno' => '2023-04-07',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Tras regresar a casa, Reiner recuerda su juventud, cuando se entrenó como guerrero para que su madre eldiana y su padre marleyano pudieran vivir juntos. A pesar de las dificultades, el sueño de Reiner mantuvo viva su determinación.',
                'temporada_id' => 10, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 1,
                'archivo' => '41eepisodio1.mp4',
                'titulo' => 'El juicio',
                'fecha_estreno' => '2023-05-05',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Hange y los Jaegerists recuperan el cuerpo de Levi y encuentran a Zeke, quien le explica a Floch que sus heridas fueron tratadas por una chica misteriosa en un lugar místico llamado "Caminos".',
                'temporada_id' => 11, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 2,
                'archivo' => '42eepisodio1.mp4',
                'titulo' => 'Ataque sorpresa',
                'fecha_estreno' => '2023-05-06',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'La División de Reconocimiento decide a regañadientes ayudar a Eren, aunque Mikasa expresa sus dudas sobre los motivos de Eren. Mientras tanto, la batalla de Eren contra Reiner y Pig continúa, con Eren ganando lentamente terreno.',
                'temporada_id' => 11, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 3,
                'archivo' => '43eepisodio1.mp4',
                'titulo' => 'Hermanos',
                'fecha_estreno' => '2023-05-07',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Eren hiere gravemente a Porco más allá de sus capacidades regenerativas, mientras que Colt le ruega a Zeke que no use su grito hasta que Falco esté fuera de su alcance.',
                'temporada_id' => 9, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 4,
                'archivo' => '44eepisodio1.mp4',
                'titulo' => 'Recuerdos del futuro',
                'fecha_estreno' => '2023-05-08',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Usando los Caminos, Zeke le muestra a Eren su vida desde su nacimiento a través de los recuerdos de su padre, Grisha, con la esperanza de convencerlo de que le han lavado el cerebro.',
                'temporada_id' => 11, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 5,
                'archivo' => '45eepisodio1.mp4',
                'titulo' => 'De ti hace dos mil años',
                'fecha_estreno' => '2023-05-09',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Zeke le ordena desesperadamente a Ymir que lleve a cabo el plan de eutanasia. Mientras ella camina hacia la Coordinada, Eren se libera a la fuerza de sus cadenas y se apresura a detenerla. Al hacer contacto se muestran sus recuerdos.',
                'temporada_id' => 11, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 1,
                'archivo' => '5eepisodio1.mp4',
                'titulo' => 'Cruce en la vida nocturna',
                'fecha_estreno' => '2023-01-06',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'En el primer episodio de "Kimetsu no Yaiba", también conocido como "Demon Slayer", conocemos a Tanjiro Kamado, un joven que vive en la montaña con su familia. Tanjiro trabaja duro para mantener a su madre y a sus hermanos después de que su padre falleció. Un día, Tanjiro se ausenta para vender carbón en el pueblo y regresa a casa más tarde de lo previsto, solo para encontrar su hogar devastado por la aparición de un demonio. Descubre que su familia ha sido asesinada, con excepción de su hermana menor, Nezuko, quien ha sido transformada en un demonio.',
                'temporada_id' => 12, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 2,
                'archivo' => '5eepisodio2.mp4',
                'titulo' => 'Un corazon compasivo',
                'fecha_estreno' => '2023-01-07',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Tanjiro lleva a su hermana Nezuko al pueblo más cercano en busca de ayuda y una posible cura para su transformación en demonio. Sin embargo, la aparición de Nezuko como demonio despierta el miedo y la hostilidad de los aldeanos, quienes la consideran una amenaza. Tanjiro defiende a Nezuko y trata de demostrar que ella no es una amenaza para nadie.',
                'temporada_id' => 12, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 3,
                'archivo' => '5eepisodio3.mp4',
                'titulo' => 'Sabiduria del maestro',
                'fecha_estreno' => '2023-01-08',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Tanjiro continúa su entrenamiento con Giyu Tomioka para convertirse en un cazador de demonios. Giyu le enseña a Tanjiro sobre las habilidades necesarias para enfrentarse a los demonios, incluyendo el uso de la Respiración Total Constante, una técnica de respiración especial que aumenta la fuerza y la velocidad del usuario.',
                'temporada_id' => 12, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 4,
                'archivo' => '5eepisodio4.mp4',
                'titulo' => 'Finalmente, un aprendiz',
                'fecha_estreno' => '2023-01-09',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Tanjiro comienza su entrenamiento formal como cazador de demonios bajo la tutela de Sakonji Urokodaki, un antiguo miembro del Cuerpo de Cazadores de Demonios. Sakonji es un maestro habilidoso que entrena a Tanjiro en las artes de la espada y la respiración para que pueda enfrentarse a los demonios con eficacia.',
                'temporada_id' => 12, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 5,
                'archivo' => '5eepisodio5.mp4',
                'titulo' => 'Mi propio estilo de lucha',
                'fecha_estreno' => '2023-01-10',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'Tanjiro continúa su entrenamiento con Sakonji Urokodaki mientras aprende a dominar las técnicas de la Respiración de Agua, una forma avanzada de respiración que aumenta la eficacia en la lucha contra los demonios.',
                'temporada_id' => 12, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 1,
                'archivo' => '6episodio1.mp4',
                'titulo' => 'Full metal alchemist ',
                'fecha_estreno' => '2023-01-07',
                'duracion' =>24, // duración en minutos
                'sinopsis' => ' conocemos a los hermanos Elric, quienes viven en el país de Amestris y están aprendiendo sobre la alquimia bajo la tutela de su madre. Trágicamente, su madre muere y los hermanos deciden usar la alquimia para intentar resucitarla. Sin embargo, su intento falla y como consecuencia, Edward pierde un brazo y una pierna, mientras que Alphonse pierde su cuerpo entero, quedando su alma sellada en una armadura.',
                'temporada_id' => 13, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 2,
                'archivo' =>  '6episodio2.mp4',
                'titulo' => 'La ciudad de Herejes',
                'fecha_estreno' => '2023-01-08',
                'duracion' =>24, // duración en minutos
                'sinopsis' => ' conocemos a los hermanos Elric, quienes viven en el país de Amestris y están aprendiendo sobre la alquimia bajo la tutela de su madre. Trágicamente, su madre muere y los hermanos deciden usar la alquimia para intentar resucitarla. Sin embargo, su intento falla y como consecuencia, Edward pierde un brazo y una pierna, mientras que Alphonse pierde su cuerpo entero, quedando su alma sellada en una armadura.',
                'temporada_id' => 12, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 3,
                'archivo' =>  '6episodio3.mp4',
                'titulo' => 'La piedra de alma',
                'fecha_estreno' => '2023-01-09',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'los hermanos Elric, Edward y Alphonse, llegan a la ciudad de Lior en busca de información sobre la Piedra Filosofal. En su búsqueda, se encuentran con Rose, una joven que ha perdido la fe en los dioses después de la muerte de sus padres durante una guerra civil en la ciudad.',
                'temporada_id' => 12, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 4,
                'archivo' =>  '6episodio4.mp4',
                'titulo' => 'Poder Inexplicable',
                'fecha_estreno' => '2023-01-10',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'los hermanos Elric continúan su búsqueda de la Piedra Filosofal para restaurar sus cuerpos. Llegan a la ciudad de Dublith en busca de información sobre un alquimista conocido como "El Ciego" que podría tener pistas sobre la piedra.',
                'temporada_id' => 12, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 5,
                'archivo' => '6episodio5.mp4',
                'titulo' => 'El alquimista de la mina',
                'fecha_estreno' => '2023-01-11',
                'duracion' =>24, // duración en minutos
                'sinopsis' => 'los hermanos Elric continúan su viaje hacia el este en busca de pistas sobre la Piedra Filosofal. Se detienen en una ciudad minera llamada Youswell, donde se encuentran con un alquimista llamado Yoki.',
                'temporada_id' => 12, // ID de la temporada a la que pertenece el episodio
            ],

            [
                'numero' => 1,
                'archivo' => '7episodio1.mp4',
                'titulo' => 'El nombre del juego',
                'fecha_estreno' => '2023-01-20',
                'duracion' =>56, // duración en minutos
                'sinopsis' => 'En este episodio, somos presentados al mundo en el que se desarrolla la serie, donde los superhéroes son tratados como celebridades y tienen contratos con grandes corporaciones.',
                'temporada_id' => 13, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 2,
                'archivo' => '7episodio2.mp4',
                'titulo' => 'Cherry',
                'fecha_estreno' => '2023-01-21',
                'duracion' =>56, // duración en minutos
                'sinopsis' => 'los miembros de "The Boys" continúan su misión de exponer y detener a los superhéroes corruptos. Mientras tanto, los Siete, el grupo de superhéroes más poderoso y famoso, continúan con sus propias agendas y manipulaciones detrás de escena.',
                'temporada_id' => 13, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 3,
                'archivo' => '7episodio3.mp4',
                'titulo' => 'Conseguir algo',
                'fecha_estreno' => '2023-01-22',
                'duracion' =>56, // duración en minutos
                'sinopsis' => ' continúan su búsqueda para exponer y detener a los superhéroes corruptos, mientras que los miembros de los Siete continúan con sus propias agendas y manipulaciones.',
                'temporada_id' => 13, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 4,
                'archivo' => '7episodio4.mp4',
                'titulo' => 'La hembra de la especie',
                'fecha_estreno' => '2023-01-23',
                'duracion' =>56, // duración en minutos
                'sinopsis' => 'En este episodio, se introduce a un nuevo personaje en la trama: una mujer misteriosa y poderosa conocida como "The Female" ("La Hembra"), cuyo verdadero nombre es Kimiko.',
                'temporada_id' => 13, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 1,
                'archivo' => '8episodio1.mp4',
                'titulo' => 'El que Mónica tiene un compañero de cuarto',
                'fecha_estreno' => '2023-02-20',
                'duracion' =>30, // duración en minutos
                'sinopsis' => 'Rachel Green, una joven que ha dejado plantado a su prometido en el altar, busca refugio en el apartamento de su amiga de la infancia, Mónica Geller.',
                'temporada_id' => 14, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 2,
                'archivo' => '8episodio2.mp4',
                'titulo' => 'El que tiene el sonograma al final',
                'fecha_estreno' => '2023-02-21',
                'duracion' =>56, // duración en minutos
                'sinopsis' => ' Ross se encuentra abrumado por la noticia de que su exesposa, Carol, está embarazada de su hijo. A pesar de sus sentimientos encontrados sobre la situación, Ross decide ser parte activa en la vida del bebé.',
                'temporada_id' => 14, // ID de la temporada a la que pertenece el episodio
            ],
            [
                'numero' => 3,
                'archivo' => '8episodio3.mp4',
                'titulo' => 'El que tiene el pulgar',
                'fecha_estreno' => '2023-02-23',
                'duracion' =>56, // duración en minutos
                'sinopsis' => 'Chandler descubre que su ex novia Janice, conocida por su risa peculiar, todavía tiene una llave de su apartamento y sigue apareciendo inesperadamente. Chandler lucha por encontrar una manera de terminar definitivamente con la relación sin herir los sentimientos de Janice.',
                'temporada_id' => 14, // ID de la temporada a la que pertenece el episodio
            ],



        ];


        foreach ($episodios as $episodio) {
            DB::table('episodios')->insert($episodio);
        }
    }
    }
