require('./bootstrap');
import Vue from 'vue'
import vSelect from 'vue-select'

Vue.component('v-select', vSelect)
import 'vue-select/dist/vue-select.css';




Vue.component('welcome', require('./components/Welcome.vue').default);
Vue.component('list-component', require('./components/list').default);
Vue.component('users-list', require('./components/users-list').default);

const app = new Vue({
    el: '#app'
});

require('alpinejs');
