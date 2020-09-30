require('./bootstrap');
window.axios = require('axios');
window.Vue = require('vue');
import App from './App.vue';

const app = new Vue({
    el: '#app',
    render: h => h(App)
});

export default app;