import { ref } from 'vue'
import { defineStore } from 'pinia'
const PROTOCOLO = 'http'
const DIRECCION = 'admin.egiflix.es'
export const useBusquedaStore = defineStore('busqueda', () => {
  const resultadoBusqueda = ref([])
  const texto = ref('')
  async function buscar(textoBus) {
    try {
      const response = await fetch(`${PROTOCOLO}://${DIRECCION}/api/buscar?texto=${textoBus}`, {
        headers: {
          Authorization: 'Bearer ' + sessionStorage.getItem('token')
        }
      })
      if (response.ok) {
        const data = await response.json()
        texto.value = textoBus
        resultadoBusqueda.value = [...data.peliculas, ...data.series]
      }
    } catch (error) {
      console.error(error)
    }
  }

  return { resultadoBusqueda, texto, buscar }
})
