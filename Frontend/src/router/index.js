import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    // {
    //   path: '/skills',
    //   name: 'SkillIndex',
    //   // route level code-splitting
    //   // this generates a separate chunk (About.[hash].js) for this route
    //   // which is lazy-loaded when the route is visited.
    //   component: () => import('../views/skills/SkillIndex.vue'),
    // },
    // {
    //   path: '/skills/create',
    //   name: 'SkillCreate',
    //   component: () => import('../views/skills/SkillCreate.vue'),
    // },
    // {
    //   path: '/skills/edit',
    //   name: 'SkillEdit',
    //   component: () => import('../views/skills/SkillEdit.vue'),
    //   props: true,
    // },
    {
      path: '/tasks',
      name: 'TaskIndex',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/tasks/TaskIndex.vue'),
    },
    {
      path: '/tasks/create',
      name: 'CreateTask',
      component: () => import('../views/tasks/CreateTask.vue'),
    },
    {
      path: '/tasks/edit',
      name: 'EditTask',
      component: () => import('../views/tasks/EditTask.vue'),
    },
    {
      path: '/status',
      name: 'StatusIndex',
      component: () => import('../views/status/StatusIndex.vue'),
    },
    {
      path: '/status/create',
      name: 'CreateStatus',
      component: () => import('../views/status/CreateStatus.vue'),
    },
    {
      path: '/status/edit',
      name: 'EditStatus',
      component: () => import('../views/status/EditStatus.vue'),
    },
    {
      path: '/user/tasks',
      name: 'UserTaskIndex',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/usertasks/UserTaskIndex.vue'),
    },
    {
      path: '/user/tasks/create',
      name: 'CreateUserTask',
      component: () => import('../views/usertasks/CreateUserTask.vue'),
    },
    {
      path: '/user/tasks/edit',
      name: 'EditUserTask',
      component: () => import('../views/usertasks/EditUserTask.vue'),
    },
    {
      path: '/login',
      name: 'Login',
      component: () => import('../views/Login.vue'),
    },
  ],
})

export default router
