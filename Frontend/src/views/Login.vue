<template>
    <div class="min-h-screen bg-gray-100 flex justify-center items-center">
        <div class="w-full max-w-sm">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="handleSubmit">
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" type="email" v-model="email" />
                    <div v-if="errors.email" class="text-red-500 text-xs italic">{{ errors.email }}</div>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2" for="password">
                        Password
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" type="password" v-model="password" />
                    <div v-if="errors.password" class="text-red-500 text-xs italic">{{ errors.password }}</div>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            email: '',
            password: '',
            errors: {},
        }
    },

    methods: {
        handleSubmit() {
            this.errors = {}

            if (!this.email) {
                this.errors.email = 'Email is required'
            }

            if (!this.password) {
                this.errors.password = 'Password is required'
            }

            if (Object.keys(this.errors).length > 0) {
                return
            }

            // Make the login request to your API
            axios.post('http://localhost:8000/api/login', {
                email: this.email,
                password: this.password,
            })

                .then((response) => {
                    // Set the cookie
                    this.$cookies.set('auth_token', response.data.token)

                    // Redirect to the home page
                    this.$router.push('/')
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
                })
        },
    },
}
</script>


