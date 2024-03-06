<template>
  <HeaderBuscar @buscado="buscado" />
  <Resultados :resultados="resultados" />
</template>
<script setup>
import HeaderBuscar from '@/components/ui/HeaderBuscar.vue'
import Resultados from '@/components/Resultados.vue'
import { ref } from 'vue'
const resultados = ref([])
function buscado(res) {
  resultados.value = res
  console.log(resultados.value)
}
</script>
