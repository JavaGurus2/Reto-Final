<script setup>
import { ref, defineEmits, defineProps } from 'vue'

const { categoria } = defineProps({
  categoria: Object
})

const seleccionado = ref(false)

const emit = defineEmits(['filtradoCategoria'])
</script>

<template>
  <label
    :for="categoria.nombre"
    :class="`btn ${seleccionado ? 'btn-primary' : 'btn-outline-primary'}`"
    @click="
      () => {
        seleccionado = !seleccionado // Actualiza el valor de seleccionado
        emit('filtradoCategoria', { id: categoria.id, seleccionado: seleccionado })
      }
    "
    >{{ categoria.nombre }}</label
  >
  <input
    type="checkbox"
    :value="categoria.nombre"
    :id="categoria.nombre"
    class="d-none"
    :checked="seleccionado"
  />
</template>
