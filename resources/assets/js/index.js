import Vue from 'vue';
import resource from 'vue-resource';
import VueRouter from 'vue-router';
require('bootstrap');
Vue.use(resource);
Vue.use(VueRouter);
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

var App = Vue.extend({
    events: {
        loggedIn: function(data) {
            this.$broadcast('loggedIn', data);
        }
    }
});

var router = new VueRouter();
import Events from "./components/Events.vue";
import EventView from "./components/EventView.vue";
import Login from "./components/Login.vue";
import Register from "./components/Register.vue";
import UserBar from "./components/UserBar.vue";
import Menu from "./components/Menu.vue";
import Index from "./components/Index.vue";

Vue.component('login', Login);
Vue.component('register', Register);
Vue.component('user-bar', UserBar);
Vue.component('menu', Menu);
Vue.component('index', Index);

var vm = new Vue({
    el: 'body',
    events: {
        loggedIn: function(data) {
            this.$broadcast('loggedIn', data);
        }
    }
});

/*router.map({
    '/': {
        component: Index,
        name: 'index',
    }
});

router.start(App, 'body');*/
