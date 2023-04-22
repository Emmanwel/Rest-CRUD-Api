import { ref } from 'vue'

import { useRouter } from 'vue-router'
import axios from 'axios'

axios.defaults.baseURL = 'http://localhost:8000/api/'

export default function useUserTasks() {
  const usertasks = ref([])
  const usertask = ref([])
  const errors = ref([])
  const router = useRouter()

  const getUserTasks = async () => {
    let res = await axios.get('user/tasks')
    usertasks.value = res.data.data
  }

  const getUserTask = async (id) => {
    let res = await axios.get('user/tasks' + id)
    usertask.value = res.data.data
  }

  const storeUserTask = async () => {
    try {
      await axios.post('user/tasks')
      await router.push({ name: 'UserTaskIndex' })
    } catch (e) {
      if (e.response.status == 422) {
        errors.value = e.res.data.errors
      }
    }
  }

  const updateUserTask = async (id) => {
    try {
      await axios.patch('user/tasks/' + id, usertask.value)
      await router.push({ name: 'UserTaskIndex' })
    } catch (e) {
      if (e.response.status == 422) {
        errors.value = e.res.data.errors
      }
    }
  }

  const destroyUserTask = async (id) => {
    if (!window.confirm('Are you sure?')) {
      return
    }
    await axios.delete('user/tasks/' + id)
    await router.push({ name: 'UserTaskIndex' })
  }

  return {
    usertask,
    usertasks,
    getUserTask,
    errors,
    getUserTasks,
    storeUserTask,
    updateUserTask,
    destroyUserTask,
  }
}
