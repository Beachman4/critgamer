var Vue = require('vue');
Vue.use(require('vue-resource'));

import Events from "./components/Events.vue";
//import EventsCalendar from "./components/EventsCalendar.vue";

var vm = new Vue({
	el: "#app",

	components: {Events}
});