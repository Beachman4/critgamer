<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-1 text-lg-right">
                <a href="/"><img src="/assets/img/better_brand.png" height="125" /></a>
            </div>
            <div class="col-lg-6 menu">
                <nav class="navbar navbar-light bg-faded">
                    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#crigamernav">
                        &#9776;
                    </button>
                    <div class="collapse navbar-toggleable-xs" id="crigamernav">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                            <li class="nav-item">
                                <a class="nav-link" href="/events">LAN | Events</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#">Merchandise</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Sponsors</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
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
                    </div>
                </nav>
            </div>
        </div>
    </div>
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
    .menu {
        margin-top: 35px;
    }
</style>