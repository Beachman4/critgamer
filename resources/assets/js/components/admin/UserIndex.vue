<template>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">User List</h3>
        </div>
        <div class="box-body">
            <table id="userTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" track-by="$index">
                        <td>{{ user.id }}</td>
                        <td><a href="/admin/users/{{ user.id }}">{{ user.username }}</a></td>
                        <td>{{ user.email }}</td>
                        <td><a href="/admin/users/{{ user.id }}#edit"><i class="fa fa-pencil-square-o fa-lg"></i></a>&nbsp;<a href="/admin/users/{{ user.id }}/delete"><i class="fa fa-trash fa-lg"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: [],
                search: ""
            }
        },
        ready() {
            this.fetchUsers();
        },
        methods: {
            fetchUsers: function()
            {
                this.$http.get('/api/admin/users').then((response) => {
                    this.users = response.json().users;
                });
            }
        }
    }
</script>