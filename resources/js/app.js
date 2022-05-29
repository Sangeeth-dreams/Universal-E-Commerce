
require('./bootstrap');

// main.js
import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
import swal from 'sweetalert2';
window.Swal = swal;


import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)


Vue.use(VueSweetalert2);

window.Vue = require('vue').default;
import VueRouter from "vue-router";
Vue.use(VueRouter)



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('one-vue', require('./components/One.vue'));


import Dashboard from './components/admins/Dashboard'
import Admins from './components/admins/Admins.vue'


import CreateUser from './components/pages/CreateUser'


const routes = [



    //admin routes
    { path:'/home', component:Dashboard},     //Dashboard
    { path: '/admin/admin-users', component : Admins},  //to load Admins page
    

  ];


const router = new VueRouter({
    mode:'history',
    routes,
})


const app = new Vue({
    el: '#app',
    router,
    components:{
        CreateUser,
        Dashboard,
    },

    mounted() {
        console.log('mounted');
      }
});
