<script setup>
const { actor } = defineProps({
  actor: Object
})
</script>
<template>
  <div class="card bg-black card-busqueda text-white" style="--bs-bg-opacity: 0.5">
    <img class="card-img-top" :src="`data:image/png;base64,${actor.imagen}`" alt="Card image" />
    <div class="card-img-overlay card-busqueda-detalles">
      <h4 class="card-title">{{ actor.nombre }} {{ actor.apellido }}</h4>
    </div>
  </div>
</template>
<style scoped>
.card-busqueda {
  position: relative;
  border-radius: 0.5em;
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
