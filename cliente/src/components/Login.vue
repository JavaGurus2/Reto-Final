<script setup>
const PROTOCOLO = 'http'
const DIRECCION = '127.0.0.1:8000'
import { ref } from 'vue'
import Notificacion from './Notificacion.vue'
const email = ref('')

const password = ref('')

const error = ref(false)

const mensajeError = ref('')

const emit = defineEmits(['logueado'])

function mostrarError(mensaje) {
  error.value = true
  console.log('Hola' + error.value)
  mensajeError.value = mensaje
}

async function loginApi() {
  try {
    const formData = new FormData()
    formData.append('email', email.value)
    formData.append('password', password.value)
    console.log(formData.getAll('email'))
    const response = await fetch(`${PROTOCOLO}://${DIRECCION}/api/login`, {
      method: 'POST',
      body: formData
    })

    if (response.ok) {
      const data = await response.json()
      console.log(data)
      sessionStorage.setItem('usuario', JSON.stringify(data.usuario))
      sessionStorage.setItem('token', data.token)
    } else {
      throw new Error(
        'Ha ocurrido un error mientras se realizaba la peticion, intentelo de nuevo mas tarde'
      )
    }
  } catch (e) {
    // No se que hacer con el error de momento
    mostrarError(e.message)
  }
}
async function validarLogin() {
  if (email.value.length == 0) {
    mostrarError('El email no puede ser nulo')
  }
  if (password.value.length == 0) {
    mostrarError('La contraseña no puede ser nula')
  }
  await loginApi()
  if (!error.value) {
    // Supuesto usuario recibido de la api
    emit('logueado')
  }
}
</script>

<template>
  <section class="vh-100 d-flex flex-column justify-content-center">
    <!-- Mirar que solo puede salir una vez -->
    <Notificacion v-if="error" tipo="Error" :mensaje="mensajeError" />
    <div class="container-fluid">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-4 d-flex">
          <img src="/src/assets/logo.png" class="img-fluid" alt="Sample image" id="logo" />
        </div>
        <div class="col-lg-8">
          <form @submit.prevent="validarLogin">
            <div class="form-outline mb-4">
              <input
                type="email"
                id="email"
                class="form-control form-control-lg"
                placeholder="Correo electronico"
                v-model="email"
              />
            </div>

            <div class="form-outline mb-3">
              <input
                type="password"
                id="password"
                class="form-control form-control-lg"
                placeholder="Contraseña"
                v-model="password"
              />
            </div>

            <div class="d-flex justify-content-between align-items-center">
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="recuerdame" />
                <label class="form-check-label" for="recuerdame"> Recuerdame </label>
              </div>
              <a href="#!" class="text-body">¿Has olvidado la contraseña?</a>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div
      class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 bg-primary fixed-bottom"
    >
      <div class="text-white mb-3 mb-md-0">Copyright © 2024. Egibide</div>

      <div>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="#!" class="text-white">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </div>
    </div>
  </section>
</template>

<style scoped>
#logo {
  @media screen and (max-width: 990px) {
    width: 400px;
    margin: 0 auto;
    margin-bottom: 1rem;
  }
}
</style>
