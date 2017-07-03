export default {

    methods: {
        i18n(key) {
            if ((typeof window.App.i18n === 'undefined') || (typeof window.App.i18n[key] !== 'string')) {
                return 'i18n.' + key;
            }

            return window.App.i18n[key];
        }
    }

}