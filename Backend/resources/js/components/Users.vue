<template>
    <div class="container p-5">

        <button type="button" class="btn btn-primary mb-4 float-right" data-toggle="modal" data-target="#myModal"
            @click="formReset">New User </button>

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title text-muted">Add New User </h5>
                        <button type="button" class="close close_modal" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="text-sm text-danger" if="errors != ''">
                            <p v-for="error in errors" class="mb-0" :key="error"><small>{{ error }} </small></p>
                        </div>

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" v-model="form.name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" v-model="form.email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" v-model="form.password">
                        </div>

                        <button v-if="user_id == ''" type="button" class="btn btn-primary"
                            @click="storeUser">Submit</button>

                        <button v-else type="button" class="btn btn-primary" @click="updateUser">Update</button>

                    </div>
                </div>
            </div>
        </div>



        <table class="table table-bordered table-hover">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </thead>

            <tbody>
                <template v-for="user in users" :key="user.id">
                    <tr>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.password }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal"
                                @click="editUser(user)">Edit</button>
                            <button type="button" class="btn btn-sm btn-danger ml-2"
                                @click="deleteUser(user.id)">Delete</button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>
<script>
import { ref, reactive, onMounted } from 'vue';
import axios from 'axios';
export default {
    setup() {
        const users = ref([]);
        const errors = ref([]);
        const user_id = ref('');
        const form = reactive({
            name: '',
            email: '',
            password: ''
        });

        const getUser = async () => {
            let res = await axios.get('api/users');
            users.value = res.data;
        }

        const deleteUser = async (id) => {
            await axios.delete('api/users/' + id)
            getUser()
        }

        const storeUser = async () => {
            try {
                await axios.post('api/users', form)
                getUser()
                formReset()
                $("#myModal").modal('hide');
            } catch (e) {
                if (e.response.status == 422) {
                    var data = [];
                    for (const key in e.response.data.errors) {
                        data.push(e.response.data.errors[key][0]);
                    }
                    errors.value = data;
                }
            }
        }

        const updateUser = async () => {
            try {
                await axios.patch('api/users/' + user_id.value, form)
                getUser()
                formReset()
                $("#myModal").modal('hide');
            } catch (e) {
                if (e.response.status == 422) {
                    var data = [];
                    for (const key in e.response.data.errors) {
                        data.push(e.response.data.errors[key][0]);
                    }
                    errors.value = data;
                }
            }
        }

        const editUser = (user) => {
            user_id.value = user.id;
            form.name = user.name;
            form.email = user.email;
            form.password = user.password;
        }

        onMounted(getUser());

        const formReset = () => {
            user_id.value = '';
            form.name = '';
            form.email = '';
            form.password = '';
        }

        return {
            users,
            form,
            storeUser,
            errors,
            editUser,
            user_id,
            updateUser,
            formReset,
            deleteUser
        }

    }
}
</script>
