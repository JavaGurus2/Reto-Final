<template>
  <!-- Ya estan en el container se supone -->
  <Header tipo-busqueda="hola" />
  <Cartelera />
  <Footer />
</template>

<script setup>
import Header from '../components/ui/Header.vue'
import Cartelera from '../components/Cartelera.vue'
import Footer from '../components/ui/Footer.vue'
</script>
