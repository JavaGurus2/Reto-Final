<script setup>
//
import NovedadItem from './NovedadItem.vue'
import { ref } from 'vue'
const novedades = ref([
  {
    titulo: 'Titulo 1',
    sinopsis: 'lorem kasdijf dasfhaksjdhf asdkjfaksd fjkasdhf as dfkjasdfjkajkfahjfjk '
  },
  {
    titulo: 'Titulo 1',
    sinopsis: 'lorem kasdijf dasfhaksjdhf asdkjfaksd fjkasdhf as dfkjasdfjkajkfahjfjk '
  },
  {
    titulo: 'Titulo 1',
    sinopsis: 'lorem kasdijf dasfhaksjdhf asdkjfaksd fjkasdhf as dfkjasdfjkajkfahjfjk '
  },
  {
    titulo: 'Titulo 1',
    sinopsis: 'lorem kasdijf dasfhaksjdhf asdkjfaksd fjkasdhf as dfkjasdfjkajkfahjfjk '
  }
])
</script>
<template>
  <div class="row p-2 g-0 bg-dark text-white">
    <!-- Novedades -->
    <div class="col-12">
      <h2>Novedades</h2>
      <!-- Se supone que siempre habrá novedades -->
      <div class="scroll">
        <div class="novedades-container">
          <NovedadItem v-for="(novedad, index) in novedades" :key="index" :novedad="novedad" />
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.scroll {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch; /* Añadir desplazamiento suave para dispositivos iOS */
}

/* Ocultar el scroll en navegadores basados en WebKit */
.scroll::-webkit-scrollbar {
  display: none;
}

.novedades-container {
  display: flex;
  flex-wrap: nowrap; /* Para que los elementos no se desplacen a una nueva línea */
}

/* Ajusta el tamaño de cada elemento según tus necesidades */
.novedades-container > * {
  flex: 0 0 auto;
  width: 33.33%; /* Para que cada elemento ocupe 1/3 del contenedor */
  margin-right: 10px; /* Espacio entre cada elemento */
}
</style>
