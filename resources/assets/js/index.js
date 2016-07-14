import Vue from 'vue'
import resource from 'vue-resource'
require('bootstrap');
Vue.use(resource);
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');


import Events from "./components/Events.vue";
import EventView from "./components/EventView.vue";
import Login from "./components/Login.vue";
import Register from "./components/Register.vue";
import UserBar from "./components/UserBar.vue";

Vue.component('login', Login);
Vue.component('register', Register);
Vue.component('user-bar', UserBar);

var vm = new Vue({
    el: 'body',
    events: {
        loggedIn: function(data) {
            this.$broadcast('loggedIn', data);
        }
    }
});