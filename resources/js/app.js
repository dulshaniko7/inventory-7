

require('./bootstrap');

window.Vue = require('vue');

import router from "./router"
import MainApp from "./MainApp"

import User from './helpers/User'
window.User = User

import Notification from './helpers/Notification'
window.Notification = Notification
//sweet alert

import Swal from 'sweetalert2'
window.Swal = Swal

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Toast = Toast

const app = new Vue({
    el: '#app',
    router,
    components: {
        MainApp
    }

});
