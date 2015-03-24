/**
 * This file/module contains all configuration for the build process.
 */
module.exports = {

    build_bower_dir: 'bower_components',
    js_hint_file: '.jshintrc',
    base_asset: 'public/assets',

    admin: {
        /**
         * The `build_dir` folder is where our projects are compiled during
         * development and the `compile_dir` folder is where our app resides once it's
         * completely built.
         */
        build_dir: 'public/assets/admin',
        build_css_dir: 'public/assets/admin/css',
        build_font_dir: 'public/assets/admin/fonts',
        build_js_dir: 'public/assets/admin/js',
        build_image_dir: 'public/assets/admin/img',
        js_default_file_generate: 'app.admin.js',
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
                'bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js',
                'bower_components/select2/select2.min.js',
                'bower_components/tinymce-dist/tinymce.jquery.js',
                'bower_components/tinymce-dist/plugins/**/*.min.js',
                'bower_components/tinymce-dist/themes/modern/theme.min.js',
                'bower_components/jquery-locationpicker-plugin/src/locationpicker.jquery.js',
                'bower_components/iCheck/icheck.js',
                'bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.min.js',
                'vendor/distilleries/datatable-builder/src/resources/assets/js/**.js',
                'vendor/distilleries/expendable/src/resources/assets/admin/js/lib/*.js',
                'vendor/distilleries/expendable/src/resources/assets/admin/js/**/*.js',
                'resources/assets/admin/js/**/*.js'

            ],
            sass: [
                'resources/assets/admin/sass/application.admin.scss'

            ],
            sass_watch: [
                'resources/assets/admin/sass/**/*'
            ],
            css: [
                'bower_components/jQuery-Validation-Engine/css/validationEngine.jquery.css',
                'bower_components/bootstrap-datepicker/css/datepicker.css'
            ],
            img: [
                'vendor/distilleries/expendable/src/resources/assets/admin/images/**/*',
                'resources/assets/admin/images/**/*'
            ],
            fonts: [
                'bower_components/bootstrap-sass/assets/fonts/bootstrap/*',
                'resources/assets/admin/fonts/*'
            ],

            copyfiles: [
                [
                    ['bower_components/tinymce-dist/skins/**'],
                    'public/assets/admin/js/skins'
                ]
            ]
        }
    },

    front: {
        /**
         * The `build_dir` folder is where our projects are compiled during
         * development and the `compile_dir` folder is where our app resides once it's
         * completely built.
         */
        build_dir: 'public/assets/front',
        build_css_dir: 'public/assets/front/css',
        build_font_dir: 'public/assets/front/fonts',
        build_js_dir: 'public/assets/front/js',
        build_image_dir: 'public/assets/front/img',
        js_default_file_generate: 'app.js',
        css_admin_concat_name: 'app.min.css',

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

                'resources/assets/front/js/**/*.js'

            ],
            sass: [
                'resources/assets/front/sass/application.scss'

            ],
            sass_watch: [
                'resources/assets/front/sass/**/*'
            ],
            css: [
                'public/assets/front/css/application.css'
            ],
            img: [
                'resources/assets/front/images/**/*'
            ],
            fonts: [
                'bower_components/bootstrap-sass/assets/fonts/bootstrap/*'
            ],

            copyfiles: [

            ]
        }
    },

    version : [
        './bower.json',
        './composer.json',
        './package.json'
    ]
};