<script setup>
const { titulo, sinopsis, duracion } = defineProps({
  titulo: String,
  sinopsis: String,
  duracion: String
})
</script>
<template>
  <div class="card">
    <img src="" class="card-img-top" alt="Portada" />
    <div class="card-body">
      <h5 class="card-title">{{ titulo }}</h5>
      <p class="card-text">
        {{ sinopsis }}
      </p>
      <a :href="`http://localhost/detalles?tipo=`" class="btn btn-primary">Ver o Descargar?</a>
    </div>
  </div>
</template>
