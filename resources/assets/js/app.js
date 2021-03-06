
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
/*
Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
*/

import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from 'axios';
import AppView from './components/App.vue'
import routes from './routes'
import FormError from './components/FormError.vue';

window.axios = axios;

Vue.use(VueRouter);
Vue.component('form-error', FormError);

window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};
/*
window.axios.defaults.validateStatus = function (status) {
    //return status >= 200 && status < 500; // default
};
*/
const router = new VueRouter({
    routes: routes
});

new Vue({
    el: '#app',
    router: router,
    render: h => h(AppView),
    components: {
        FormError
    }
});