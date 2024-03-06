<template>
  <header class="row">
    <div class="col-12 d-flex gap-2 p-4 bg-blackl">
      <a href="http://localhost:5173/home">
        <svg
          width="32"
          height="32"
          viewBox="0 0 32 32"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M15.3 24.0333L4.43338 17.1333C4.01116 16.8667 3.80005 16.4889 3.80005 16C3.80005 15.5111 4.01116 15.1333 4.43338 14.8667L15.3 7.96665C15.7445 7.67776 16.1947 7.66132 16.6507 7.91732C17.1067 8.17332 17.3343 8.56754 17.3334 9.09999V14.6667H28C28.3778 14.6667 28.6947 14.7947 28.9507 15.0507C29.2067 15.3067 29.3343 15.6231 29.3334 16C29.3334 16.3778 29.2054 16.6947 28.9494 16.9507C28.6934 17.2067 28.3769 17.3342 28 17.3333H17.3334V22.9C17.3334 23.4333 17.1054 23.828 16.6494 24.084C16.1934 24.34 15.7436 24.3231 15.3 24.0333Z"
            fill="white"
          ></path>
        </svg>
      </a>
      <form action="" class="w-100">
        <input type="text" name="buscar" id="buscar" v-model="text" class="form-control w-100" />
      </form>
    </div>
  </header>
</template>
<script setup>
import { useBusquedaStore } from '../../stores/busqueda'
import { onBeforeMount, onMounted, ref } from 'vue'
const text = ref('')
const emit = defineEmits(['buscado'])
onBeforeMount(async () => {
  const busquedaStore = useBusquedaStore()
  text.value = busquedaStore.texto
  await busquedaStore.buscar(busquedaStore.texto)
  emit('buscado', busquedaStore.resultadoBusqueda)
})
</script>
