<template>
    <div class="modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="LoginModalLabel" style="color: black;">Login</h4>
                </div>
                <div class="modal-body">
                    <div class="row" v-if="loginMessage != ''">
                        <div class="col-lg-12">
                            <div class="alert alert-danger">
                                <h5>Something went wrong.</h5>
                                <p>{{ loginMessage }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-if="return">
                        <div class="col-lg-12">
                            <div class="alert alert-warning">
                                <p style="color: black">{{ returnMessage }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div :class="['form-group', loginData.username_email.failed ? 'has-danger' : '']">
                                <label for="username_email" class="form-control-label">Username or Email</label>
                                <input type="text" class="form-control form-control-danger" name="username_email" v-model="loginData.username_email.value" id="username_email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div :class="['form-group', loginData.password.failed ? 'has-danger' : '']">
                                <label for="password" class="form-control-label">Password</label>
                                <input type="password" class="form-control form-control-danger" name="password" v-model="loginData.password.value" id="password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group" role="group" aria-label="Stuff">
                        <button type="button" class="btn btn-danger-outline" data-dismiss="modal" aria-label="Close">Close</button>
                        <button data-toggle="modal" @click="hideLogin" data-target="#registerModal" type="button" class="btn btn-primary-outline">Register</button>
                        <button type="button" @click="login" class="btn btn-success-outline">Login</button>
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
                loginData: {
                    username_email: {
                        value: "",
                        failed: false
                    },
                    password: {
                        value: "",
                        failed: false
                    }
                },
                loginMessage: "",
                loginDone: "",
                return: false,
                returnMessage: ""
            }
        },
        ready() {
            $('#loginModal').on('show.bs.modal', function(e) {
                if (this.$parent.returnToPayments) {
                    this.return = true;
                    this.returnMessage = this.$parent.paymentMessage;
                }
            }.bind(this));
        },
        methods: {
            hideLogin: function() {
                $('#loginModal').modal('hide');
            },
            clearData: function() {
                this.loginData.username_email.value = "";
                this.loginData.password.value = "";
            },
            login: function() {
                if (!this.checkData()) {
                    this.$http.post('/api/login', this.loginData).then(function(response) {
                        if (response.text() != "") {
                            this.$set('loginMessage', response.text());
                            this.$set('loginDone', false);
                        } else {
                            this.$set('loginDone', true);
                            this.$dispatch('loggedIn', true);
                            $('#loginModal').modal('hide');
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
                if (this.loginData.username_email.value == "") {
                    failed = true;
                    this.loginData.username_email.failed = true;
                } else {
                    this.loginData.username_email.failed = false;
                }
                if (this.loginData.password.value == "") {
                    failed = true;
                    this.loginData.password.failed = true;
                } else {
                    this.loginData.password.failed = false;
                }
                return failed;
            }
        }
    }
</script>