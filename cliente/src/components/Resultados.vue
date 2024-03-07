<template>
  <div class="row g-0">
    <div class="col-12 d-flex justify-content-center">
      <h1>Resultados de la busqueda</h1>
    </div>
    <div class="col-12 d-flex align-items-center flex-column">
      <ResultadoItem
        v-if="resultados.length > 0"
        v-for="resultado of resultados"
        :resultado="resultado"
      />
      <p v-else>No es han encontrado resultados, intentelo de nuevo</p>
    </div>
  </div>
</template>
<script setup>
import ResultadoItem from './ResultadoItem.vue'
const { resultados } = defineProps({
  resultados: Array
})
</script>
