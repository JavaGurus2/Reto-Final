import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
const PROTOCOLO = 'http'
const DIRECCION = 'localhost'
export const useBusquedaStore = defineStore('busqueda', () => {
  const resultadoBusqueda = ref([])
  async function buscar(tipoBusqueda, textoBusqueda) {
    try {
      const response = await fetch(
        `${PROTOCOLO}://${DIRECCION}/api/buscar?tipo=${tipoBusqueda}&titulo=${textoBusqueda}`
      )
      if (response.ok) {
        const data = await response.json()
        resultadoBusqueda.value = data.value
      }
    } catch (error) {
      console.error(error)
    }
  }

  return { resultadoBusqueda, buscar }
})
