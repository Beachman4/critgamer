<template>
    <div class="modal" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="paymentModalLabel" style="color: black;">Buy Seat</h4>
                </div>
                <div class="modal-body">
                    <div class="row" v-if="failed">
                        <div class="col-lg-12">
                            <div class="alert alert-danger">
                                <h4 style="color: black">Something went wrong</h4>
                                <p style="color: black">{{ failedMessage }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-if="!infoDone">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div :class="['form-group', customerInfo.first_name.failed ? 'has-danger' : '']">
                                        <label for="first_name" class="form-control-label">First Name</label>
                                        <input type="text" class="form-control form-control-danger" id="first_name" placeholder="First Name" name="first_name" v-model="customerInfo.first_name.value">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div :class="['form-group', customerInfo.last_name.failed ? 'has-danger' : '']">
                                        <label for="last_name" class="form-control-label">Last Name</label>
                                        <input type="text" class="form-control form-control-danger" id="last_name" placeholder="Last Name" name="last_name" v-model="customerInfo.last_name.value">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div :class="['form-group', customerInfo.address.failed ? 'has-danger' : '']">
                                        <label for="address" class="form-control-label">Address</label>
                                        <input type="text" class="form-control form-control-danger" id="address" placeholder="Address" name="address" v-model="customerInfo.address.value">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div :class="['form-group', customerInfo.city.failed ? 'has-danger' : '']">
                                        <label for="city" class="form-control-label">City</label>
                                        <input type="text" class="form-control form-control-danger" id="city" placeholder="City" name="city" v-model="customerInfo.city.value">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div :class="['form-group', customerInfo.state.failed ? 'has-danger' : '']">
                                        <label for="state" class="form-control-label">State</label>
                                        <input type="text" class="form-control form-control-danger" id="state" placeholder="State" name="state" v-model="customerInfo.state.value">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div :class="['form-group', customerInfo.zip.failed ? 'has-danger' : '']">
                                        <label for="zip" class="form-control-label">Zip Code</label>
                                        <input type="text" class="form-control form-control-danger" id="zip" placeholder="Zip Code" name="zip" v-model="customerInfo.zip.value">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ccinfo" v-else>
                        <div class="col-lg-12" v-if="userData.card_last_four == null">
                            <div v-if="!loading">
                            <h5 style="color: black">Card Information</h5>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                            <input type="text" class="form-control form-control-danger" id="cc" placeholder="Card Number" name="cc" v-model="paymentInfo.cc.value">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                                    <input type="text" class="form-control form-control-danger" id="ccexpmonth" placeholder="MM" name="ccexpmonth" v-model="paymentInfo.ccexpmonth.value">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                                    <input type="text" class="form-control form-control-danger" id="ccexpyear" placeholder="YY" name="ccexpyear" v-model="paymentInfo.ccexpyear.value">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="text" class="form-control form-control-danger" id="cccvc" placeholder="CVC" name="cccvc" v-model="paymentInfo.cccvc.value">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkbox">
                                    <label>
                                        <input type="checkbox" v-model="paymentInfo.saveInfo">
                                        Would you like to save this info for future purchases?
                                    </label>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div v-else>
                                <div class="row" v-if="!doneLoading">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12 text-lg-center">
                                                <h5 style="color: black">Your payment is processing!</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 text-lg-center">
                                                <i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>
                                                <span class="sr-only" style="color: black">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" v-else>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12 text-lg-center">
                                                <h5 style="color: black">Your payment has succeeded!</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 text-lg-center">
                                                <p style="color: black">You will receive an email with instructions shortly.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12" v-else>
                            <div v-if="!loading">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h5 style="color: black">Saved CC Info</h5>
                                        <p style="color: black">************{{ userData.card_last_four }} - {{ userData.card_brand }}</p>
                                        <button @click="deleteInfo" class="btn btn-danger-outline">Delete Info</button>
                                    </div>
                                </div>
                            </div>
                            <div v-else>
                                <div class="row" v-if="!doneLoading">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12 text-lg-center">
                                                <h5 style="color: black">Your payment is processing!</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 text-lg-center">
                                                <i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>
                                                <span class="sr-only" style="color: black">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" v-else>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12 text-lg-center">
                                                <h5 style="color: black">Your payment has succeeded!</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 text-lg-center">
                                                <p style="color: black">You will receive an email with instructions shortly.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group" role="group" aria-label="Stuff">
                        <button type="button" class="btn btn-danger-outline" data-dismiss="modal" @click="closed = true" aria-label="Close">Close</button>
                        <button v-if="!infoDone" type="button" class="btn btn-success-outline" :disabled="continuePaymentButton" @click="continueToPayment">Continue to Payment</button>
                        <button v-if="infoDone && !loading" type="button" class="btn btn-success-outline" :disabled="buySeatButton" @click="paymentDone">Buy Seat</button>
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
                infoDone: false,
                loggedIn: false,
                customerInfo: {
                    first_name: {
                        value: "",
                        failed: false
                    },
                    last_name: {
                        value: "",
                        failed: false
                    },
                    address: {
                        value: "",
                        failed: false
                    },
                    city: {
                        value: "",
                        failed: false
                    },
                    state: {
                        value: "",
                        failed: false
                    },
                    zip: {
                        value: "",
                        failed: false
                    },
                },
                paymentInfo: {
                    cc: {
                        value: "",
                        failed: false
                    },
                    ccexpmonth: {
                        value: "",
                        failed: false
                    },
                    ccexpyear: {
                        value: "",
                        failed: false
                    },
                    cccvc: {
                        value: "",
                        failed: false
                    },
                    saveInfo: "",
                    customerKey: "",
                    last4: "",
                    brand: "",
                    selectedSeat: 0,
                    event: 0
                },
                userData: [],
                failed: false,
                failedMessage: "",
                loading: false,
                doneLoading: false
            }
        },
        ready() {
            $('#paymentModal').on('show.bs.modal', function(e) {
                this.paymentInfo.selectedSeat = this.$parent.$parent.selectedSeat;
                var id = this.$route.params.event_id;
                this.paymentInfo.event = id;
                this.loginCheck();
                this.doneLoading = false;
                this.loading = false;
            }.bind(this));
            $('#paymentModal').on('hide.bs.modal', function() {
                this.resetValues();
            }.bind(this));
            this.jqueryShit();
        },
        computed: {
            continuePaymentButton: function() {
                var disabled = false;
                if (this.customerInfo.first_name.value == "") {
                    disabled = true;
                }
                if (this.customerInfo.last_name.value == "") {
                    disabled = true;
                }
                if (this.customerInfo.address.value == "") {
                    disabled = true;
                }
                if (this.customerInfo.city.value == "") {
                    disabled = true;
                }
                if (this.customerInfo.state.value == "") {
                    disabled = true;
                }
                if (this.customerInfo.zip.value == "") {
                    disabled = true;
                }
                return disabled;
            },
            buySeatButton: function() {
                var disabled = false;
                if (this.paymentInfo.cc.value == "") {
                    disabled = true;
                }
                if (this.paymentInfo.ccexpmonth.value == "") {
                    disabled = true;
                }
                if (this.paymentInfo.ccexpyear.value == "") {
                    disabled = true;
                }
                if (this.paymentInfo.cccvc.value == "") {
                    disabled = true;
                }
                if (this.userData.card_last_four != "") {
                    disabled = false;
                }
                return disabled;
            },
            fullName: function() {
                return this.customerInfo.first_name.value + " " + this.customerInfo.last_name.value;
            }
        },
        methods: {
            deleteInfo: function() {
                this.userData.card_last_four = null;
                this.userData.card_brand = null;
                this.$http.get('/api/user/clearData').then((response) => {

                });
            },
            resetValues: function() {
                this.paymentInfo.cc.value = "";
                this.paymentInfo.ccexpmonth.value = "";
                this.paymentInfo.ccexpyear.value = "";
                this.paymentInfo.cccvc.value = "";
                this.loading = false;
                this.doneLoading = false;
                this.infoDone = false;
            },
            jqueryShit: function() {
                $('#ccexp').change(() => {
                    console.log("changed");
                    if ($('#ccexp').val().length == 2) {
                        var newString = $('#ccexp').val() + '/';
                        $('#ccexp').val(newString);
                    } else if ($('#ccexp').val().length == 3) {
                        console.log($('#ccexp').val().indexOf('/'));
                        if ($('#ccexp').val().indexOf('/') != -1) {
                            var string = $('#ccexp').val();
                            var newValue = string.replace('/', '');
                            $('#ccexp').val(newValue);
                        }
                    } else if($('#ccexp').val().length < 2) {
                        var string = $('#ccexp').val();
                        var newValue = string.replace('/', '');
                        $('#ccexp').val(newValue);
                    }
                });
            },
            continueToPayment: function() {
                this.$http.post('/api/customerInfo', this.customerInfo).then((response) => {
                    if (response.text() == "") {
                        this.$set('failed', false);
                        this.$set('infoDone', true);
                        $.getScript('https://js.stripe.com/v2/');
                    }
                });
            },
            checkToken: function() {
                if (this.paymentInfo.customerKey == "") {
                    setTimeout(this.checkToken, 50);
                } else {
                    var vm = this;
                    setTimeout(function() {
                        vm.sendPayment();
                    }, 4000);
                }
            },
            paymentDone: function() {
                if (this.userData.card_last_four == null) {
                    this.stripe();
                    this.checkToken();
                } else {
                    this.loading = true;
                    this.doneLoading = false;
                    var vm = this;
                    setTimeout(function() {
                        vm.sendPaymentSaved();
                    }, 6000);
                    //this.sendPaymentSaved();
                }
            },
            sendPaymentSaved: function() {
                if (!this.failed) {
                    this.doneLoading = true;
                    this.$http.post('/api/buySeatSaved', this.paymentInfo).then((response) => {
                        if (response.text() == "") {
                            this.$set('failed', false);
                            /*setTimeout(function(){
                                if (!this.closed) {
                                    $('#paymentModal').modal('hide');
                                }
                            }, 10000);*/
                        } else {
                            this.loading = false;
                            this.doneLoading = false;
                            this.$set('failed', true);
                            this.$set('failedMessage', response.json().message);
                        }
                    });
                }
            },
            stripe: function() {
                this.loading = true;
                Stripe.setPublishableKey('pk_test_lDzTdn3YHXdwQOvzIvTGUUo9');

                Stripe.card.createToken({
                    number: this.paymentInfo.cc.value,
                    cvc: this.paymentInfo.cccvc.value,
                    exp_month: this.paymentInfo.ccexpmonth.value,
                    exp_year: this.paymentInfo.ccexpyear.value,
                    name: this.fullName,
                    address_line1: this.customerInfo.address.value,
                    address_city: this.customerInfo.city.value,
                    address_zip: this.customerInfo.zip.value,
                    address_state: this.customerInfo.state.value
                }, (status, response) => {
                    if (response.error) {
                        this.$set('failed', true);
                        this.$set('failedMessage', response.error.message);
                        this.doneLoading = false;
                        this.loading = false;
                    } else {
                        this.$set('failed', false);
                        this.$set('failedMessage', "");
                        if (this.paymentInfo.saveInfo) {
                            this.paymentInfo.last4 = response.card.last4;
                            this.paymentInfo.brand = response.card.brand;
                        }
                        this.paymentInfo.customerKey = response['id'];
                    }
                });
            },
            sendPayment: function() {
                if (!this.failed) {
                    this.doneLoading = true;
                    this.$http.post('/api/buySeat', this.paymentInfo).then((response) => {
                        if (response.text() == "") {
                            this.$set('failed', false);
                            /*setTimeout(function(){
                                if (!this.closed) {
                                    if (!this.opened) {
                                        $('#paymentModal').modal('hide');
                                    }
                                }
                            }, 10000);*/
                        } else {
                            this.loading = false;
                            this.doneLoading = false;
                            this.$set('failed', true);
                            this.$set('failedMessage', response.json().message);
                        }
                    });
                }
            },
            loginCheck: function() {
                this.$http.get('/api/isSignedIn').then((response) => {
                    if (response.text() == "failed") {
                        this.$dispatch('redirectPayment', "You need to login or register first.");
                        $('#paymentModal').modal('hide');
                        $('#loginModal').modal('show');
                    } else {
                        this.$set('userData', response.json().userData);
                        this.customerInfo.first_name.value = this.userData.first_name;
                        this.customerInfo.last_name.value = this.userData.last_name;
                        this.customerInfo.address.value = this.userData.address;
                        this.customerInfo.city.value = this.userData.city;
                        this.customerInfo.state.value = this.userData.state;
                        this.customerInfo.zip.value = this.userData.zip;
                    }
                });
            }
        }
    }
</script>