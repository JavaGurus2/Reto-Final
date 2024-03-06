<template>
  <div class="row p-2 g-0 text-white bg-dark" id="header">
    <div class="col-12 d-flex gap-2 align-items-center">
      <!-- Logo -->
      <div class="d-flex gap-2 align-items-center">
        <img
          src="/src/assets/logo_egiflix.jfif"
          class="rounded-circle"
          alt="Egiflix"
          height="80"
          witdh="80"
        />
        <span class="d-none d-md-block fs-1">Egiflix</span>
      </div>
      <form class="w-100" @submit.prevent="buscar">
        <div class="input-group bg-secondary-subtle rounded-2">
          <input
            type="text"
            class="form-control border-0 bg-secondary-subtle"
            :placeholder="'Buscar ' + tipoBusqueda"
            v-model="textoBusqueda"
          />
          <span class="input-group-text bg-transparent border-0">
            <svg
              width="32"
              height="32"
              viewBox="0 0 32 32"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <g clip-path="url(#clip0_13_291)">
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M14 5.33334C11.7015 5.33334 9.49706 6.24643 7.87175 7.87174C6.24643 9.49706 5.33334 11.7015 5.33334 14C5.33334 16.2985 6.24643 18.5029 7.87175 20.1283C9.49706 21.7536 11.7015 22.6667 14 22.6667C16.2985 22.6667 18.5029 21.7536 20.1283 20.1283C21.7536 18.5029 22.6667 16.2985 22.6667 14C22.6667 11.7015 21.7536 9.49706 20.1283 7.87174C18.5029 6.24643 16.2985 5.33334 14 5.33334ZM2.66667 14C2.66683 12.1928 3.09916 10.4118 3.9276 8.80568C4.75604 7.19953 5.95656 5.81479 7.42901 4.76698C8.90146 3.71917 10.6031 3.03868 12.3921 2.78228C14.181 2.52588 16.0053 2.701 17.7128 3.29304C19.4203 3.88508 20.9614 4.87686 22.2076 6.18565C23.4539 7.49444 24.369 9.08228 24.8768 10.8167C25.3846 12.5511 25.4702 14.3818 25.1266 16.156C24.7829 17.9303 24.02 19.5966 22.9013 21.016L27.7707 25.8853C28.0135 26.1368 28.1479 26.4736 28.1449 26.8232C28.1419 27.1728 28.0016 27.5072 27.7544 27.7544C27.5072 28.0016 27.1728 28.1419 26.8232 28.1449C26.4736 28.1479 26.1368 28.0135 25.8853 27.7707L21.016 22.9013C19.3448 24.2187 17.3365 25.0389 15.221 25.2681C13.1054 25.4974 10.968 25.1264 9.05346 24.1976C7.13889 23.2689 5.52448 21.8198 4.39498 20.0164C3.26548 18.213 2.66653 16.128 2.66667 14ZM12.6667 9.33334C12.6667 8.97971 12.8071 8.64058 13.0572 8.39053C13.3072 8.14048 13.6464 8 14 8C15.5913 8 17.1174 8.63214 18.2426 9.75736C19.3679 10.8826 20 12.4087 20 14C20 14.3536 19.8595 14.6928 19.6095 14.9428C19.3594 15.1929 19.0203 15.3333 18.6667 15.3333C18.3131 15.3333 17.9739 15.1929 17.7239 14.9428C17.4738 14.6928 17.3333 14.3536 17.3333 14C17.3333 13.1159 16.9821 12.2681 16.357 11.643C15.7319 11.0179 14.8841 10.6667 14 10.6667C13.6464 10.6667 13.3072 10.5262 13.0572 10.2761C12.8071 10.0261 12.6667 9.68696 12.6667 9.33334Z"
                  fill="white"
                />
              </g>
              <defs>
                <clipPath id="clip0_13_291">
                  <rect width="32" height="32" fill="white" />
                </clipPath>
              </defs>
            </svg>
          </span>
        </div>
      </form>
    </div>
  </div>
</template>
<script setup>
import { camelize, ref, watch } from 'vue'
import { useBusquedaStore } from '../../stores/busqueda'
import { useRouter } from 'vue-router'
const { tipoBusqueda } = defineProps({
  tipoBusqueda: String
})

const { buscar } = useBusquedaStore()

const textoBusqueda = ref('')

let timerId = null

const router = useRouter()
watch(textoBusqueda, async (nueva, anterior) => {
  if (timerId) {
    clearTimeout(timerId)
  }
  timerId = setTimeout(async () => {
    await buscar(textoBusqueda.value)
    router.push({ path: '/buscar' })
  }, 1000)
})
</script>
