<template>
    <div>
        <h1>Products</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="task in tasks" :key="task.id">
                    <td>{{ task.id }}</td>
                    <td>{{ task.name }}</td>
                    <td>{{ task.description }}</td>
                    <td>{{ task.due_date }}</td>
                    <td>
                        <button @click="editProduct(task)">Edit</button>
                        <button @click="deleteProduct(task)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- <form @submit.prevent="saveProduct">
            <label>Name:</label>
            <input type="text" v-model="task.name">
            <label>Description:</label>
            <input type="text" v-model="task.description">
            <label>Price:</label>
            <input type="number" v-model="task.price">
            <button type="submit">{{ isEditMode ? 'Update' : 'Save' }}</button>
        </form> -->
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            tasks: [],
            task: {},
            isEditMode: false
        }
    },
    created() {
        this.fetchProducts();
    },
    methods: {
        fetchProducts() {
            axios.get('/api/tasks')
                .then(response => {
                    this.tasks = response.data;
                });
        },
        saveProduct() {
            if (this.isEditMode) {
                axios.put(`/api/tasks/${this.task.id}`, this.task)
                    .then(response => {
                        this.task = {};
                        this.isEditMode = false;
                        this.fetchProducts();
                    });
            } else {
                axios.post('/api/tasks', this.task)
                    .then(response => {
                        this.task = {};
                        this.fetchProducts();
                    });
            }
        },
        editProduct(task) {
            this.task = Object.assign({}, task);
            this.isEditMode = true;
        },
        deleteProduct(task) {
            if (confirm(`Are you sure you want to delete ${task.name}?`)) {
                axios.delete(`/api/tasks/${task.id}`)
                    .then(response => {
                        this.fetchProducts();
                    });
            }
        }

    }
}
</script>
