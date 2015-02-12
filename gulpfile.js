/*!
 * gulp
 * $ npm install gulp-ruby-sass gulp-autoprefixer gulp-minify-css gulp-jshint gulp-concat gulp-uglify gulp-imagemin gulp-notify gulp-rename gulp-livereload gulp-cache del --save-dev
 */

// Load plugins
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    livereload = require('gulp-livereload'),
    bower = require('gulp-bower'),
    git = require('gulp-git'),
    bump = require('gulp-bump'),
    filter = require('gulp-filter'),
    es = require('event-stream'),
    tag_version = require('gulp-tag-version');
    del = require('del');

var userConfig = require('./build.config.js');

/**
 * Method to copy files to another folder
 * @param src
 * @param dest
 * @returns {*}
 */
gulp.copy=function(src,dest){
    return gulp.src(src)
        .pipe(gulp.dest(dest));
};

/**
 * Build images
 * @param config
 */
gulp.imageBuild= function(config){
    return gulp.src(config.app_files.img)
        .pipe((imagemin({optimizationLevel: 3, progressive: true, interlaced: true})))
        .pipe(gulp.dest(config.build_image_dir));
};

/**
 * Build javascript
 * @param config
 */
gulp.jsBuild= function(config){
    return gulp.src(config.app_files.js)
        // .pipe(jshint(userConfig.js_hint_file))
        //.pipe(jshint.reporter('default'))
        .pipe(concat(config.js_default_file_generate))
        .pipe(gulp.dest(config.build_js_dir))
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest(config.build_js_dir));
};

/**
 * Generate the css part of the application
 * @param config
 * @returns {*}
 */
gulp.cssBuild= function(config){

    var vendorFiles = gulp.src(config.app_files.css).pipe(minifycss());
    var appFiles = gulp.src(config.app_files.sass)
        .pipe(sass({
            outputStyle: 'compressed',
            compass: true
        }));

    return es.concat(vendorFiles,appFiles)
        .pipe(concat(config.css_admin_concat_name))
        .pipe(autoprefixer('last 10 version'))
        .pipe(gulp.dest(config.build_css_dir))
        .pipe(gulp.dest(config.build_css_dir));
};

/**
 * Method to create tag and commit element for the version of assets application
 * @param importance
 * @returns {*}
 */
gulp.inc = function(importance) {
// get all the files to bump version in
    return gulp.src(userConfig.version)
        // bump the version number in those files
        .pipe(bump({type: importance}))
        // save it back to filesystem
        .pipe(gulp.dest('./'))
        // commit the changed version number
        .pipe(git.commit('bumps package version'))
        // read only one file to get the version number
        .pipe(filter('package.json'))
        // **tag it in the repository**
        .pipe(tag_version());
};

/**
 * Get the bower components
 */
gulp.task('bower', function () {
    return bower(userConfig.build_bower_dir);
});



// Styles
gulp.task('styles', ['css'], function () {
    gulp.start('fonts','tinymce');
    return notify({message: 'Styles task complete'});
});

// Css
gulp.task('css', function () {
    return gulp.cssBuild(userConfig.admin).pipe(gulp.cssBuild(userConfig.front));
});


// Scripts
gulp.task('scripts', function () {
    gulp.jsBuild(userConfig.admin);
    gulp.jsBuild(userConfig.front);
    return notify({message: 'Scripts task complete'});
});

// Images
gulp.task('images', function () {
    gulp.imageBuild(userConfig.admin);
    return gulp.imageBuild(userConfig.front);
});


//tinymce
gulp.task('tinymce', function () {

    var result;
    var files = userConfig.admin.app_files.copyfiles;
    for(var i in files){
        result = gulp.copy(files[i][0],files[i][1]);
    }

    files = userConfig.front.app_files.copyfiles;
    for(i in files){
        result = gulp.copy(files[i][0],files[i][1]);
    }
    return  result;
});


//fonts
gulp.task('fonts', function () {
    gulp.copy(userConfig.admin.app_files.fonts,userConfig.admin.build_font_dir);
    return gulp.copy(userConfig.front.app_files.fonts,userConfig.front.build_font_dir);

});

// Clean
gulp.task('clean', function (cb) {
    del([userConfig.base_asset], cb)
});


// Watch
gulp.task('watch', function () {

    // Watch .scss files
    gulp.watch(userConfig.admin.app_files.sass_watch, ['css']);
    gulp.watch(userConfig.admin.app_files.css, ['css']);
    gulp.watch(userConfig.front.app_files.sass_watch, ['css']);
    gulp.watch(userConfig.front.app_files.css, ['css']);

    // Watch .js files
    gulp.watch(userConfig.admin.app_files.js, ['scripts']);
    gulp.watch(userConfig.front.app_files.js, ['scripts']);

    // Watch image files
    gulp.watch(userConfig.admin.app_files.img, ['images']);
    gulp.watch(userConfig.front.app_files.img, ['images']);

    // Create LiveReload server
    livereload.listen();

    // Watch any files in dist/, reload on change
    gulp.watch([userConfig.base_asset + '**']).on('change', livereload.changed);

});




gulp.task('patch', function () {
    return gulp.inc('patch');
});
gulp.task('feature', function () {
    return gulp.inc('minor');
});
gulp.task('release', function () {
    return gulp.inc('major');
});


// Default task
gulp.task('default', ['clean','bower'], function () {
    gulp.start('styles', 'scripts', 'images');
});
