<script setup>
import { onMounted } from 'vue'
import { useRoute } from 'vue-router'
import { ref } from 'vue'
import { usePeliculasStore } from '@/stores/pelicula'
import RepartoItem from './RepartoItem.vue'

const route = useRoute()

//Variable del fetch
const data = ref([])

//Variables de la pelicula
const serie = ref('')
const nombreS = ref('')
const fecha = ref('')
const clasificacion = ref('')
const sinopsisS = ref('')
const id = ref('')

//Variables de las Temporadas
const temporadas = ref([])
const temporada = ref('')
const numeroT = ref('')
const nombreT = ref('')

//Variables de los Episodios
const episodios = ref([])
const episodio = ref('')
const nombreE = ref('')
const numeroE = ref('')
const duracion = ref('')
const sinopsisE = ref('')


const PROTOCOLO = 'http'
const DIRECCION = 'localhost:8000'

const peliculasStore = usePeliculasStore()


onMounted(() => {
  id.value = route.params.id
  cargarSerie()
})

async function cargarSerie() {
  const response = await fetch(`${PROTOCOLO}://${DIRECCION}/api/buscarSerie`, {
    method: 'put',
    headers: {
      Authorization: 'Bearer ' + sessionStorage.getItem('token'),
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      id: id.value
    })
  })

  data.value = await response.json()

//   peliculasStore.cambiarTitulo(titulo.value)

  //Valores de la Serie
  nombreS.value = data.value.series.nombre
  sinopsisS.value = data.value.series.sinopsis
  fecha.value = data.value.series.fecha_estreno
  clasificacion.value = data.value.series.clasificacion
  imagen.value = data.value.series.imagen

  //Valores de las Temporadas
  temporadas.value = data.value.temporadas

  //Valores de los Actores
  actores.value = data.value.actores

  //Valores de los Episodios
  episodios.value = temporadas.value.episodios

}

function elegirTemporada(eleccion) {
    temporada.value = eleccion
}

</script>

<template>
  <div class="row g-0">
    <img :src="imagen" alt="Portada de la Serie">
  </div>
  <div class="col-10 align-self-center mt-3">
    <p>{{ fecha }} - {{ clasificacion }}</p>
    <p>
      {{ sinopsisS }}
    </p>
  </div>
  <div class="col-10 align-self-center">
    <h2>Reparto</h2>
    <div class="scroll">
      <div v-if="actores.length > 0" class="peliserie-container">
        <RepartoItem v-for="(actor, index) in actores" :key="index" :actor="actor" />
      </div>
      <p v-else>No hay actores asociados.</p>
    </div>
  </div>
  <div v-if="temporadas.length > 0" class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Temporadas
  </button>
  <ul class="dropdown-menu">
    <li v-for="(temporada, index) in temporadas" :key="index">
        <button class="dropdown-item" @click="elegirTemporada(template.numero)">{{ temporada.numero }} - {{ temporada.nombre }}</button>
    </li>
  </ul>
</div>
<p v-else>No hay temporadas asociadas.</p>
<div>
    <div v-for="(episodio, index) in episodios" :key="index" class="episodio-container">
      <div class="episodio-thumbnail">
        <video id="miReproductor" width="640" height="360" controls>
            <source src="http://killercervezas.blog:81/video.mp4" type="video/mp4" />
            Tu navegador no soporta el tag de video.
        </video>
      </div>
      <div class="episodio-info">
        <h3>{{ episodio.numeroE }}. {{ episodio.nombreE }}</h3>
        <p>{{ episodio.duracion }}</p>
        <p>{{ episodio.sinopsisE }}</p>
      </div>
    </div>
  </div>
</template>
<style>
  .episodio-container {
    display: flex;
    border-bottom: 1px solid #ddd; /* Línea separadora entre episodios */
    padding: 20px;
  }

  .episodio-thumbnail {
    /* Estilos para la imagen del episodio (si la tienes) */
    margin-right: 20px;
  }

  .episodio-info {
    flex: 1;
  }
</style>