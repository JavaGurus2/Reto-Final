<script setup>
import { onBeforeMount, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
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

onBeforeMount(async () => {
  id.value = route.params.id
  await cargarPelicula()
  await comprobarMiLista()
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
  const router = useRouter()
  if (data.value.messagge) {
    sessionStorage.removeItem('usuario')
    sessionStorage.removeItem('token')
    router.push('/')
  }

  actores.value = data.value.actores

  titulo.value = data.value.pelicula.titulo
  peliculasStore.cambiarTitulo(titulo.value)
  sinopsis.value = data.value.pelicula.sinopsis
  fecha.value = data.value.pelicula.fecha_estreno
  duracion.value = data.value.pelicula.duracion
  clasificacion.value = data.value.pelicula.clasificacion
  pelicula.value = 'http://egiflix.es:81/' + data.value.pelicula.archivo.split('/').pop()
}

// Lo de mi lista
const mensajeMiLista = ref('')
const milistaItem = ref('')
async function comprobarMiLista() {
  try {
    const response = await fetch(
      `${PROTOCOLO}://${DIRECCION}/api/milista?tipo=pelicula&referencia_id=${id.value}&user_id=${JSON.parse(sessionStorage.getItem('usuario')).id}`,
      {
        headers: {
          Authorization: 'Bearer ' + sessionStorage.getItem('token')
        }
      }
    )
    const datos = await response.json()
    if (datos.milistaItem.length > 0) {
      mensajeMiLista.value = 'Quitar de Mi Lista'
      milistaItem.value = datos.milistaItem[0].id
    } else {
      mensajeMiLista.value = 'Añadir a mi lista'
    }
  } catch (error) {
    console.error(error.message)
  }
}

async function cambiarMiLista() {
  await comprobarMiLista()
  let URL = `${PROTOCOLO}://${DIRECCION}/api/milista`
  if (mensajeMiLista.value.includes('Añadir')) {
    try {
      const user_id = JSON.parse(sessionStorage.getItem('usuario')).id
      const response = await fetch(URL, {
        headers: {
          Authorization: 'Bearer ' + sessionStorage.getItem('token'),
          'Content-Type': 'application/json'
        },
        method: 'POST',
        body: JSON.stringify({
          referencia_id: id.value,
          tipo: 'pelicula',
          user_id: user_id
        })
      })
      const datos = await response.json()
      if (datos) {
        mensajeMiLista.value = 'Quitar de Mi Lista'
      }
    } catch (error) {
      console.error(error)
    }
  } else {
    try {
      console.log(id.value)
      const response = await fetch(URL, {
        headers: {
          Authorization: 'Bearer ' + sessionStorage.getItem('token'),
          'Content-Type': 'application/json'
        },
        method: 'DELETE',
        body: JSON.stringify({ id: milistaItem.value })
      })
      const data = await response.json()
      if (data.data == 'borrado') {
        mensajeMiLista.value = 'Añadir a Mi Lista'
      }
    } catch (error) {
      console.error(error)
    }
  }
}

async function guardarDescarga() {
  try {
    const response = await fetch(`${PROTOCOLO}://${DIRECCION}/api/descarga/pelicula`, {
      method: 'post',
      headers: {
        Authorization: 'Bearer ' + sessionStorage.getItem('token'),
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        user_id: JSON.parse(sessionStorage.getItem('usuario')).id,
        pelicula_id: id.value
      })
    })
  } catch (error) {
    console.error(error)
  }
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
    <p>
      Fecha de estreno: {{ fecha }} -Clasificación: {{ clasificacion }} -Duración:
      {{ duracion }} min
    </p>
    <p>
      {{ sinopsis }}
    </p>
    <div class="d-flex justify-content-between align-items-center">
      <button
        v-if="mensajeMiLista"
        :class="`btn mb-2 ${mensajeMiLista.includes('Añadir') ? 'btn-outline-danger' : 'btn-danger '}`"
        @click="cambiarMiLista"
      >
        {{ mensajeMiLista }}
      </button>
      <a
        v-if="pelicula"
        @click="guardarDescarga"
        :download="true"
        :href="pelicula"
        class="btn btn-primary"
        >Descargar</a
      >
    </div>
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
</template>
<style>
.scroll {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

.scroll::-webkit-scrollbar {
  /* display: none; */
  height: 0.5em;
}

.scroll::-webkit-scrollbar-track {
  background: transparent;
}

.scroll::-webkit-scrollbar-thumb {
  background-color: #666;
  border-radius: 0.5em;
}
.scroll::-webkit-scrollbar-thumb:hover,
.scroll::-webkit-scrollbar-thumb:active {
  background-color: #999;
}
.peliserie-container,
.categorias-container {
  display: flex;
  flex-wrap: nowrap;
}

.peliserie-container > * {
  flex: 0 0 auto;
  width: 10%;
  margin-right: 10px;
}
</style>
