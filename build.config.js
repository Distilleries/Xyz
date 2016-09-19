module.exports = {
    proxy:{
        enabled:true,
        domain:'http://xyz.dev'
    },
    site: {
        front: {
            assetsPath: 'resources/assets/frontend',
            publicPath: 'public/assets/frontend',

            app_files: {
                js: [
                    'bower_components/vue/dist/vue.js',
                    'bower_components/vue-resource/dist/vue-resource.js'
                ],

                sass: ['application.scss'],

                css: [
                    'bower_components/font-awesome/css/font-awesome.css'
                ],
                copyfiles: [
                    [
                        ['resources/assets/frontend/svg'],
                        'public/assets/frontend/svg'
                    ],
                    [
                        ['bower_components/font-awesome/fonts', 'resources/assets/front/fonts'],
                        'public/assets/frontend/fonts'
                    ]
                ]
            }
        },
        admin: {
            assetsPath: 'resources/assets/backend',
            publicPath: 'public/assets/backend',
            app_files: {
                js: [
                    'bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js',
                    'bower_components/bootstrap-confirmation2/bootstrap-confirmation.min.js',
                    'bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js',
                    'bower_components/jQuery-Validation-Engine/js/jquery.validationEngine.js',
                    'bower_components/datatables/media/js/jquery.dataTables.min.js',
                    'bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js',
                    'bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.min.js',
                    'bower_components/jquery-locationpicker-plugin/dist/locationpicker.jquery.min.js',
                    'bower_components/jquery.uniform/jquery.uniform.min.js',
                    'bower_components/iCheck/icheck.min.js',
                    'bower_components/jstree/dist/jstree.min.js',
                    'bower_components/placeholders/dist/placeholders.jquery.min.js',
                    'bower_components/select2/select2.min.js',
                    'bower_components/slimScroll/jquery.slimscroll.min.js',
                    'bower_components/tinymce-dist/tinymce.jquery.min.js',
                    'bower_components/tinymce-dist/plugins/**/*.min.js',
                    'bower_components/tinymce-dist/themes/modern/theme.min.js',
                    'bower_components/vue/dist/vue.min.js',
                    'bower_components/vue-resource/dist/vue-resource.min.js',
                    'vendor/distilleries/datatable-builder/src/resources/assets/js/**/*.js',
                    'vendor/distilleries/expendable/src/resources/assets/admin/js/**/*.js'
                ],
                sass: ['application.admin.scss'],
                css: [
                    'bower_components/jQuery-Validation-Engine/css/validationEngine.jquery.css',
                    'bower_components/bootstrap-datepicker/css/datepicker.css',
                    'bower_components/font-awesome/css/font-awesome.min.css'
                ],
                copyfiles: [
                    [
                        ['bower_components/tinymce-dist/skins'],
                        'public/assets/backend/js/skins'
                    ],
                    [
                        ['resources/moximanager'],
                        'public/assets/moxiemanager'
                    ],
                    [
                        ['vendor/distilleries/expendable/src/resources/assets/admin/images'],
                        'public/assets/backend/images'
                    ],
                    [
                        [
                            'bower_components/bootstrap-sass/assets/fonts/bootstrap',
                            'bower_components/font-awesome/fonts',
                            'resources/assets/front/fonts'
                        ],
                        'public/assets/backend/fonts'
                    ]
                ]
            }
        }
    },

    version: [
        './bower.json',
        './package.json'
    ]

};