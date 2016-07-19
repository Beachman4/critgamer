<template>
	<div class="row upcoming-border">
		<div class="col-lg-12">
			<h1>Upcoming Events</h1>
		</div>
	</div>
	<div class="row" style="margin-top: 3rem;">
		<div class="col-lg-12">
			<div class="row">
				<div :class="['col-lg-4','col-md-12','event', getClass(event)]" @click="eventPage(event)" track-by="$index" v-for="event in upcomingEvents">
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-12">
									<img src="/assets/img/better_brand.png" style="width: 100%">
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<a href="/events/{{ event.id }}"><h5>{{ event.name }}</h5></a>
								</div>
							</div>
							<div class="row info_panel">
								<div class="col-lg-12">
									<div class="row">
										<div class="col-lg-12">
											<p>Location: {{ event.location }}</p>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<p>Address: {{ event.address }}, {{ event.city }}, {{ event.state }} {{event.zip }}</p>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<p>Start: {{ parseDate(event.start) }}</p>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<p>End: {{ parseDate(event.end) }}</p>
										</div>
									</div><i class="fa fa-user fa-inverse"></i><p style="display: inline; margin-left: 5px;">{{ event.bought_seats }} / {{ event.total_seats }} Seats Filled</p>
									<progress class="progress progress-striped" :value="event.bought_seats" :max="event.total_seats"></progress>
								</div>
							</div>
						</div>
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
			upcomingEvents: [],
			completedEvents: []
		}
	},
	ready() {
		this.fetchEvents();
		this.socket();
	},
	computed: {
		classNames: function() {

		},
		test: function() {
			return this.bought_seats;
		}
	},
	methods: {
		getClass: function(event) {
			var className = event.className;
			if (className == 'undefined') {
				return "";
			} else {
				return className;
			}
		},
		socket: function() {
			$.getScript('http://localhost:3000/socket.io/socket.io.js');

			var socket = io('http://localhost:3000');
			socket.on('main:App\\Events\\SeatWasBought', function(message) {
				this.recount(message.event_id);
			}.bind(this));
		},
		recount: function(id) {
			this.$http.get('/api/events/countSeats/'+id).then((response) => {
				console.log(response);
				for(var i = 0; i < this.upcomingEvents.length; i++) {
					if (this.upcomingEvents[i].id == parseInt(id)) {
						var event = this.upcomingEvents[i];
						event.bought_seats = parseInt(response.text());
					}
				}
			});
		},
		fetchEvents: function() {
			this.$http.get('/api/events').then(function(response) {
				this.$set('upcomingEvents', response.json().upcoming);
				this.$set('completedEvents', response.json().completed);
			}.bind(this));
		},
		eventPage: function(event) {
			this.$router.go({ name: 'event-view', params: { event_id: event.id }});
		},
		parseDate: function(date) {
			var date = moment(date);
			return date.format('dddd, MMMM Do YYYY, h:mm:ss a');
		}
	}
}
</script>

<style>
	.upcoming-border {
		border-bottom: 1px solid #fff;
	}
	.event {
		background-color: #1C222C;
		padding: 2rem;
		cursor: pointer;
		border: 1px solid transparent;
	}
	.info_panel {
		padding-top: 3rem;
		border-top: 1px solid #fff;
	}
	.event:hover {
	    box-shadow: 0 0 10px #000;
    	border: 1px solid #1380F0;
	}
	.event .row {
		//margin-top: 2rem;
	}
</style>