require('./bootstrap');

import { createApp } from 'vue';
import AssApp from '../components/App.vue' 
 

import router from './router'
createApp(AssApp).use(router).mount('#app')
  
