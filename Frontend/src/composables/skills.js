import { ref } from 'vue'

import { useRouter } from 'vue-router'
import axios from 'axios'

axios.defaults.baseURL = 'http://localhost:8000/api/v1/'

export default function useSkills() {
  const skills = ref([])
  const skill = ref([])
  const errors = ref([])
  const router = useRouter()

  const getSkills = async () => {
    let res = await axios.get('skills')
    skills.value = res.data.data
  }

  const getSkill = async (id) => {
    let res = await axios.get('skills/' + id)
    skill.value = res.data.data
  }

  const storeSkill = async (data) => {
    try {
      await axios.post('skills')
      await router.push({ name: 'SkillIndex' })
    } catch (e) {
      if (e.response.status == 422) {
        errors.value = e.res.data.errors
      }
    }
  }

  const updateSkill = async (id) => {
    try {
      await axios.put('skills/' + id, skill.value)
      await router.push({ name: 'SkillIndex' })
    } catch (e) {
      if (e.response.status == 422) {
        errors.value = e.res.data.errors
      }
    }
  }

  const destroySkill = async (id) => {
    if (!window.confirm('Are you sure?')) {
      return
    }
    await axios.delete('skills/' + id)
    await getSkills()
  }

  return {
    skill,
    skills,
    getSkill,
    errors,
    getSkills,
    storeSkill,
    updateSkill,
    destroySkill,
  }
}
