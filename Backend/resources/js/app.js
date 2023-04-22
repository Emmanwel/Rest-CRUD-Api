import './bootstrap'

import Vue from 'vue'
import VueRouter from 'vue-router'
import Tasks from './components/Tasks.vue'
import TaskIndex from './components/TaskIndex.vue'

import { createApp } from 'vue'

import App from './App.vue'

createApp(App).mount('#app')

Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      component: Tasks,
    },
    {
      path: '/tasks',
      component: Tasks,
    },
    {
      path: '/tuk',
      component: TaskIndex,
    },
  ],
})

const app = new Vue({
  el: '#app',
  router,
})
