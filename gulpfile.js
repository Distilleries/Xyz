/*!
 * gulp
 * $ npm install gulp-ruby-sass gulp-autoprefixer gulp-minify-css gulp-jshint gulp-concat gulp-uglify gulp-imagemin gulp-notify gulp-rename gulp-livereload gulp-cache del --save-dev
 */

// Load plugins
var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
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

gulp.task('bower', function () {
    return bower(userConfig.build_bower_dir);
});

// Styles
gulp.task('styles',['sass'], function () {

    return gulp.src(userConfig.app_files.css)
        .pipe(concat(userConfig.css_admin_concat_name))
        .pipe(minifycss())
        .pipe(gulp.dest(userConfig.build_css_dir));
});


gulp.task('sass', function () {
   return  gulp.src(userConfig.app_files.sass)
        .pipe(sass({style: 'expanded'}))
        .on('error', function (err) {
            console.log(err.message)
        })
        // .pipe(autoprefixer('last 10 versions'))
        .pipe(gulp.dest(userConfig.build_css_dir))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(userConfig.build_css_dir));
});

// Scripts
gulp.task('scripts', function () {
    return gulp.src(userConfig.app_files.js)
        // .pipe(jshint(userConfig.js_hint_file))
        //.pipe(jshint.reporter('default'))
        .pipe(concat(userConfig.js_default_file_generate))
        .pipe(gulp.dest(userConfig.build_js_dir))
        .pipe(rename({suffix: '.min'}))
       // .pipe(uglify())
        .pipe(gulp.dest(userConfig.build_js_dir))
        .pipe(notify({message: 'Scripts task complete'}));
});

// Images
gulp.task('images', function () {
    return gulp.src(userConfig.app_files.img)
        .pipe((imagemin({optimizationLevel: 3, progressive: true, interlaced: true})))
        .pipe(gulp.dest(userConfig.build_image_dir));
});

gulp.task('tinymce', function () {
    return gulp.src(userConfig.app_files.tinyMceCopySkeen)
        .pipe(gulp.dest(userConfig.app_files.totinyMceCopySkeen));
});
gulp.task('fonts', function () {
    return gulp.src(userConfig.app_files.fonts)
        .pipe(gulp.dest('public/assets/css/fonts'));
});

// Clean
gulp.task('clean', function (cb) {
    del([userConfig.build_css_dir, userConfig.build_js_dir, userConfig.build_image_dir], cb)
});


// Watch
gulp.task('watch', function () {

    // Watch .scss files
    gulp.watch(userConfig.app_files.sass_watch, ['styles']);
    gulp.watch(userConfig.app_files.css, ['styles']);

    // Watch .js files
    gulp.watch(userConfig.app_files.js, ['scripts']);

    // Watch image files
    gulp.watch(userConfig.app_files.ing, ['images']);

    // Create LiveReload server
    livereload.listen();

    // Watch any files in dist/, reload on change
    gulp.watch([userConfig.build_dir + '**']).on('change', livereload.changed);

});


function inc(importance) {
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
}

gulp.task('patch', function () {
    return inc('patch');
});
gulp.task('feature', function () {
    return inc('minor');
});
gulp.task('release', function () {
    return inc('major');
});


// Default task
gulp.task('generate_style', ['styles'], function () {
    gulp.start('fonts','tinymce');
});

// Default task
gulp.task('default', ['clean'], function () {
    gulp.start('bower', 'generate_style', 'scripts', 'images');
});
