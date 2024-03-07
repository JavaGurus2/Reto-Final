<script setup>
//
import PeliSerieItem from './PeliSerieItem.vue'
import CategoriaItem from './CategoriaItem.vue'
import { ref, onBeforeMount } from 'vue'

const PROTOCOLO = 'http'
const DIRECCION = 'admin.egiflix.es'

const categorias = ref([])

const filtrado = ref(false)

// Random o categorias seleccionadas

const categoriasPeliSerie = ref([])

// Funcion para filtrar por categorias
const categoriasFiltradas = ref([])

async function filtradoCategoria(categoria) {
  if (categoria.seleccionado) {
    categoria.peliserie = await buscarContenidoCategoria(categoria.categoria.id)
    categoriasFiltradas.value.push(categoria)
  } else {
    categoriasFiltradas.value = categoriasFiltradas.value.filter((cat) => {
      return cat.categoria.id != categoria.categoria.id
    })
  }
  filtrado.value = true
  if (categoriasFiltradas.value.length == 0) {
    filtrado.value = false
  }
}

async function buscarContenidoCategoria(categoria_id) {
  const response = await fetch(`${PROTOCOLO}://${DIRECCION}/api/home/${categoria_id}`, {
    headers: {
      Authorization: 'Bearer ' + sessionStorage.getItem('token'),
      'Content-Type': 'application/json'
    }
  })
  const data = await response.json()
  return [...data.peliculas, ...data.series]
}

const novedades = ref([])

const tendencias = ref([])

const miLista = ref([])

onBeforeMount(async () => {
  const response = await fetch(
    `${PROTOCOLO}://${DIRECCION}/api/home?user_id=${JSON.parse(sessionStorage.getItem('usuario')).id}`,
    {
      headers: {
        Authorization: 'Bearer ' + sessionStorage.getItem('token'),
        'Content-Type': 'application/json'
      }
    }
  )
  const data = await response.json()
  categorias.value = data.todasCategorias
  novedades.value = [...data.novedades.peliculas, ...data.novedades.series]
  tendencias.value = [...data.tendencias.peliculas, ...data.tendencias.series]
  categoriasPeliSerie.value = [...data.randomCategorias]
  // Juntar las series y las peliculas
  for (let i = 0; i < categoriasPeliSerie.value.length; i++) {
    const elemento = categoriasPeliSerie.value[i]
    elemento.peliserie = [...elemento.peliculas, ...elemento.series]
  }
  // Mi lista
  miLista.value = [...data.milista]
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
      v-if="!filtrado && categoriasFiltradas.length == 0"
      v-for="(elemento, index) in categoriasPeliSerie"
      :key="index"
      class="col-12 mt-2"
    >
      <h2>{{ elemento.categoria.nombre }}</h2>
      <!-- Primero el de las 5 random -->
      <div class="scroll">
        <div class="peliserie-container">
          <PeliSerieItem
            v-for="(item, index) in elemento.peliserie"
            :key="index"
            :peliserie="item"
          />
        </div>
      </div>
    </div>

    <!-- El del filtrado -->
    <div v-else v-for="(elemento, i) in categoriasFiltradas" :key="i" class="col-12 mt-2">
      <h2>{{ elemento.categoria.nombre }}</h2>
      <!-- Primero el de las 5 random -->
      <div class="scroll">
        <div class="peliserie-container">
          <PeliSerieItem
            v-for="(item, index) in elemento.peliserie"
            :key="index"
            :peliserie="item"
          />
        </div>
      </div>
    </div>
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
