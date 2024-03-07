<template>
    <!-- Ya estan en el container se supone -->
    <Header tipo-busqueda="hola" />
    <Series />
    <!-- Para separa el footer del contenido -->
    <div class="m-5 p-1"></div>
    <Footer />
  </template>
  
  <script setup>
  import Header from '../components/ui/Header.vue'
  import Series from '../components/CarteleraSeries.vue'
  import Footer from '../components/ui/Footer.vue'
  </script>
