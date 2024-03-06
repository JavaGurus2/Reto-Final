<script setup>
import { ref } from 'vue'

const userPhoto = ref(JSON.parse(sessionStorage.getItem('usuario')).imagen)
const nombre = ref(JSON.parse(sessionStorage.getItem('usuario')).name)
const email = ref(JSON.parse(sessionStorage.getItem('usuario')).email)
const contraA = ref('')
const contraN = ref('')
const contraC = ref('')
const aprobado = ref(true)
const nombreError = ref('')
const emailError = ref('')
const contraAError = ref('')
const contraNError = ref('')
const contraCError = ref('')
const success = ref('')

const PROTOCOLO = 'http'
const DIRECCION = 'admin.egiflix.es'

function previewPhoto(event) {
  const file = event.target.files[0]
  if (file) {
    const reader = new FileReader()
    reader.onload = (e) => {
      userPhoto.value = e.target.result
    }
    reader.readAsDataURL(file)
  } else {
    userPhoto.value = null
  }
}

async function actualizarDP() {
  if (validacionesDP()) {
    const response = await fetch(`${PROTOCOLO}://${DIRECCION}/api/perfilDP`, {
      method: 'put',
      headers: {
        Authorization: 'Bearer ' + sessionStorage.getItem('token'),
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        nombre: nombre.value,
        email: email.value,
        imagen: userPhoto.value,
        referencia: JSON.parse(sessionStorage.getItem('usuario')).email
      })
    })

    const data = await response.json()

    if (data.data === 'Actualizado') {
      success.value = 'Datos Personales actualizados con exito.'
      abrirModal()
      sessionStorage.setItem('usuario', JSON.stringify(data.usuario))
    }
  }
}

function validacionesDP() {
  aprobado.value = true

  nombreError.value = validarNombre(nombre.value)
    ? ''
    : 'El nombre solo puede contener caracteres alfanuméricos.'
  if (!validarNombre(nombre.value)) {
    aprobado.value = false
  }

  emailError.value = validarEmail(email.value)
    ? ''
    : 'El correo electrónico no tiene un formato válido.'
  if (!validarEmail(email.value)) {
    aprobado.value = false
  }

  console.log(aprobado.value)

  return aprobado.value
}

function validarNombre(nombre) {
  const patron = new RegExp('^[a-zA-Z0-9]+$')
  return patron.test(nombre)
}

function validarEmail(email) {
  const patron = new RegExp('^[^\\s@]+@[^\\s@]+\\.[^\\s@]+$')
  return patron.test(email)
}

async function actualizarC() {
  if (validacionesC()) {
    const response = await fetch(`${PROTOCOLO}://${DIRECCION}/api/perfilC`, {
      method: 'put',
      headers: {
        Authorization: 'Bearer ' + sessionStorage.getItem('token'),
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        passwordA: contraA.value,
        passwordN: contraN.value,
        referencia: JSON.parse(sessionStorage.getItem('usuario')).email
      })
    })

    const data = await response.json()

    console.log(data.data)

    switch (data.data) {
      case 'Error':
        contraAError.value = 'Error al actualizar, la contraseña actual es incorrecta.'
        break

      case 'Actualizado':
        success.value = 'Contraseña actualizada con exito.'
        abrirModal()
        break
    }

    contraA.value = ''
    contraN.value = ''
    contraC.value = ''

    sessionStorage.setItem('usuario', JSON.stringify(data.usuario))
  }
}

function validacionesC() {
  aprobado.value = true

  contraNError.value = validarContraN(contraN.value)
    ? ''
    : 'La contraseña debe tener mínimo 8 caracteres: Mínimo un número, una mayúscula y una minúscula. Sin caracteres especiales.'
  if (!validarContraN(contraN.value)) {
    aprobado.value = false
  }

  contraCError.value = validarContraC(contraN.value, contraC.value)
    ? ''
    : 'La contraseña nueva debe coincidir con el campo de confirmación.'
  if (!validarContraC(contraN.value, contraC.value)) {
    aprobado.value = false
  }

  console.log(aprobado.value)

  return aprobado.value
}

function validarContraN(contraN) {
  const patron = new RegExp('^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$')
  return patron.test(contraN)
}

function validarContraC(contraN, contraC) {
  return contraN === contraC
}

function abrirModal() {
  $('#miModal').modal('show')
}

function cerrarModal() {
  $('#miModal').modal('hide')
}
</script>

<template>
  <div class="row g-0 p-2 flex-grow-column">
    <div class="col-12 d-flex flex-column justify-content-center">
      <div class="modal" tabindex="-1" role="dialog" id="miModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Actualización</h5>
            </div>
            <div class="modal-body">
              <span class="text-success">{{ success }}</span>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" @click="cerrarModal">Confirmar</button>
            </div>
          </div>
        </div>
      </div>
      <form
        enctype="multipart/form-data"
        @submit.prevent="actualizarDP"
        class="d-flex flex-column align-items-center my-4"
      >
        <div class="d-flex flex-column align-items-center mb-4">
          <img
            class="ImgP mb-3"
            :src="userPhoto || '/src/assets/default_user.jpg'"
            alt="Vista previa"
            style="max-width: 100%; max-height: 200px; margin-top: 10px"
          />
          <label for="imagen" class="form-label">
            <span class="btn btn-primary btn-lg">Cambiar Foto</span>
            <input
              type="file"
              id="imagen"
              class="form-control form-control-lg"
              style="display: none"
              @change="previewPhoto"
            />
          </label>
        </div>
        <div class="form-outline mb-4">
          <input
            type="text"
            id="nombre"
            class="form-control form-control-lg"
            placeholder="Nombre"
            v-model="nombre"
          />
          <span class="text-danger">{{ nombreError }}</span>
        </div>
        <div class="form-outline mb-4">
          <input
            type="email"
            id="email"
            class="form-control form-control-lg"
            placeholder="Correo electronico"
            v-model="email"
          />
          <span class="text-danger">{{ emailError }}</span>
        </div>
        <div class="text-center text-lg-start">
          <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
        </div>
      </form>
      <hr />
      <form
        enctype="multipart/form-data"
        @submit.prevent="actualizarC"
        class="d-flex flex-column align-items-center my-4"
      >
        <div class="form-outline mb-4">
          <input
            type="password"
            id="contraA"
            class="form-control form-control-lg"
            placeholder="Contraseña Actual"
            v-model="contraA"
          />
          <span class="text-danger">{{ contraAError }}</span>
        </div>
        <div class="form-outline mb-4">
          <input
            type="password"
            id="contraN"
            class="form-control form-control-lg"
            placeholder="Contraseña Nueva"
            v-model="contraN"
          />
          <span class="text-danger">{{ contraNError }}</span>
        </div>
        <div class="form-outline mb-4">
          <input
            type="password"
            id="contraC"
            class="form-control form-control-lg"
            placeholder="Confirmación"
            v-model="contraC"
          />
          <span class="text-danger">{{ contraCError }}</span>
        </div>
        <div class="text-center text-lg-start">
          <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</template>

<style>
.ImgP {
  border-radius: 50%; /* Hace que la imagen sea redonda */
  border: solid 1px #ca40d6;
  width: 100px; /* Ancho fijo de 64 píxeles */
  height: 100px; /* Altura fija de 64 píxeles */
  object-fit: cover; /* Ajusta la forma de rellenar el contenedor */
}
</style>
