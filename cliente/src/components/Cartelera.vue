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
      <!-- Se supone que siempre habra novedades -->
      <div class="d-grid g-col-md-3">
        <NovedadItem v-for="(novedad, index) in novedades" :key="index" :novedad="novedad" />
      </div>
    </div>
  </div>
</template>
<style>
.g-col-md-3 {
  @media screen and (min-width: 576px) {
    grid-template-columns: repeat(3, 1fr);
  }
}
</style>
