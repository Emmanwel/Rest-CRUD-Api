<template>
    <div>
        <h1>Tasks</h1>
        <ul>
            <li v-for="task in tasks" :key="task.id">{{ task.name }}</li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tasks: []
        }
    },
    mounted() {
        axios.get('/api/tasks')
            .then(response => {
                this.tasks = response.data;
            })
            .catch(error => {
                console.log(error);
            });
    }
}
</script>
