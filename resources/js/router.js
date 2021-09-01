import { createRouter, createWebHashHistory } from 'vue-router'
//import Home from './components/Home.vue'
import Login from '../components/Login.vue'
import Register from '../components/Register.vue'
import Developer from '../components/Developer.vue'
import DeveloperPage from '../components/DeveloperPage.vue'
import Forgot from '../components/Forgot.vue'
import ResetPassword from '../components/ResetPassword.vue'
const routes = [
  {
    path: '/',
    name: 'dev',
    component: DeveloperPage
  },
  {
    path: '/login',
    name: 'Login',
    component: Login
  },
  {
    path: '/register',
    name: 'Register',
    component: Register
  },
  {
    path: '/developer',
    name: 'developer',
    component: Developer
  },
  {
    path: '/list',
    name: 'developerPage',
    component: DeveloperPage
  },
  {
    path: '/forgot',
    name: 'forgot',
    component: Forgot
  },
  {
    path: '/reset',
    name: 'reset',
    component: ResetPassword
  }
]



const router = createRouter({
  history: createWebHashHistory(false),
  mode : 'history',
  routes
})

export default router
