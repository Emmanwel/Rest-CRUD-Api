<script setup>

import useTasks from "../../composables/tasks";
import { onMounted } from "vue";

const { tasks, getTasks, deleteTask } = useTasks();
onMounted(() => getTasks());

</script>
<template>
    <div class="mt-12">

        <div class="flex justify-end m-2 p-2">
            <RouterLink :to="{ name: 'CreateTask' }" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded">
                New Task
            </RouterLink>
           
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Due Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for=" task  in  tasks " :key="task.id"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <td class="px-6 py-4">{{ task.name }}
                            </td>
                            <td class="px-6 py-4">{{ task.description }}
                            </td>
                            <td class="px-6 py-4">{{ task.due_date }}
                            </td>
                            <td class="px-6 py-4">{{ task.status_id }} </td>

                            <td class="px-6 py-4 space-x-2">
                                <RouterLink :to="{ name: 'SkillEdit', params: { id: task.id } }"
                                    class="px-4 py-2 bg-green-500 hover:bg-indigo-700 text-white rounded"> Edit
                                </RouterLink>
                                <button @click="deleteTask(task.id)"
                                    class="px-4 py-2 bg-red-500 hover:bg-indigo-700 text-white rounded">Delete
                                </button>

                            </td>

                        </tr>


                    </tbody>
                </table>
            </div>



        </div>
</template>