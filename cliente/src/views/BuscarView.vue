<template>
  <HeaderBuscar @buscado="buscado" />
  <Resultados v-if="resultados" :resultados="resultados" />
  <p v-else>Cargando...</p>
</template>
<script setup>
import HeaderBuscar from '@/components/ui/HeaderBuscar.vue'
import Resultados from '@/components/Resultados.vue'
import { ref } from 'vue'
const resultados = ref()
function buscado(res) {
  resultados.value = res
  console.log(resultados.value)
}
</script>
