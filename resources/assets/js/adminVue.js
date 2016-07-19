import Vue from 'vue';
import resource from 'vue-resource';
require('bootstrap');
Vue.use(resource);
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
import UserIndex from "./components/admin/UserIndex.vue";
import UserView from "./components/admin/UserView.vue";

Vue.component('user-index', UserIndex);
Vue.component('user-view', UserView);
var vm = new Vue({
    el: 'body'
});
