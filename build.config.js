module.exports = {
    frontend: {
        publicPath: 'public/assets/frontend',
        app_files: {
            script: [
            ],
            js: 'resources/assets/frontend/js/main.js',
            sass: 'resources/assets/frontend/sass/application.scss',
            css: [
                //
            ],
            copyfiles: [
                [
                    ['resources/assets/frontend/svg'],
                    'public/assets/frontend/svg'
                ],
                [
                    ['resources/assets/frontend/fonts'],
                    'public/assets/frontend/fonts'
                ],
                [
                    ['resources/assets/frontend/images'],
                    'public/assets/frontend/images'
                ]
            ]
        }
    },
    backend: {
        publicPath: 'public/assets/backend',
        app_files: {
            scripts: [

                'vendor/distilleries/datatable-builder/src/resources/assets/js/**/*.js',
                'vendor/distilleries/expendable/src/resources/assets/admin/js/**/*.js'
            ],
            js: 'resources/assets/backend/js/main.js',
            sass: 'resources/assets/backend/sass/application.admin.scss',
            css: [
                'bower_components/bootstrap-datepicker/css/datepicker.css',
                'bower_components/font-awesome/css/font-awesome.min.css'
            ],
            copyfiles: [
                [
                    ['bower_components/tinymce-dist/skins'],
                    'public/assets/backend/js/skins'
                ],
                [
                    [
                        'vendor/distilleries/expendable/src/resources/assets/admin/images',
                        'resources/assets/backend/images'
                    ],
                    'public/assets/backend/images'
                ],
                [
                    [
                        'bower_components/bootstrap-sass/assets/fonts/bootstrap',
                        'bower_components/font-awesome/fonts',
                        'resources/assets/backend/fonts'
                    ],
                    'public/assets/backend/fonts'
                ]
            ]
        }
    }
};