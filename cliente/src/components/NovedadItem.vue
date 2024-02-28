<script setup>
const { novedad } = defineProps({
  novedad: Object
})
</script>
<template>
  <div class="card bg-black card-busqueda text-white" style="--bs-bg-opacity: 0.5">
    <img class="card-img-top" src="/src/assets/logo.png" alt="Card image" />
    <div class="card-img-overlay card-busqueda-detalles">
      <h4 class="card-title">{{ novedad.titulo }}</h4>
      <p class="card-text">{{ novedad.sinopsis }}</p>
      <a href="#" class="btn btn-primary">Ver o descargar?</a>
    </div>
  </div>
</template>
<style scoped>
.card-busqueda {
  position: relative;
}
.card-busqueda::after {
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  pointer-events: none;
  background-color: rgba(0, 0, 0, 0.6);
  z-index: 0;
}
.card-busqueda-detalles {
  z-index: 1;
}
</style>
