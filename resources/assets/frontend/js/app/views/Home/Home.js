import Teaser from './partials/Teaser/Teaser.vue';
import TopMenu from '../../commons/TopMenu/TopMenu.vue';
import seoMixin from '../../mixins/seo';

export default {

    name: 'Home',

    mixins: [
        seoMixin
    ],

    components: {
        Teaser,
        TopMenu
    },

    data() {
        return {
            email: 'bbs@boilerplate.dev'
        };
    },

    mounted() {
        // Debug info (component and store)
        console.log('Home view is mounted');
        console.log('Store state from Home', this.$store.state);

        // Test seoMixin
        this.seo({
            title: 'BBS Boilerplate',
            description: 'Overridden description'
        });

        // From modules/api/user (ASYNC OPERATION)
        this.$store.dispatch('setUsers');
    },

    methods: {
        addUser(event) {
            event.preventDefault();

            // Add user from v-model
            this.$store.commit('addUser', {
                email: this.email,
                role_id: this.randomInteger(1, 4)
            });
        },

        randomInteger(min, max) {
            min = Math.ceil(min);
            max = Math.floor(max);

            return Math.floor(Math.random() * (max - min)) + min;
        }
    },

    computed: {
        usersCount() {
            // From modules/user
            return this.$store.getters.countAllUsers;
        }
    }

}