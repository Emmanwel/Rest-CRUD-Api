import { ref } from 'vue'

import { useRouter } from 'vue-router'
import axios from 'axios'

axios.default.baseURL = 'http://localhost:8000/api/'

export default function useStatus() {
  const status = ref([])
  const stat = ref([])
  const errors = ref([])
  const router = useRouter()

  const getStatus = async () => {
    let res = await axios.get('status')
    status.value = res.data
  }

  const getStat = async (id) => {
    let res = await axios.get('status' + id)
    stat.value = res.data
  }

  const storeStatus = async () => {
    try {
      await axios.post('status')
      await router.push({ name: 'TaskIndex' })
    } catch (e) {
      if (e.response.status == 422) {
        errors.value = e.res.data.errors
      }
    }
  }

  const updateStatus = async (id) => {
    try {
      await axios.patch('status/' + id, stat.value)
      await router.push({ name: 'TaskIndex' })
    } catch (e) {
      if (e.response.status == 422) {
        errors.value = e.res.data.errors
      }
    }
  }

  const deleteStatus = async (id) => {
    if (!window.confirm('Are you sure?')) {
      return
    }
    await axios.delete('status/' + id)
    await router.push({ name: 'TaskIndex' })
  }

  return {
    stat,
    status,
    getStatus,
    errors,
    getStat,
    storeStatus,
    updateStatus,
    deleteStatus,
  }
}
