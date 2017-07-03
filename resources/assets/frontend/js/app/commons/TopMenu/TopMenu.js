import localeMixin from '../../mixins/locale';

export default {

    name: 'TopMenu',

    mixins: [
        localeMixin
    ],

    props: {
        view: {
            type: String,
            required: true
        },
    },

    data() {
        return {
            //
        };
    },

    mounted() {
        // Debug info (component and store)
        console.log('TopMenu component is mounted');
        console.log('Store state from TopMenu', this.$store.state);
        console.log('Store getters from TopMenu (countAllUsers)', this.$store.getters.countAllUsers);
    },

    methods: {
        //
    },

    computed: {
        lastAddedUserEmail() {
            const usersCount = this.$store.state.user.all.length;
            if (usersCount === 0) {
                return '';
            }

            return this.$store.state.user.all[usersCount - 1].email;
        }
    }

}