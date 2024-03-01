<script setup>
//
import PeliSerieItem from './PeliSerieItem.vue'
import CategoriaItem from './CategoriaItem.vue'
import { ref, onBeforeMount } from 'vue'

const PROTOCOLO = 'http'
const DIRECCION = 'localhost:8000'

const categorias = ref([])

const filtrado = ref(false)

// Random o categorias seleccionadas

const categoriasPeliSerie = ref([])

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

const novedades = ref([])

const tendencias = ref([])

const miListaStorage = JSON.parse(localStorage.getItem('miLista')) || []

const miLista = ref(miListaStorage)

onBeforeMount(async () => {
  const response = await fetch(`${PROTOCOLO}://${DIRECCION}/api/home`, {
    headers: {
      Authorization: 'Bearer ' + sessionStorage.getItem('token'),
      'Content-Type': 'application/json'
    }
  })
  const data = await response.json()
  categorias.value = data.todasCategorias
  novedades.value = [...data.novedades.peliculas, ...data.novedades.series]
  tendencias.value = [...data.tendencias.peliculas, ...data.tendencias.series]
})
</script>
<template>
  <div class="row p-2 g-0 bg-dark text-white">
    <div class="col-12 p-2">
      <div class="scroll">
        <form class="categorias-container" style="gap: 1em; text-wrap: nowrap">
          <CategoriaItem
            v-if="categorias.length > 0"
            v-for="(categoria, index) in categorias"
            :key="index"
            :categoria="categoria"
            @filtradoCategoria="filtradoCategoria"
          />
          <p v-else>Cargando ...</p>
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
