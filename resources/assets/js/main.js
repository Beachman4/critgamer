import Vue from 'vue'
import resource from 'vue-resource'
import VueRouter from 'vue-router'
Vue.use(resource);
Vue.use(VueRouter);
var App = Vue.extend();
var router = new VueRouter();




import Events from "./components/Events.vue";
import EventView from "./components/EventView.vue";
//import EventsCalendar from "./components/EventsCalendar.vue";

/*
var vm = new Vue({
	el: "#app",

	components: {Events}
});*/

router.map({
	'/events': {
		component: Events
	},
	'/events/:event_id': {
		component: EventView
	}
});

router.start(App, '#app');
