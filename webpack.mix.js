const mix = require('laravel-mix');
const path = require('path');
const buildConfig = require('./webpack.config.json');

for (let src in buildConfig.copy) {
    if (buildConfig.copy.hasOwnProperty(src)) {
        mix.copyDirectory(src, buildConfig.copy[src]);
    }
}


mix
    .styles(buildConfig.backend.styles, 'public/assets/backend/styles.css')
    .sass('resources/assets/backend/sass/app.scss', 'public/assets/backend/app.css')
    .scripts(buildConfig.backend.scripts, 'public/assets/backend/scripts.js')
    .js('resources/assets/backend/js/main.js', 'public/assets/backend/app.js')

    .styles(buildConfig.frontend.styles, 'public/assets/frontend/styles.css')
    .sass('resources/assets/frontend/sass/app.scss', 'public/assets/frontend/app.css')
    .scripts(buildConfig.frontend.scripts, 'public/assets/frontend/scripts.js')
    .js('resources/assets/frontend/js/main.js', 'public/assets/frontend/app.js');

if (mix.config.inProduction) {
    mix.version();
}