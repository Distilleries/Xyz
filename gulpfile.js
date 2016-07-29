var elixir = require('laravel-elixir');
require('laravel-elixir-vueify');
var userConfig = require('./build.config.js');

var gulp = require('gulp'),
    git = require('gulp-git'),
    filter = require('gulp-filter'),
    tag_version = require('gulp-tag-version'),
    bump = require('gulp-bump');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */


for (var i in userConfig.site) {

    var config = userConfig.site[i];

    elixir.config.assetsPath = config.assetsPath;
    elixir.config.publicPath = config.publicPath;
    elixir(function (mix) {
        config.app_files.css.push(config.assetsPath + '/css');
        config.app_files.js.push(config.assetsPath + '/js/application.js');
        config.app_files.css.push(config.publicPath + '/css/app.css');

        mix
            .sass(config.app_files.sass,config.publicPath + '/css/app.css')
            .styles(config.app_files.css, config.publicPath + '/css', './')
            .copy(config.assetsPath + '/images', config.publicPath + '/images')
            .browserify('application.js')
            .scripts(config.app_files.js, config.publicPath + '/js', './');

        for (var j in config.app_files.copyfiles) {
            mix.copy(config.app_files.copyfiles[j][0], config.app_files.copyfiles[j][1]);
        }
        mix.version(['css/all.css', 'js/all.js']);

    });

}

elixir(function (mix) {
    var obj = {};
    if (userConfig.proxy.domain != '') {
        obj.proxy = userConfig.proxy.domain;
    }

    if (userConfig.proxy.enabled) {
        mix.browserSync(obj);
    }

});


gulp.inc = function (importance) {
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


gulp.task('patch', function () {
    return gulp.inc('patch');
});
gulp.task('feature', function () {
    return gulp.inc('minor');
});
gulp.task('release', function () {
    return gulp.inc('major');
});



