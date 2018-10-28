
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('jquery-ui');
window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);


import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue);

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import VuejsDialog from "vuejs-dialog"
import VuejsDialogMixin from "vuejs-dialog/dist/vuejs-dialog-mixin.min.js"
import 'vuejs-dialog/dist/vuejs-dialog.min.css'
Vue.use(VuejsDialog);
import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'

// optional set default imeout, the default is 10000 (10 seconds).
Vue.use(Toaster, {timeout: 3000});



import App from './components/App.vue';
import Home from './components/home.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/home',
            name: 'home',
            component: Home
        },
    ],
});


/*
    Import Componets
 */



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const app = new Vue({
    el: '#app',
    components: { App },
    router,
});

