<script setup>
import { ref } from 'vue'
const { tipo, mensaje } = defineProps({
  tipo: String,
  mensaje: String
})
</script>
<template>
  <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">{{ tipo }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">{{ mensaje }}</div>
  </div>
</template>
<style scoped></style>
