require('./bootstrap');

window.Vue = require('vue');

import config from './config'
import router from './router'
import App from './components/App.vue'

const app = new Vue({
    el: '#app',
    router,
   	template: '<app></app>',
   	components: { App }
});