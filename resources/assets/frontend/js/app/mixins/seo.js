export default {

    methods: {
        seo(seo) {
            document.querySelector('meta[property=\'og:url\']').content = document.location.href;

            if (typeof seo.title !== 'undefined') {
                document.querySelector('meta[property=\'og:title\']').content = seo.title;
                document.querySelector('meta[name=\'twitter:title\']').content = seo.title;
            }

            if (typeof seo.description !== 'undefined') {
                document.querySelector('meta[name=\'description\']').content = seo.description;
                document.querySelector('meta[property=\'og:description\']').content = seo.description;
                document.querySelector('meta[name=\'twitter:description\']').content = seo.description;
            }

            if (typeof seo.image !== 'undefined') {
                const baseUrl = document.location.origin;
                document.querySelector('meta[property=\'og:image\']').content = baseUrl + seo.image;
                document.querySelector('meta[name=\'twitter:image\']').content = baseUrl + seo.image;
            }
        }
    }

}