<template>
  <a :href="URL" class="row g-0 text-decoration-none">
    <div class="col-12">
      <div class="card mb-3" style="max-width: 540px">
        <div class="row g-0">
          <div class="col-12 col-sm-4">
            <img
              :src="`data:image/png;base64,${resultado.imagen}`"
              class="img-fluid rounded-start"
              alt="..."
              style="height: auto; object-fit: cover; height: auto; aspect-ratio: 1"
            />
          </div>
          <div class="col-12 col-sm-8">
            <div class="card-body">
              <h5 class="card-title">{{ resultado.titulo || resultado.nombre }}</h5>
              <p class="card-text">{{ resultado.sinopsis }}</p>
              <p class="card-text">
                <small class="text-body-secondary"
                  >Fecha de estreno {{ resultado.fecha_estreno }}</small
                >
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </a>
</template>
<script setup>
const { resultado } = defineProps({
  resultado: Object
})

let URL = 'http://localhost:5173/'
if (resultado.nombre) {
  URL += 'series/' + resultado.id
} else {
  URL += 'peliculas/' + resultado.id
}
</script>
<style scoped>
a {
  transition: all 0.2s ease-in-out;
}
a:hover {
  transform: scale(1.05);
}
</style>
