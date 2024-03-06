import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
const PROTOCOLO = 'http'
const DIRECCION = 'admin.egiflix.es'
export const useBusquedaStore = defineStore('busqueda', () => {
  const resultadoBusqueda = ref([])
  const textoBusqueda = ref('')
  async function buscar(textoBus) {
    try {
      const response = await fetch(`${PROTOCOLO}://${DIRECCION}/api/buscar?texto=${textoBus}`)
      if (response.ok) {
        const data = await response.json()
        resultadoBusqueda.value = data.value
        textoBusqueda.value = textoBus
      }
    } catch (error) {
      console.error(error)
    }
  }

  return { resultadoBusqueda, buscar }
})
