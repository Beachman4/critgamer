<template>
    <div class="modal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="registerModalLabel" style="color: black;">Register</h4>
                </div>
                <div class="modal-body">
                    <div class="row" v-if="registerMessage != ''">
                        <div class="col-lg-12">
                            <div class="alert alert-danger">
                                <h5>Something went wrong.</h5>
                                <p>{{ registerMessage }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-if="return">
                        <div class="col-lg-12">
                            <div class="alert  alert-warning">
                                <p style="color: black;">{{ returnMessage }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-if="!registerPending">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <div :class="['form-group', registerData.email.failed ? 'has-danger' : '']">
                                        <label for="email" class="form-control-label">Email Address</label>
                                        <input type="email" class="form-control form-control-danger" name="email" v-model="registerData.email.value" id="email">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <div :class="['form-group', registerData.username.failed ? 'has-danger' : '']">
                                        <label for="username" class="form-control-label">Username</label>
                                        <input type="text" class="form-control form-control-danger" name="username" v-model="registerData.username.value" id="username">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <div :class="['form-group', registerData.password.failed ? 'has-danger' : '']">
                                        <label for="password" class="form-control-label">Password</label>
                                        <input type="password" class="form-control form-control-danger" name="password" v-model="registerData.password.value" id="password">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <div :class="['form-group', registerData.confirm_password.failed ? 'has-danger' : '']">
                                        <label for="confirm_password" class="form-control-label">Confirm Password</label>
                                        <input type="password" class="form-control form-control-danger" name="confirm_password" v-model="registerData.confirm_password.value" id="confirm_password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-else>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 text-lg-center">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group" role="group" aria-label="Stuff">
                        <button type="button" class="btn btn-danger-outline" data-dismiss="modal" aria-label="Close">Close</button>
                        <button data-toggle="modal" @click="hideRegister" data-target="#loginModal" type="button" class="btn btn-primary-outline">Login</button>
                        <button type="button" @click="register" :disabled="disableRegister" class="btn btn-success-outline">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                registerData: {
                    email: {
                        value: "",
                        failed: false
                    },
                    username: {
                        value: "",
                        failed: false
                    },
                    password: {
                        value: "",
                        failed: false
                    },
                    confirm_password: {
                        value: "",
                        failed: false
                    }
                },
                failed: false,
                registerMessage: "",
                registerDone: false,
                registerPending: false,
                return: false,
                returnMessage: ""
            }
        },
        computed: {
            disableRegister: function() {
                if (this.registerPending) {
                    return true;
                }
                return false;
            }
        },
        ready() {
            $('#registerModal').on('show.bs.modal', function(e) {
                if (this.$parent.returnToPayments) {
                    this.return = true;
                    this.returnMessage = this.$parent.paymentMessage;
                }
            }.bind(this));
        },
        methods: {
            hideRegister: function() {
                $('#registerModal').modal('hide');
            },
            clearData: function() {
                this.registerData.email.value = "";
                this.registerData.username.value = "";
                this.registerData.password.value = "";
                this.registerData.confirm_password.value = "";
            },
            register: function() {
                if (!this.checkData()) {
                    this.$http.post('/api/register', this.registerData).then(function(response) {
                        if (response.text() != "") {
                            this.$set('registerMessage', response.text());
                            this.$set('registerDone', false);
                        } else {
                            this.$set('registerDone', true);
                            this.$dispatch('loggedIn', true);
                            $('#registerModal').modal('hide');
                            this.clearData();
                            if (this.$parent.returnToPayments) {
                                this.$dispatch('redirectedToPayment', true);
                                $('#paymentModal').modal('show');
                            }
                        }
                    });
                }
            },
            checkData: function() {
                var failed = false;
                if (this.registerData.email.value == "") {
                    failed = true;
                    this.registerData.email.failed = true;
                } else {
                    this.registerData.email.failed = false;
                }
                if (this.registerData.username.value == "") {
                    failed = true;
                    this.registerData.username.failed = true;
                } else {
                    this.registerData.username.failed = false;
                }
                if (this.registerData.password.value == "") {
                    failed = true;
                    this.registerData.password.failed = true;
                } else {
                    this.registerData.password.failed = false;
                }
                if (this.registerData.confirm_password.value == "") {
                    failed = true;
                    this.registerData.confirm_password.failed = true;
                } else {
                    this.registerData.confirm_password.failed = false;
                }
                return failed;
            }
        }
    }
</script>