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
		},
		redirectPayment: function(data) {
			this.returnToPayments = true;
			this.paymentMessage = data;
		},
		redirectedToPayment: function(data) {
			this.returnToPayments = false;
			this.paymentMessage = "";
		},
		selectedSeat: function(data) {
			this.selectedSeat = data;
		}
	},
	data() {
		return {
			returnToPayments: false,
			paymentMessage: "",
			selectedSeat: 0
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
import SeatBuy from "./components/SeatBuy.vue";
import Menu from "./components/Menu.vue";

Vue.component('login', Login);
Vue.component('register', Register);
Vue.component('user-bar', UserBar);
Vue.component('seat-buy', SeatBuy);
Vue.component('menu', Menu);
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
