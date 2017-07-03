require('babel-polyfill');

import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './app/routes';
import store from './app/data/store';
import App from './app/index.vue';

Vue.use(VueRouter);

export const router = new VueRouter({
    routes,
});

Vue.router = router;

export default {
    store,
    router,
    render: h => h(App)
};