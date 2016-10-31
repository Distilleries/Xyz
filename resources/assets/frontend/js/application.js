import "babel-polyfill"
import Vue from 'vue'
import VueResource from 'vue-resource'


Vue.use(VueResource);



/**
 * Views
 */
import App from './views/App/App.vue'


new Vue({
    el: 'body',
    components: {
        'app': App
    }
});