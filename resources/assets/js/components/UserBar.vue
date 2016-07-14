<template>
    <nav class="nav nav-inline">
        <ul class="nav">
            <li class="nav-item dropdown" v-if="loggedIn">
                <a href="#" class="btn btn-primary-outline nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ userData.username }}</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">My Account</a>
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            </li>
            <li v-if="!loggedIn" class="nav-item"><a data-toggle="modal" data-target="#loginModal" href="#" class="nav-link btn btn-primary-outline">Login</a></li>
            <li v-if="!loggedIn" class="nav-item"><a data-toggle="modal" data-target="#registerModal" href="#" class="nav-link btn btn-primary-outline">Register</a></li>
        </ul>
    </nav>
</template>

<script>
    export default {
        data() {
            return {
                loggedIn: false,
                userData: {
                    username: ""
                }
            }
        },
        ready() {
            this.loginCheck();
        },
        methods: {
            loginCheck: function() {
                this.$http.get('/api/isSignedIn').then((response) => {
                    console.log(response);
                    if (response.text() == "failed") {
                        this.$set('loggedIn', false);
                    } else {
                        this.$set('userData', response.json().userData);
                        this.$set('loggedIn', true);
                    }
                }, (response) => {
                    console.log(response);
                    this.$set('loggedIn', false);
                });
            }
        },
        events: {
            loggedIn: function(data) {
                this.loginCheck();
            }
        }
    }
</script>

<style>
    nav.nav {
        width: 100%;
        text-align: right;
        background-color: #2D2D2D;
    }
</style>