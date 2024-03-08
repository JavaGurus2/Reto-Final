<script setup>
const PROTOCOLO = 'http'
const DIRECCION = 'admin.egiflix.es'
import { ref } from 'vue'
import Notificacion from './Notificacion.vue'
import { useRouter } from 'vue-router'
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
      error.value = false
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

const router = useRouter()
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
    // emit('logueado')
    router.push({ path: '/buscar' })
  }
}
</script>

<template>
  <section class="vh-100 d-flex flex-column justify-content-center">
    <!-- Mirar que solo puede salir una vez -->
    <Notificacion v-if="error" tipo="Error" :mensaje="mensajeError" />
    <div class="container-fluid">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-4 d-flex imagen-container heartbeat">
          <img
            src="/src/assets/logo_egiflix.jfif"
            class="img-fluid imagen-logo rounded-5"
            alt="Sample image"
            id="logo"
          />
          <div class="boton-link">
            <h3><strong>Entra en nuestra página de gestión</strong></h3>
            <a href="http://admin.egiflix.es/login" class="btn btn-primary fs-4" style="width: 50%"
              >Entrar</a
            >
          </div>
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

.imagen-container {
  position: relative;
}

.imagen-logo:hover {
  transition: transform 2s ease;
  transform: rotateY(360deg);
}

.boton-link {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: none;
}

.imagen-logo:hover + .boton-link {
  display: block;
}

.boton-link:hover {
  display: block;
}

h3 {
  color: #00ced1;
}

.heartbeat {
  -webkit-animation: heartbeat s ease-in-out infinite both;
  animation: heartbeat 2s ease-in-out infinite both;
}

@-webkit-keyframes heartbeat {
  from {
    -webkit-transform: scale(1);
    transform: scale(1);
    -webkit-transform-origin: center center;
    transform-origin: center center;
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }

  10% {
    -webkit-transform: scale(0.91);
    transform: scale(0.91);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  17% {
    -webkit-transform: scale(0.98);
    transform: scale(0.98);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }

  33% {
    -webkit-transform: scale(0.87);
    transform: scale(0.87);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  45% {
    -webkit-transform: scale(1);
    transform: scale(1);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }
}

@keyframes heartbeat {
  from {
    -webkit-transform: scale(1);
    transform: scale(1);
    -webkit-transform-origin: center center;
    transform-origin: center center;
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }

  10% {
    -webkit-transform: scale(0.91);
    transform: scale(0.91);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  17% {
    -webkit-transform: scale(0.98);
    transform: scale(0.98);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }

  33% {
    -webkit-transform: scale(0.87);
    transform: scale(0.87);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  45% {
    -webkit-transform: scale(1);
    transform: scale(1);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }
}
</style>
