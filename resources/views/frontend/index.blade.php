@extends('frontend.templates.master')
@section('content')
    <script src="{{ URL::asset('assets/js/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.simplr.smoothscroll.min.js') }}"></script>
    <link rel="stylesheet" href="https://rawgit.com/pixedelic/Camera/master/css/camera.css">
    <script>
        $( document ).on( "mobileinit", function() {
            $.mobile.loader.prototype.options.disabled = true;
            $.mobile.ajaxEnabled = false;
        });
    </script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script src="https://rawgit.com/pixedelic/Camera/master/scripts/jquery.easing.1.3.js"></script>
    <script src="https://rawgit.com/pixedelic/Camera/master/scripts/camera.min.js"></script>
    <script src="{{ URL::asset('assets/js/jquery.rd-parallax.js') }}"></script>

    </div>
    </div>
    <div class="camera_wrap">
        <div data-src="https://i.imgur.com/Jznk84E.jpg">
            <div class="camera_info fadeIn camera_affected">
                <h1>Lan Party</h1>
                <p>You bring the computer, we'll do the rest.</p>
            </div>
        </div>
        <div data-src="https://i.imgur.com/hiC4wtU.jpg">
            <div class="camera_info fadeIn camera_affected">
                <h1>Infrastrucgture</h1>
                <p>We have an impressive network and power system to make sure you are gaming during the entire party.</p>
            </div>
        </div>
        <div data-src="https://i.imgur.com/fhKGKN6.jpg">
            <div class="camera_info fadeIn camera_affected">
                <h1>Community</h1>
                <p>We care about our gamers.  We offer several tournaments with prizes and giveaways.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" style="padding: 3rem">
                    <h1>What we do</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mattis dapibus ex. Maecenas et elementum quam, id maximus tortor. Nullam porttitor, urna ut consectetur consequat, dui quam porta sem, sit amet mollis diam ligula at quam. Mauris lacus arcu, suscipit posuere molestie et, vestibulum et sapien. Praesent accumsan tellus viverra arcu fringilla vehicula. In dictum tortor egestas, imperdiet tellus vitae, laoreet mauris. Vivamus iaculis urna porttitor nulla aliquet gravida.</p>
                </div>
            </div>
            </div>
            </div>
            <div class="parallax parallax1" data-parallax-speed="-0.4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Like What You See?</h2>
                            <p>We implore you to check out our calendar of events and sign up for our next Lan Event!</p>
                            <a href="/lan-party/events">Lan Events</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>News</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Lorem ipsum</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mattis dapibus ex. Maecenas et elementum quam, id maximus tortor. Nullam porttitor, urna ut consectetur consequat, dui quam porta sem, sit amet mollis diam ligula at quam. Mauris lacus arcu, suscipit posuere molestie et, vestibulum et sapien. Praesent accumsan tellus viverra arcu fringilla vehicula. In dictum tortor egestas, imperdiet tellus vitae, laoreet mauris. Vivamus iaculis urna porttitor nulla aliquet gravida.</p>
                        <h5 class="text-right"><a href="#">Read More</a></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Lorem ipsum</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mattis dapibus ex. Maecenas et elementum quam, id maximus tortor. Nullam porttitor, urna ut consectetur consequat, dui quam porta sem, sit amet mollis diam ligula at quam. Mauris lacus arcu, suscipit posuere molestie et, vestibulum et sapien. Praesent accumsan tellus viverra arcu fringilla vehicula. In dictum tortor egestas, imperdiet tellus vitae, laoreet mauris. Vivamus iaculis urna porttitor nulla aliquet gravida.</p>
                        <h5 class="text-right"><a href="#">Read More</a></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Lorem ipsum</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mattis dapibus ex. Maecenas et elementum quam, id maximus tortor. Nullam porttitor, urna ut consectetur consequat, dui quam porta sem, sit amet mollis diam ligula at quam. Mauris lacus arcu, suscipit posuere molestie et, vestibulum et sapien. Praesent accumsan tellus viverra arcu fringilla vehicula. In dictum tortor egestas, imperdiet tellus vitae, laoreet mauris. Vivamus iaculis urna porttitor nulla aliquet gravida.</p>
                        <h5 class="text-right"><a href="#">Read More</a></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1>Sponsors</h1>
                        <div class="row">
                            <div class="col-lg-4">
                                <a href="http://www.gunnars.com/" target="_blank"><img src="assets/img/gunnar.png"></a>
                            </div>
                            <div class="col-lg-4">
                                <a href="https://www.inwin-style.com/" target="_blank"><img src="/assets/img/InWin.png"></a>
                            </div>
                            <div class="col-lg-4">
                                <a href="http://groupm7.com" target="_blank"><img src="assets/img/groupm7-logo-light.png"></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <a href="https://www.computerpoweruser.com/home" target="_blank"><img src="assets/img/cpu.png"></a>
                            </div>
                            <div class="col-lg-4">
                                <a href="http://ocz.com/us/" target="_blank"><img height="130" src="assets/img/ocz.png"></a>
                            </div>
                            <div class="col-lg-4">
                                <a href="http://wardesports.com/" target="_blank"><img src="assets/img/ward.png"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <template id="login-template">
                    <div class="modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="LoginModalLabel" style="color: black;">Login</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <label>Email or Username
                                                <input type="text" class="form-control" name="username_email" v-model="loginData.username_email.value">
                                                <div v-if="loginData.username_email.failed" class="validation-alert"><span>Required</span></div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <label>Password
                                                <input type="password" class="form-control" name="password" v-model="loginData.password.value">
                                                <div v-if="loginData.password.failed" class="validation-alert"><span>Required</span></div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="btn-group" role="group" aria-label="Stuff">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close</span></button>
                                        <button data-toggle="modal" @click="hideLogin" data-target="#registerModal" type="button" class="btn btn-info">Register</button>
                                        <button type="button" @click="login" class="btn btn-success">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
                <template id="register-template">
                    <div class="modal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="registerModalLabel" style="color: black;">Register</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <label>Email Address
                                                <input type="email" class="form-control" name="email" v-model="registerData.email.value">
                                                <div v-if="registerData.email.failed" class="validation-alert"><span>Required</span></div>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <label>Username
                                                <input type="text" class="form-control" name="username" v-model="registerData.username.value">
                                                <div v-if="registerData.username.failed" class="validation-alert"><span>Required</span></div>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <label>Password
                                                <input type="password" class="form-control" name="password" v-model="registerData.password.value">
                                                <div v-if="registerData.password.failed" class="validation-alert"><span>Required</span></div>
                                            </label>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <label>Confirm Password
                                                <input type="password" class="form-control" name="confirm_password" v-model="registerData.confirm_password.value">
                                                <div v-if="registerData.confirm_password.failed" class="validation-alert"><span>Required</span></div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="btn-group" role="group" aria-label="Stuff">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close</span></button>
                                        <button data-toggle="modal" @click="hideRegister" data-target="#loginModal" type="button" class="btn btn-info">Login</button>
                                        <button type="button" @click="register" class="btn btn-success">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
                <script src="https://vuejs.org/js/vue.js"></script>
    <script>
        Vue.component('login', {
            template: '#login-template',
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
                        },
                    }
                }
            },
            methods: {
                hideLogin: function() {
                    $('#loginModal').modal('hide');
                },
                login: function() {
                    if (this.checkData()) {

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
        });
        Vue.component('register', {
            template: '#register-template',
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
                    failed: false
                }
            },
            methods: {
                hideRegister: function() {
                    $('#registerModal').modal('hide');
                },
                register: function() {
                    if (this.checkData()) {

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
        });
        new Vue({
            el: 'body'
        })
        $('.camera_wrap').camera({
            height: '40.2%',
            autoAdvance: true,
            pagination: false,
            playPause: false,
            hover: false,
            loader: 'none'
        });
        $(function() {
            $('button').each(function() {
                $(this).removeClass('ui-btn');
                $(this).removeClass('ui-shadow');
                $(this).removeClass('ui-corner-all');
            });
        });
    </script>
    <script>
            $.srSmoothscroll({
                step: 150,
                speed: 800
            });
        </script>
@stop
