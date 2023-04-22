<script setup>
import { RouterLink, RouterView } from 'vue-router'

</script>

<template>
  <header>
    <div class="max-w-7xl mx-auto">
      <nav class="p-4 items-center">
        <RouterLink class="px-4 py-2 mr-4 bg-indigo-600 hover:bg-indigo-800 rounded text-white" to="/">Home</RouterLink>
        <RouterLink class="px-4 py-2 mr-4 bg-indigo-600 hover:bg-indigo-800 rounded text-white" to="/tasks">Tasks
        </RouterLink>
        <RouterLink class="px-4 py-2 mr-4 bg-indigo-600 hover:bg-indigo-800 rounded text-white" to="/status">Status
        </RouterLink>
        <RouterLink class="px-4 py-2 mr-4 bg-indigo-600 hover:bg-indigo-800 rounded text-white" to="/user/tasks">User
          UserTasks
        </RouterLink>
        <RouterLink class="justify-end px-4 py-2 mr-4 bg-indigo-600 hover:bg-indigo-800 rounded text-white" to="/login">
          Login
        </RouterLink>


      </nav>
    </div>
  </header>
  <main class="max-w-7xl mx-auto min-h-screen">
    <RouterView />
  </main>
</template>


<!-- <script>
import { mapGetters } from 'vuex'

export default {
  computed: {
    ...mapGetters([
      'isLogged'
    ])
  },

  methods: {
    logout() {
      this.$store.dispatch('logout')
    }
  }
}
</script> -->

