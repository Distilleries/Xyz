/**
 * This file/module contains all configuration for the build process.
 */
module.exports = {
    /**
     * The `build_dir` folder is where our projects are compiled during
     * development and the `compile_dir` folder is where our app resides once it's
     * completely built.
     */
    build_dir: 'public/assets/',
    build_css_dir: 'public/assets/css',
    build_js_dir: 'public/assets/js',
    build_image_dir: 'public/assets/img',
    build_bower_dir: 'bower_components',
    js_hint_file: '.jshintrc',
    js_default_file_generate: 'main.js',
    css_admin_concat_name: 'app.admin.min.css',

    /**
     * This is a collection of file patterns that refer to our app code (the
     * stuff in `src/`). These file paths are used in the configuration of
     * build tasks. `js` is all project javascript, less tests. `ctpl` contains
     * our reusable components' (`src/common`) template HTML files, while
     * `atpl` contains the same, but for our app's code. `html` is just our
     * main HTML file, `less` is our main stylesheet, and `unit` contains our
     * app's unit tests.
     */
    app_files: {
        js: [
            'bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js',
            'bower_components/jQuery-Validation-Engine/js/jquery.validationEngine.js',
            'bower_components/jquery.uniform/jquery.uniform.js',
            'bower_components/slimScroll/jquery.slimscroll.min.js',
            'bower_components/datatables/media/js/jquery.dataTables.js',
            'bower_components/bootstrap-confirmation2/bootstrap-confirmation.js',
            'bower_components/select2/select2.min.js',
            'bower_components/tinymce-dist/tinymce.jquery.js',
            'bower_components/tinymce-dist/plugins/**/*.min.js',
            'bower_components/tinymce-dist/themes/modern/theme.min.js',
            'bower_components/iCheck/icheck.js',
            'app/assets/admin/js/lib/*.js',
            'app/assets/admin/js/**/*.js'

        ],
        sass:[
            'app/assets/admin/sass/application.admin.scss'

        ],
        sass_watch: [
            'app/assets/admin/sass/**/*'
        ],
        css: [
            'bower_components/jQuery-Validation-Engine/css/validationEngine.jquery.css',
            'public/assets/css/application.admin.css'
        ],
        img: [
            'app/assets/admin/images/**/*'
        ],
        fonts:[
            'bower_components/bootstrap-sass/assets/fonts/bootstrap/*',
            'app/assets/admin/fonts/*'
        ],
        tinyMceCopySkeen:'bower_components/tinymce-dist/skins/**',
        totinyMceCopySkeen:'public/assets/js/skins'
    },

    version : [
        './bower.json',
        './composer.json',
        './package.json'
    ]
};