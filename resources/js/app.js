require('./bootstrap');
import Vue from 'vue'
Vue.component('welcome', require('./components/Welcome.vue').default);
Vue.component('list-component', require('./components/list').default);

const app = new Vue({
    el: '#app'
});

require('alpinejs');
