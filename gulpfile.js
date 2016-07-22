var elixir = require('laravel-elixir');
require('laravel-elixir-vueify');
var userConfig = require('./build.config.js');


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
        mix
            .sass(config.app_files.sass, config.assetsPath + '/css')
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


