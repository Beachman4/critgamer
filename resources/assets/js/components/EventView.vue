<template>
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
        <div class="col-lg-4 seating">
            <div class="row" style="border-bottom: 1px solid black">
                <div class="col-lg-12">
                    <h3>Seating Chart Legend</h3>
                </div>
            </div>
            <div class="row" style="margin-top: 2rem; border-bottom: 1px solid black">
                <div class="col-lg-12">
                    <div class="input-group" style="margin-bottom: 1rem;">
                        <input type="text" class="form-control" v-model="searchName" placeholder="Search Users">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" @click="clearSearch">&times;</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 1rem;">
                <div class="col-lg-12">
                    <h5>Types</h5>
                    <div class="row">
                        <div class="col-lg-1">
                            <div v-on:mouseover="testing" v-on:mouseleave="clearSearch" class="admin-seating">

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
                            <div v-on:mouseover="testing" v-on:mouseleave="clearSearch" class="standard-seating">

                            </div>
                        </div>
                        <div class="col-lg-3">
                            <p>Standard</p>
                        </div>
                        <div class="col-lg-4">
                            <p>$15</p>
                        </div>
                        <div class="col-lg-4">
                            <p>22</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 seating" style="float: right;">

        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                event: [],
                searchName: ""
            }
        },
        created() {
            this.fetchEvent();
        },
        computed: {
            location: function() {
                return this.event.city + ", " + this.event.state + " " + this.event.zip;
            }
        },
        methods: {
            fetchEvent: function() {
                var id = this.$route.params.event_id;
                this.$http.get('/api/events/'+id).then(function(response) {
                    this.$set('event', response.json());
                });
            },
            parseDate: function(date) {
                var date = moment(date);
                return date.format('dddd, MMMM Do YYYY, h:mm:ss a');
            },
            clearSearch: function() {
                this.searchName = "";
            },
            testing: function() {
                this.searchName = "123123123";
            }
        }
    }
</script>