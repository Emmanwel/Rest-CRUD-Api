<script setup>
import { reactive } from 'vue';
import useSkills from "../../composables/skills";

const { storeSkill, errors } = useSkills();

const form = reactive({
    name: "",
    slug: ""
});

</script>

<template>
    <div class="mt-12">
        <form class="max-w-md mx-auto p-4 bg-white shadow-md rounded-md" @submit.prevent="storeSkill(form)">
            <div class="space-y-6">

                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name
                    </label>
                    <input type="text" id="name" v-model="form.name"
                        class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    <div v-if="errors.name"> <span class="text-red-500 text-xs italic">{{ errors.name[0] }}</span></div>
                </div>
                <div class="mb-6">
                    <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Description </label>
                    <input type="text" id="slug" v-model="form.slug"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <div v-if="errors.slug"> <span class="text-red-500 text-xs italic">{{ errors.slug[0] }}</span></div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded">Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>
