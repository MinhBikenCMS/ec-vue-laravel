import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import App from './views/App'
import Checkout from './views/Checkout'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/checkout',
            name: 'checkout',
            component: Checkout
        }
    ]
});

const app = new Vue({
    el: '#app',
    components: { App },
    router
});