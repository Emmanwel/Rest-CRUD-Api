<script setup>

import useUserTasks from "../../composables/usertasks";
import { onMounted } from "vue";

const { user_tasks, getUserTasks, destroyUserTask } = useUserTasks();
onMounted(() => getUserTasks());

</script>
<template>
    <div class="mt-12">
        <div class="flex justify-end m-2 p-2">

            <RouterLink :to="{ name: 'CreateUserTask' }"
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded">
                New User Task
            </RouterLink>
        </div>
        <div class="relative overflow-x-auto">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            User ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Task ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Remarks
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Due Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Start Time </th>
                        <th scope="col" class="px-6 py-3">
                            End Time </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for=" usertask  in  user_tasks " :key="usertask.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <td class="px-6 py-4">{{ usertask.user_id }}
                        </td>
                        <td class="px-6 py-4">{{ usertask.task_id }}
                        </td>
                        <td class="px-6 py-4">{{ usertask.status_id }}</td>
                        <td class="px-6 py-4">{{ usertask.remarks }} </td>
                        <td class="px-6 py-4">{{ usertask.due_date }} </td>
                        <td class="px-6 py-4">{{ usertask.start_time }} </td>
                        <td class="px-6 py-4">{{ usertask.end_time }} </td>

                        <td class="px-6 py-4 space-x-2">
                            <RouterLink :to="{ name: 'UserTaskEdit', params: { id: usertask.id } }"
                                class="px-4 py-2 bg-green-500 hover:bg-indigo-700 text-white rounded"> Edit
                            </RouterLink>
                            <button @click="destroyUserTask(usertask.id)"
                                class="px-4 py-2 bg-red-500 hover:bg-indigo-700 text-white rounded">Delete
                            </button>

                        </td>

                    </tr>


                </tbody>
            </table>
        </div>



    </div>
</template>