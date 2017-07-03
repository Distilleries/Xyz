import userApi from '../api/user';
import userTransformer from '../transformers/user';

export default {

    state: {
        all: []
    },

    // Mutations does not accept ASYNC operations, use actions
    mutations: {
        _setUsers(state, payload) {
            state.all = payload;
        },

        addUser(state, payload) {
            let user = userTransformer.fetch(payload);

            state.all.push(user);
            //userApi.add(user);
        }
    },

    actions: {
        setUsers({ commit }, payload) {
            userApi.all().then((response) => {
                commit('_setUsers', response.data);
            }).catch((error) => {
                console.warn(error, payload);
            });
        }
    },

    getters: {
        countAllUsers(state) {
            return state.all.length;
        }
    }

}