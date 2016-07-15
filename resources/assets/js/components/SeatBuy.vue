<template>
    <div class="modal" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="paymentModalLabel" style="color: black;">Register</h4>
                </div>
                <div class="modal-body">
                    <div class="row" v-if="failedMessage != ''">
                        <div class="col-lg-12">
                            <div class="alert alert-danger">
                                <h4>Something went wrong</h4>
                                <p>{{ failedMessage }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group" role="group" aria-label="Stuff">
                        <button type="button" class="btn btn-danger-outline" data-dismiss="modal" aria-label="Close">Close</button>
                        <button v-if="!infoDone" type="button" class="btn btn-success-outline" @click="continueToPayment">Continue to Payment</button>
                        <button v-else type="button" class="btn btn-success-outline" @click="paymentDone">Buy Seat</button>
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
                failedMessage: "",
                loggedIn: false,
                userData: []
            }
        },
        ready() {
            $('#paymentModal').on('show.bs.modal', function(e) {
                this.loginCheck();
            }.bind(this))
        },
        methods: {
            continueToPayment: function() {

            },
            loginCheck: function() {
                this.$http.get('/api/isSignedIn').then((response) => {
                    if (response.text() == "failed") {
                        this.$parent.$set('returnToPayments', true);
                        this.$parent.$set('paymentMessage', "You need to login or register first.");
                        $('#paymentModal').modal('hide');
                        $('#loginModal').modal('show');
                    } else {
                        this.$set('userData', response.json().userData);
                    }
                });
            }
        }
    }
</script>