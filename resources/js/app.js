

require('./bootstrap');

window.Vue = require('vue');

import router from "./router"
import MainApp from "./MainApp"

import User from './helpers/User'

window.User = User

const app = new Vue({
    el: '#app',
    router,
    components: {
        MainApp
    }

});
