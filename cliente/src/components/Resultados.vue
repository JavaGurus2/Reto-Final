<template>
  <ul>
    <li v-for="resultado of resultados">{{ resultado.titulo || resultado.nombre }}</li>
  </ul>
</template>
<script setup>
const { resultados } = defineProps({
  resultados: Array
})
</script>
