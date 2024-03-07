<script setup>
import { onMounted } from 'vue'
import { useRoute } from 'vue-router'
import { ref } from 'vue'
import { usePeliculasStore } from '@/stores/pelicula'
import RepartoItem from './RepartoItem.vue'

const route = useRoute()

//Variable del fetch
const data = ref([])

//Variables de la Serie
const serie = ref('')
const nombreS = ref('')
const fecha = ref('')
const clasificacion = ref('')
const sinopsisS = ref('')
const imagen = ref('')
const id = ref('')

//Variables de las Temporadas
const temporadas = ref([])
const temporadaSeleccionada = ref(1)

//Variables de los Episodios
const episodios = ref([])
const episodio = ref('')
const nombreE = ref('')
const numeroE = ref('')
const duracion = ref('')
const sinopsisE = ref('')

// Para mi lista

const referencia_id = ref('')

const actores = ref([])

const PROTOCOLO = 'http'
const DIRECCION = 'admin.egiflix.es'

const peliculasStore = usePeliculasStore()

onMounted(async () => {
  id.value = route.params.id
  await cargarSerie()
  await comprobarMiLista()
})

async function cargarSerie() {
  const response = await fetch(`${PROTOCOLO}://${DIRECCION}/api/buscarSerie`, {
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

  peliculasStore.cambiarTitulo(data.value.serie.nombre)

  //Valores de la Serie
  nombreS.value = data.value.serie.nombre
  sinopsisS.value = data.value.serie.sinopsis
  fecha.value = data.value.serie.fecha_estreno
  clasificacion.value = data.value.serie.clasificacion
  imagen.value = data.value.serie.imagen

  //Valores de las Temporadas
  temporadas.value = data.value.temporadas

  //Valores de los Episodios
  episodios.value = data.value.episodios

  //Valores de los Actores
  actores.value = data.value.actores

  // Valores mi lista
  referencia_id.value = data.value.serie.id
}

function elegirTemporada(eleccion) {
  temporadaSeleccionada.value = eleccion
}

// Lo de mi lista
const mensajeMiLista = ref('')
const milistaItem = ref('')
async function comprobarMiLista() {
  try {
    const response = await fetch(
      `${PROTOCOLO}://${DIRECCION}/api/milista?tipo=serie&referencia_id=${referencia_id.value}&user_id=${JSON.parse(sessionStorage.getItem('usuario')).id}`,
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
      const response = await fetch(URL, {
        headers: {
          Authorization: 'Bearer ' + sessionStorage.getItem('token'),
          'Content-Type': 'application/json'
        },
        method: 'POST',
        body: JSON.stringify({
          referencia_id: referencia_id.value,
          tipo: 'serie',
          user_id: JSON.parse(sessionStorage.getItem('usuario')).id
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
</script>

<template>
  <div class="row g-0">
    <img
      :src="`data:image/png;base64,${imagen}`"
      alt="Portada de la Serie"
      width="640"
      height="360"
      style="object-fit: cover"
    />
  </div>
  <div class="row g-0 justify-content-center align-items-center">
    <div class="col-10 align-self-center mt-3">
      <p>Fecha de estreno: {{ fecha }} - Clasificación: {{ clasificacion }}</p>
      <p>
        {{ sinopsisS }}
      </p>
      <button
        v-if="mensajeMiLista"
        :class="`btn mb-2 ${mensajeMiLista.includes('Añadir') ? 'btn-outline-danger' : 'btn-danger '}`"
        @click="cambiarMiLista"
      >
        {{ mensajeMiLista }}
      </button>
    </div>
    <div class="col-10 align-self-center d-none d-md-block">
      <h2>Reparto</h2>
      <div class="scroll">
        <div v-if="actores.length > 0" class="peliserie-container mb-4">
          <RepartoItem v-for="(actor, index) in actores" :key="index" :actor="actor" />
        </div>
        <p v-else>No hay actores asociados.</p>
      </div>
    </div>
    <div v-if="temporadas.length > 0" class="col-10 align-self-center dropdown">
      <button
        class="btn btn-secondary dropdown-toggle"
        type="button"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        Temporada {{ temporadaSeleccionada }}
      </button>
      <ul class="dropdown-menu">
        <li v-for="(temporada, index) in temporadas" :key="index">
          <button class="dropdown-item" @click="elegirTemporada(temporada.id)">
            {{ temporada.numero }}. {{ temporada.nombre }}
          </button>
        </li>
      </ul>
    </div>
    <p v-else>No hay temporadas asociadas.</p>

    <div class="col-10 align-self-center mb-4">
      <div v-for="(episodio, index) in episodios" :key="index">
        <div
          v-if="temporadaSeleccionada === episodio.temporada_id"
          class="row g-0 episodio-container"
        >
          <div class="col-12 col-xl-4 episodio-thumbnail">
            <video id="miReproductor" width="100%" height="auto" controls>
              <source
                :src="'http://egiflix.es:81/' + episodio.archivo.split('/').pop()"
                type="video/mp4"
              />
              Tu navegador no soporta el tag de video.
            </video>
          </div>
          <div class="col-8 episodio-info">
            <div class="row g-0">
              <div class="col-6">
                <h3>{{ episodio.numero }}. {{ episodio.nombre }}</h3>
                <p>Duración: {{ episodio.duracion }} min</p>
              </div>

              <div class="col-6 descarga d-flex align-items-center justify-content-end">
                <a
                  :download="true"
                  :href="'http://egiflix.es:81/' + episodio.archivo.split('/').pop()"
                  class="justify-content-center"
                  ><svg
                    width="22"
                    height="28"
                    viewBox="0 0 22 28"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M0.333252 27.3334V24.6667H21.6666V27.3334H0.333252ZM10.9999 22L1.66659 10H6.99992V0.666687H14.9999V10H20.3333L10.9999 22Z"
                      fill="white"
                    />
                  </svg>
                </a>
              </div>
              <div class="sinopsis-container">
                <p class="sinopsis">{{ episodio.sinopsis }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <p
        v-if="
          temporadaSeleccionada &&
          !episodios.some((episodio) => temporadaSeleccionada === episodio.temporada_id)
        "
      >
        No hay episodios asociados.
      </p>
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
  width: 15%;
  margin-right: 10px;
}

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
  overflow: hidden; /* Oculta el contenido que excede el tamaño del contenedor */
}

.sinopsis-container {
  max-height: 4.8em; /* Ajusta según el tamaño de la línea y el número de líneas deseadas */
  overflow: hidden;
}

.sinopsis {
  white-space: normal; /* Permite que la sinopsis se divida en varias líneas */
}
</style>
