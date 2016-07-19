<template>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#user" role="tab">User Info</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#seats" role="tab">Seats</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#orders" role="tab">Orders</a>
        </li>
    </ul>
    <div class="box">
        <div class="box-body">
    <div class="tab-content">
        <div class="tab-pane active" id="user" role="tabpanel">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" v-if="!edit">
                        <div class="col-lg-6">
                            <button class="btn btn-success-outline" @click="edit = ! edit">Edit</button>
                        </div>
                    </div>
                    <div class="row" v-else>
                        <div class="col-lg-6">
                            <button class="btn btn-danger-outline" @click="edit = ! edit">Stop Editing</button>
                            <button class="btn btn-success-outline" @click="submitData">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="info" v-if="!edit">
                        <h4>Username</h4>
                        <p>{{ user.username }}</p>
                    </div>
                    <div class="form-group" v-else>
                        <label for="username" class="form-control-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" v-model="user.username">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info" v-if="!edit">
                        <h4>Email</h4>
                        <p>{{ user.email }}</p>
                    </div>
                    <div class="form-group" v-else>
                        <label for="email" class="form-control-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" v-model="user.email">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6" v-if="edit">
                    <div class="form-group">
                        <label for="password" class="form-control-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" v-model="user.password">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="info" v-if="!edit">
                        <h4>First Name</h4>
                        <p>{{ user.first_name }}</p>
                    </div>
                    <div class="form-group" v-else>
                        <label for="first_name" class="form-control-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" v-model="user.first_name">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info" v-if="!edit">
                        <h4>Last Name</h4>
                        <p>{{ user.last_name }}</p>
                    </div>
                    <div class="form-group" v-else>
                        <label for="last_name" class="form-control-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" v-model="user.last_name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="info" v-if="!edit">
                        <h4>Address</h4>
                        <p>{{ user.address }}</p>
                    </div>
                    <div class="form-group" v-else>
                        <label for="address" class="form-control-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" v-model="user.address">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info" v-if="!edit">
                        <h4>City</h4>
                        <p>{{ user.city }}</p>
                    </div>
                    <div class="form-group" v-else>
                        <label for="city" class="form-control-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" v-model="user.city">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info" v-if="!edit">
                        <h4>State</h4>
                        <p>{{ user.state }}</p>
                    </div>
                    <div class="form-group" v-else>
                        <label for="state" class="form-control-label">State</label>
                        <input type="text" class="form-control" id="state" name="state" v-model="user.state">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info" v-if="!edit">
                        <h4>Zip</h4>
                        <p>{{ user.zip }}</p>
                    </div>
                    <div class="form-group" v-else>
                        <label for="zip" class="form-control-label">Zip</label>
                        <input type="text" class="form-control" id="zip" name="zip" v-model="user.zip">
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="orders" role="tabpanel">

        </div>
        <div class="tab-pane" id="seats" role="tabpanel">

        </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: [],
                seats: [],
                orders: [],
                edit: false
            }
        },
        props: ["id"],
        ready() {
            this.fetchUser();
        },
        methods: {
            fetchUser: function()
            {
                this.$http.get('/api/admin/users/'+this.id).then((response) => {
                    this.user = response.json().user;
                });
            }
        }
    }
</script>