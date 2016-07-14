import Vue from 'vue'
import resource from 'vue-resource'
import VueRouter from 'vue-router'
require('bootstrap');
Vue.use(resource);
Vue.use(VueRouter);
var App = Vue.extend({
	events: {
		loggedIn: function(data) {
			this.$broadcast('loggedIn', data);
		}
	}
});
var router = new VueRouter();
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');


import Events from "./components/Events.vue";
import EventView from "./components/EventView.vue";
import Login from "./components/Login.vue";
import Register from "./components/Register.vue";
import UserBar from "./components/UserBar.vue";

Vue.component('login', Login);
Vue.component('register', Register);
Vue.component('user-bar', UserBar);
router.map({
	'/': {
		component: Events,
		name: 'event_index',
	},
	'/:event_id': {
		component: EventView,
		name: 'event-view'
	}
});

router.start(App, 'body');
