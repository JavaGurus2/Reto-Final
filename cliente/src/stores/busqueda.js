import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
const PROTOCOLO = 'http'
const DIRECCION = 'admin.egiflix.es'
export const useBusquedaStore = defineStore('busqueda', () => {
  const resultadoBusqueda = ref([])
  const textoBusqueda = ref('')
  async function buscar(tipoBusqueda, textoBus) {
    try {
      const response = await fetch(
        `${PROTOCOLO}://${DIRECCION}/api/buscar?tipo=${tipoBusqueda}&titulo=${textoBusqueda}`
      )
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
