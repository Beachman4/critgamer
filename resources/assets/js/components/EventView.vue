<template>
    <seat-buy></seat-buy>
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <h3>{{ event.name }}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p>{{ event.description }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row" style="border-bottom: 1px solid grey;">
                <div class="col-lg-12">
                    <h5>Start: {{ parseDate(event.start) }}</h5>
                    <h5>End: {{ parseDate(event.end) }}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h5>{{ event.name || capitalize }}</h5>
                    <p>{{ event.address }}</p>
                    <p>{{ location }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 seating" style="float: right;">
            <div class="row">
                <div class="col-lg-4">
                    <h3>Seating Chart</h3>
                </div>
                <div class="col-lg-6" style="float:right;">
                    <div class="row" style="border-bottom: 1px solid black">
                        <div class="col-lg-12">
                            <h3>Seating Chart Legend</h3>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 2rem; border-bottom: 1px solid black">
                        <div class="col-lg-12">
                            <div class="input-group" style="margin-bottom: 1rem;">
                                <input type="text" class="form-control" v-model="searchName" placeholder="Search Users" v-on:keyup="searchUsers">
                                <span class="input-group-btn">
                            <button class="btn btn-default" type="button" style="color: black;" @click="clearSearch">&times;</button>
                        </span>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 1rem;">
                        <div class="col-lg-12">
                            <h5>Types</h5>
                            <div class="row">
                                <div class="col-lg-1">
                                    <div v-on:mouseover="hover('admin', true)" v-on:mouseleave="hover('admin', false)" :class="['admin-seating', a_hovered]">

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <p>Admin</p>
                                </div>
                                <div class="col-lg-4">
                                    <p>Good Luck</p>
                                </div>
                                <div class="col-lg-4">
                                    <p>Nah bro</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-1">
                                    <div v-on:mouseover="hover('regular', true)" v-on:mouseleave="hover('regular', false)" :class="['standard-seating', reg_hovered]">

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <p>Standard</p>
                                </div>
                                <div class="col-lg-4">
                                    <p>${{ event.price }}</p>
                                </div>
                                <div class="col-lg-4">
                                    <p>{{ numberSeats }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="admin_row">
                        <div track-by="$index" :class="['admin_seat', a_hovered]" v-on:mouseover="adminHovered(admin, true)" v-on:mouseleave="adminHovered(admin, false)" v-for="admin in admins">
                            <div class="seat_info" v-show="admin.hovered">
                                <p>Admin Seat - {{ $index + 1 }}</p>
                                <p>{{ admin.name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="regular_wrapper">
                        <div class="regular_table" v-for="(parentKey, table) in seats">
                            <div @click="buySeat(seat)" :class="['regular_seat', reg_hovered, seat.hovered ? 'regular_hovered' : '', seat.users_id != null ? 'seat_taken' : '']" track-by="$index" v-for="seat in table" v-on:mouseover="seatHovered(seat, true)" v-on:mouseleave="seatHovered(seat, false)">
                                <div class="seat_info" v-show="seat.hovered && !seat.noPanel">
                                    <p>Regular Seat Table {{ tableLetter(parentKey) }}-{{ $index + 1 }}</p>
                                    <div v-if="seat.users_id == null">
                                        <p>Available</p>
                                        <p>{{ event.price | currency }}</p>
                                    </div>
                                    <div v-else>
                                        <p>{{ seat.username }}</p>
                                        <p>PAID</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 35rem;"></div>
</template>


<script>
    export default {
        data() {
            return {
                show: false,
                event: [],
                searchName: "",
                admins: [
                    {
                        name: "Verbatim37",
                        hovered: false
                    },
                    {
                        name: "Verbatim37 SO",
                        hovered: false
                    },
                    {
                        name: "SpadeFire91",
                        hovered: false
                    },
                    {
                        name: "SpadeFire91 SO",
                        hovered: false
                    },
                    {
                        name: "Upcboy",
                        hovered: false
                    },
                    {
                        name: "Upcboy SO",
                        hovered: false
                    },
                    {
                        name: "TotalFreedom",
                        hovered: false
                    },
                    {
                        name: "TotalFreedom SO",
                        hovered: false
                    }
                ],
                seats: [],
                admin_hovered: false,
                regular_hovered: false,
                selectedSeat: 0,
                mostrecent: ""
            }
        },
        ready() {
            this.fetchEvent();
            this.fetchSeats();
            this.socket();
        },
        computed: {
            numberSeats: function() {
                var tables = this.seats,
                        count = 0;
                for(var i = 0; i < tables.length; i++) {
                    var seats = tables[i];
                    for (var j = 0; j < seats.length; j++) {
                        if (seats[j].users_id == null) {
                            count = count + 1;
                        }
                    }
                }
                return count;
            },
            location: function() {
                return this.event.city + ", " + this.event.state + " " + this.event.zip;
            },
            a_hovered: function() {
                return this.admin_hovered ? 'admin_hovered' : '';
            },
            reg_hovered: function() {
                return this.regular_hovered ? 'regular_hovered' : '';
            }
        },
        methods: {
            searchUsers: function() {
                var search = this.searchName;
                if (search != "") {
                    for (var i = 0; i < this.seats.length; i++) {
                        for (var j = 0; j < this.seats[i].length; j++) {
                            if (this.seats[i][j].username.indexOf(search) != -1) {
                                this.seats[i][j].hovered = true;
                                this.seats[i][j].noPanel = true;
                            } else {
                                this.seats[i][j].hovered = false;
                                this.seats[i][j].noPanel = false;
                            }
                        }
                    }
                } else {
                    for (var i = 0; i < this.seats.length; i++) {
                        for (var j = 0; j < this.seats[i].length; j++) {
                            this.seats[i][j].hovered = false;
                            this.seats[i][j].noPanel = false;
                        }
                    }
                }
            },
            getInfo: function() {
                //var tables = this.seats;
                for(var i = 0; i < this.seats.length; i++) {
                    //var seats = tables[i];
                    for (var j = 0; j < this.seats[i].length; j++) {
                        if (this.seats[i][j].users_id != null) {
                            var user_id = this.seats[i][j].users_id;
                            //var user = this.fetchUserInfo(user_id);
                            this.fetchUserInfo(user_id);
                            this.seats[i][j].username = this.mostrecent;

                        }
                    }
                }
            },
            fetchDetails: function(data) {
                var users_id = data.users_id,
                    id = data.id;
                var tables = this.seats;
                var user = this.fetchUserInfo(users_id);
                for(var i = 0; i < tables.length; i++) {
                    var seats = tables[i];
                    for (var j = 0; j < seats.length; j++) {
                        if (seats[j].id == id) {
                            seats[j].users_id = users_id;
                            this.seats[i][j].users_id = users_id;
                            this.seats[i][j].username = user;
                        }
                    }
                }
            },
            socket: function() {
                $.getScript('http://localhost:3000/socket.io/socket.io.js');

                var socket = io('http://localhost:3000');
                socket.on('main:App\\Events\\SeatWasBought', function(message) {
                    var data = {
                        users_id: message.user_id,
                        id: message.seat_id
                    }
                    this.fetchDetails(data);
                }.bind(this));
            },
            buySeat: function(seat) {
                if (seat.users_id == null) {
                    this.$dispatch('selectedSeat', seat.id);
                    $('#loginModal').modal('hide');
                    $('#paymentModal').modal('show');
                }
            },
            fetchEvent: function() {
                var id = this.$route.params.event_id;
                this.$http.get('/api/events/'+id).then(function(response) {
                    this.$set('event', response.json());
                });
            },
            fetchSeats: function() {
                var id = this.$route.params.event_id;
                this.$http.get('/api/events/'+id+'/seats').then(function(response) {
                    this.$set('seats', response.json());
                    //this.getInfo();
                });
            },
            fetchUserInfo: function(id) {
                this.$http.get('/api/user/'+id).then(function(response) {
                    this.$set('mostrecent', response.text());
                });
            },
            parseDate: function(date) {
                var date = moment(date);
                return date.format('dddd, MMMM Do YYYY, h:mm:ss a');
            },
            clearSearch: function() {
                this.searchName = "";
                for(var i = 0; i < this.seats.length; i++) {
                    for (var j = 0; j < this.seats[i].length; j++) {
                        this.seats[i][j].hovered = false;
                        this.seats[i][j].noPanel = false;
                    }
                }
            },
            hover: function(seat, type) {
                if (seat == 'admin') {
                    if (type) {
                        this.admin_hovered = true;
                    } else {
                        this.admin_hovered = false;
                    }
                } else {
                    if (type) {
                        this.regular_hovered = true;
                    } else {
                        this.regular_hovered = false;
                    }
                }
            },
            tableLetter: function(index) {
                switch(index) {
                    case 0: {
                        return "A";
                    }
                    case 1: {
                        return "B";
                    }
                    case 2: {
                        return "C";
                    }
                    case 3: {
                        return "D";
                    }
                    case 4: {
                        return "E";
                    }
                    case 5: {
                        return "F";
                    }
                    case 6: {
                        return "G";
                    }
                    case 7: {
                        return "H";
                    }
                    case 8: {
                        return "I";
                    }
                    case 9: {
                        return "J";
                    }
                    case 10: {
                        return "K";
                    }
                }
            },
            seatHovered: function(seat, mouse) {
                if (mouse) {
                    seat.hovered = true;
                } else {
                    seat.hovered = false;
                }
            },
            adminHovered: function(admin, mouse) {
                if (mouse) {
                    admin.hovered = true;
                } else {
                    admin.hovered = false;
                }
            }
        }
    }
</script>