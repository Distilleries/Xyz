//
// VueJS
//

import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

//
// Modules
//

import user from './stores/user';

//
// Initialization
//

export default new Vuex.Store({

    modules: {
        user
    }

});