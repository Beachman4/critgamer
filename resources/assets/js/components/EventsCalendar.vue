<template>
	<div class="row">
		<div class="col-lg-12">
			<div id="calendar"></div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			events: [],
			closestEvent: []
		};
	},
	ready() {
		this.fetchEvents();
		this.initCalendar();
	},
	methods: {
		fetchEvents: function() {
			this.$http.get('/api/events-calendar').then(function(response) {
				this.$set('events', response.json().data);
				this.$set('closestEvent', response.json().closest);
			}.bind(this));
		},
		initCalendar: function() {
			var vm = this;
			this.$nextTick(function() {
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					events: vm.events
				});
			});
		}
	}
}
</script>