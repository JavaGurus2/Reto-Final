<script setup>
//
import PeliSerieItem from './PeliSerieItem.vue'
import CategoriaItem from './CategoriaItem.vue'
import { ref } from 'vue'

const categorias = ref([
  { id: 1, nombre: 'Categoria 1' },
  { id: 2, nombre: 'Categoria 2' },
  { id: 3, nombre: 'Categoria 3' },
  { id: 4, nombre: 'Categoria 4' },
  { id: 5, nombre: 'Categoria 5' },
  { id: 6, nombre: 'Categoria 6' },
  { id: 7, nombre: 'Categoria 7' },
  { id: 8, nombre: 'Categoria 8' }
])

const filtrado = ref(false)

// Random o categorias seleccionadas

const categoriasPeliSerie = ref([
  {
    id: 1,
    nombre: 'Categoria 1',
    peliculas_series: [
      {
        titulo: 'El Señor de los Anillos',
        sinopsis:
          'Un joven hobbit llamado Frodo Bolsón debe embarcarse en un viaje para destruir un poderoso anillo y salvar a la Tierra Media de la oscuridad.'
      }
    ]
  },
  {
    id: 2,
    nombre: 'Categoria 2',
    peliculas_series: [
      {
        titulo: 'Breaking Bad',
        sinopsis:
          'Un profesor de química de secundaria, Walter White, se convierte en un fabricante de metanfetamina después de ser diagnosticado con cáncer terminal. Con la ayuda de un exalumno, Jesse Pinkman, Walter se sumerge en el mundo peligroso del narcotráfico.'
      }
    ]
  },
  {
    id: 3,
    nombre: 'Categoria 3',
    peliculas_series: [
      {
        titulo: 'Stranger Things',
        sinopsis:
          'En la década de 1980 en Hawkins, Indiana, un grupo de niños se enfrenta a fuerzas sobrenaturales y al gobierno mientras buscan a su amigo desaparecido y encuentran a una niña con habilidades telequinéticas.'
      }
    ]
  },
  {
    id: 4,
    nombre: 'Categoria 4',
    peliculas_series: [
      {
        titulo: 'The Mandalorian',
        sinopsis:
          'Un pistolero solitario, conocido simplemente como el Mandaloriano, se embarca en una peligrosa misión en los confines exteriores de la galaxia, lejos de la autoridad de la Nueva República.'
      }
    ]
  }
])

// Funcion para filtrar por categorias
const categoriasFiltradas = ref([1])

async function filtradoCategoria(categoria) {
  console.log(categoria)
  if (!categoria.seleccionado) {
    console.log('no selec')
    categoriasPeliSerie.value = categoriasPeliSerie.value.filter((categoriaPeliSerie) => {
      return categoriaPeliSerie.id == categoria.id
    })
  } else {
    // Si selec
    console.log('Si selec')
  }
  console.log(categoriasPeliSerie.value)
  filtrado.value = true
}

const novedades = ref([
  {
    titulo: 'Titulo 1',
    sinopsis: 'lorem kasdijf dasfhaksjdhf asdkjfaksd fjkasdhf as dfkjasdfjkajkfahjfjk '
  },
  {
    titulo: 'Titulo 1',
    sinopsis: 'lorem kasdijf dasfhaksjdhf asdkjfaksd fjkasdhf as dfkjasdfjkajkfahjfjk '
  },
  {
    titulo: 'Titulo 1',
    sinopsis: 'lorem kasdijf dasfhaksjdhf asdkjfaksd fjkasdhf as dfkjasdfjkajkfahjfjk '
  },
  {
    titulo: 'Titulo 1',
    sinopsis: 'lorem kasdijf dasfhaksjdhf asdkjfaksd fjkasdhf as dfkjasdfjkajkfahjfjk '
  }
])

const tendencias = ref([
  {
    titulo: 'Titulo 1',
    sinopsis: 'lorem kasdijf dasfhaksjdhf asdkjfaksd fjkasdhf as dfkjasdfjkajkfahjfjk '
  },
  {
    titulo: 'Titulo 1',
    sinopsis: 'lorem kasdijf dasfhaksjdhf asdkjfaksd fjkasdhf as dfkjasdfjkajkfahjfjk '
  },
  {
    titulo: 'Titulo 1',
    sinopsis: 'lorem kasdijf dasfhaksjdhf asdkjfaksd fjkasdhf as dfkjasdfjkajkfahjfjk '
  },
  {
    titulo: 'Titulo 1',
    sinopsis: 'lorem kasdijf dasfhaksjdhf asdkjfaksd fjkasdhf as dfkjasdfjkajkfahjfjk '
  }
])

const miListaStorage = JSON.parse(localStorage.getItem('miLista')) || []

const miLista = ref(miListaStorage)
</script>
<template>
  <div class="row p-2 g-0 bg-dark text-white">
    <div class="col-12 p-2">
      <div class="scroll">
        <form class="categorias-container" style="gap: 1em; text-wrap: nowrap">
          <CategoriaItem
            v-for="(categoria, index) in categorias"
            :key="index"
            :categoria="categoria"
            @filtradoCategoria="filtradoCategoria"
          />
        </form>
      </div>
    </div>
    <!-- Novedades -->
    <div class="col-12">
      <h2>Novedades</h2>
      <!-- Se supone que siempre habrá novedades -->
      <div class="scroll">
        <div class="peliserie-container">
          <PeliSerieItem v-for="(novedad, index) in novedades" :key="index" :peliserie="novedad" />
        </div>
      </div>
    </div>
    <!-- Tendencias -->
    <div class="col-12 mt-2">
      <h2>Tendencias</h2>
      <div class="scroll">
        <div class="peliserie-container">
          <PeliSerieItem
            v-for="(tendencia, index) in tendencias"
            :key="index"
            :peliserie="tendencia"
          />
        </div>
      </div>
    </div>
    <!-- Mi lista -->
    <div class="col-12 mt-2">
      <h2>Mi lista</h2>
      <div class="scroll">
        <div v-if="miLista.length > 0" class="peliserie-container">
          <PeliSerieItem v-for="(elemento, index) in miLista" :key="index" :peliserie="elemento" />
        </div>
        <p v-else>No hay elementos en Mi Lista</p>
      </div>
    </div>
    <hr />
    <!-- Random o categorias seleccionadas -->
    <div
      v-if="!filtrado"
      v-for="(elemento, index) in categoriasPeliSerie"
      :key="index"
      class="col-12 mt-2"
    >
      <h2>{{ elemento.nombre }}</h2>
      <!-- Primero el de las 5 random -->
      <div class="scroll">
        <div class="peliserie-container">
          <PeliSerieItem
            v-for="(item, index) in elemento.peliculas_series"
            :key="index"
            :peliserie="item"
            @filtradoCategoria="filtradoCategoria"
          />
        </div>
      </div>
    </div>

    <!-- El del filtrado -->
    <!-- <div v-else class="col-12 mt-2">
      <h2>{{ categoriasPeliSerie[0].nombre }}</h2>
      <div class="scroll">
        <div class="peliserie-container">
          <PeliSerieItem
            v-for="(elemento, index) in categoriasPeliSerie[0].peliculas_series"
            :key="index"
            :peliserie="elemento"
            @filtradoCategoria="filtradoCategoria"
          />
        </div>
      </div>
    </div> -->
  </div>
</template>

<style>
.scroll {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

.scroll::-webkit-scrollbar {
  display: none;
}

.peliserie-container,
.categorias-container {
  display: flex;
  flex-wrap: nowrap;
}

.peliserie-container > * {
  flex: 0 0 auto;
  width: 33.33%;
  margin-right: 10px;
}
</style>
