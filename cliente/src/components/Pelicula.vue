<script setup>
import { onBeforeMount, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import { ref } from 'vue'
import { usePeliculasStore } from '@/stores/pelicula'
import RepartoItem from './RepartoItem.vue'

const route = useRoute()

//Variables de la pelicula
const pelicula = ref('')
const titulo = ref('')
const duracion = ref('')
const fecha = ref('')
const clasificacion = ref('')
const sinopsis = ref('')
const id = ref('')
const data = ref([])

//Variables de los actores

const PROTOCOLO = 'http'
const DIRECCION = 'admin.egiflix.es'

const peliculasStore = usePeliculasStore()
const actores = ref([])

onBeforeMount(() => {
  id.value = route.params.id
  cargarPelicula()
})

async function cargarPelicula() {
  const response = await fetch(`${PROTOCOLO}://${DIRECCION}/api/buscarPelicula`, {
    method: 'post',
    headers: {
      Authorization: 'Bearer ' + sessionStorage.getItem('token'),
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      id: id.value
    })
  })

  data.value = await response.json()

  actores.value = data.value.actores

  titulo.value = data.value.pelicula.titulo
  peliculasStore.cambiarTitulo(titulo.value)
  sinopsis.value = data.value.pelicula.sinopsis
  fecha.value = data.value.pelicula.fecha_estreno
  duracion.value = data.value.pelicula.duracion
  clasificacion.value = data.value.pelicula.clasificacion
  pelicula.value = 'http://egiflix.es:81/' + data.value.pelicula.archivo.split('/').pop()
}
function descargar() {
  const urlArchivo = pelicula.value
  window.open(urlArchivo, '_blank')
}
</script>

<template>
  <div class="row g-0">
    <video v-if="pelicula" id="miReproductor" width="640" height="360" controls>
      <source :src="pelicula" type="video/mp4" />
      Tu navegador no soporta el tag de video.
    </video>
  </div>
  <div class="col-10 align-self-center mt-3">
    <p>{{ fecha }} - {{ duracion }} - {{ clasificacion }}</p>
    <p>
      {{ sinopsis }}
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
  <a v-if="pelicula" :download="true" :href="pelicula">Descargar</a>
  <button v-if="pelicula" @click="descargar">Descargar tesst</button>
</template>
