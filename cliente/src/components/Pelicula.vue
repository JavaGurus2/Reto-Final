<script setup>
import { onMounted } from 'vue'
import { useRoute } from 'vue-router'
import { ref } from 'vue'
import RepartoItem from './RepartoItem.vue'

const route = useRoute()
const pelicula = ref('')
const img = ref('')
const titulo = ref('')
const duracion = ref('')
const fecha = ref('')
const clasificacion = ref('')
const sinopsis = ref('')
const reparto = ref('')

onMounted(() => {
  const id = route.params.id
})
</script>

<template>
  <div class="row g-0">
    <video id="miReproductor" width="640" height="360" controls>
      <source src="/src/assets/trailer_inazuma.mp4" type="video/mp4" />
      Tu navegador no soporta el tag de video.
    </video>
  </div>
  <div class="col-10 align-self-center mt-3">
    <p>fecha - duracion - clasificacion</p>
    <p>
      En un mundo donde el fútbol y la magia se entrelazan, un equipo de jóvenes talentosos se
      enfrenta a desafíos inimaginables. Cuando un misterioso fenómeno amenaza con sumir al mundo en
      la oscuridad, Mark Evans y sus amigos del equipo Inazuma Eleven deben desplegar sus
      habilidades futbolísticas sobrenaturales para salvar el día. Con jugadas electrizantes,
      amistad inquebrantable y la magia del fútbol en su máxima expresión, este equipo está listo
      para enfrentarse a cualquier adversidad. ¿Podrán superar las fuerzas oscuras y llevar su
      pasión por el fútbol a nuevas alturas? ¡Prepárate para una emocionante aventura donde la magia
      del juego se convierte en la clave para la victoria!
    </p>
  </div>
  <div class="col-10 align-self-center">
    <h2>Reparto</h2>
    <div class="scroll">
      <div v-if="reparto.length > 0" class="peliserie-container">
        <RepartoItem v-for="(actor, index) in reparto" :key="index" :actor="actor" />
      </div>
      <p v-else>No hay actores asociados.</p>
    </div>
  </div>
</template>
