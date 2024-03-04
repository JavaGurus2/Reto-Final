import { createRouter, createWebHistory } from 'vue-router'
import LoginView from '@/views/LoginView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'login',
      component: LoginView
    },
    {
      path: '/home',
      name: 'home',
      component: () => import('../views/HomeView.vue'),
      meta: { requiresAuth: true }
    },
    {
      path: '/perfil',
      name: 'perfil',
      component: () => import('../views/PerfilView.vue'),
      meta: { requiresAuth: true } // Esta ruta requiere autenticación
    },
    {
      path: '/peliculas/:id',
      name: 'pelicula',
      component: () => import('../views/PeliculaView.vue'),
      meta: { requiresAuth: true } // Esta ruta requiere autenticación
    }
  ]
})

router.beforeEach((to, from, next) => {
  const usuarioAutenticado = sessionStorage.getItem('usuario') && sessionStorage.getItem('token')

  if (to.path === '/' && usuarioAutenticado) {
    next('/home')
  } else if (to.meta.requiresAuth && !usuarioAutenticado) {
    next('/')
  } else {
    next()
  }
})

export default router
