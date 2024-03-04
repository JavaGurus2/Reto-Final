<script setup>
const { peliserie } = defineProps({
  peliserie: Object
})
let URL = 'http://localhost:5174/'
if (peliserie.nombre) {
  URL += 'series/' + peliserie.id
} else {
  URL += 'peliculas/' + peliserie.id
}
</script>
<template>
  <a :href="URL" class="card bg-black card-busqueda text-white" style="--bs-bg-opacity: 0.5">
    <img class="card-img-top" :src="`data:image/png;base64,${peliserie.imagen}`" alt="Card image" />
    <div class="card-img-overlay card-busqueda-detalles">
      <h4 class="card-title">{{ peliserie.titulo || peliserie.nombre }}</h4>
      <!-- <a href="#" class="btn btn-primary">Ver o descargar?</a> -->
    </div>
  </a>
</template>
<style scoped>
.card-busqueda {
  position: relative;
  border-radius: 0.5em;
  aspect-ratio: 9 / 16;
  height: auto;
  max-width: 250px;
}
.card-busqueda::after {
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  pointer-events: none;
  background-image: linear-gradient(to top, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.8));
  border-radius: 0.5em;
  z-index: 0;
}
.card-busqueda-detalles {
  z-index: 1;
}

.card-busqueda img {
  aspect-ratio: 9 / 16;
  object-fit: cover;
  width: 100%;
  border-radius: 0.5em;
}
</style>
