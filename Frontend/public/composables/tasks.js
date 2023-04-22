import { ref } from 'vue'

import { useRouter } from 'vue-router'
import axios from 'axios'

axios.defaults.baseURL = 'http://localhost:8000/api/'

export default function useTasks() {
  const tasks = ref([])
  const task = ref([])
  const errors = ref([])
  const router = useRouter()

  const getTasks = async () => {
    let res = await axios.get('tasks')
    tasks.value = res.data
  }

  const getTask = async (id) => {
    let res = await axios.get('tasks' + id)
    task.value = res.data
  }

  const storeTask = async () => {
    try {
      await axios.post('tasks')
      await router.push({ name: 'TaskIndex' })
    } catch (e) {
      if (e.response.status == 422) {
        errors.value = e.res.data.errors
      }
    }
  }

  const updateTask = async (id) => {
    try {
      await axios.patch('tasks/' + id, task.value)
      await router.push({ name: 'TaskIndex' })
    } catch (e) {
      if (e.response.status == 422) {
        errors.value = e.res.data.errors
      }
    }
  }

  const deleteTask = async (id) => {
    if (!window.confirm('Are you sure?')) {
      return
    }
    await axios.delete('tasks/' + id)
    await router.push({ name: 'TaskIndex' })
  }

  return {
    task,
    tasks,
    getTask,
    errors,
    getTasks,
    storeTask,
    updateTask,
    deleteTask,
  }
}
