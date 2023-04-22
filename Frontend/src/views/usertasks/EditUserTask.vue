<script setup>

import useUserTasks from "../../composables/usertasks";
import { onMounted } from "vue";

const { usertask, getUserTask, updateUserTask, errors } = useUserTasks();

const props = defineProps({
    id: {
        required: true,
        type: String
    }
})
onMounted(() => getUserTask(props.id))


</script>

<template>
    <div class="mt-12">
        <form class="max-w-md mx-auto p-4 bg-white shadow-md rounded-md" @submit.prevent="updateUserTask($route.params.id)">
            <div class="space-y-6">

                <div class="mb-6">
                    <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User ID
                    </label>
                    <input type="text" id="user_id" v-model="form.user_id"
                        class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    <div v-if="errors.user_id"> <span class="text-red-500 text-xs italic">{{ errors.user_id[0] }}</span>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="task_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task ID
                    </label>
                    <input type="text" id="task_id" v-model="form.task_id"
                        class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    <div v-if="errors.task_id"> <span class="text-red-500 text-xs italic">{{ errors.task_id[0] }}</span>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="status_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status ID
                    </label>
                    <input type="text" id="status_id" v-model="form.status_id"
                        class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    <div v-if="errors.status_id"> <span class="text-red-500 text-xs italic">{{ errors.status_id[0] }}</span>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="remarks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks
                    </label>
                    <input type="text" id="remarks" v-model="form.remarks"
                        class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <div v-if="errors.remarks"> <span class="text-red-500 text-xs italic">{{ errors.remarks[0] }}</span>
                    </div>
                </div>



                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input datepicker datepicker-format="mm/dd/yyyy" type="text" id="due_date" v-model="form.due_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date">
                    <div v-if="errors.due_date"> <span class="text-red-500 text-xs italic">{{ errors.due_date[0] }}</span>
                    </div>
                </div>


                <div date-rangepicker class="flex items-center">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input name="start_time" type="text" id="start_time" v-model="form.start_time"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select date start">

                        <div v-if="errors.start_time"> <span class="text-red-500 text-xs italic">{{ errors.start_time[0]
                        }}</span>
                        </div>
                    </div>
                    <span class="mx-4 text-gray-500">to</span>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input name="end_time" type="text" id="end_time" v-model="form.end_time"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select date end">
                        <div v-if="errors.end_time"> <span class="text-red-500 text-xs italic">{{ errors.end_time[0]
                        }}</span>
                        </div>
                    </div>
                </div>


                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded">Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>
