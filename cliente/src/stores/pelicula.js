import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const usePeliculasStore = defineStore('peliculas', () => {
  const titulo = ref('')

  function cambiarTitulo(dato) {
    titulo.value = dato
  }

  return { cambiarTitulo, titulo }
})
