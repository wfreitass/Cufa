const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.webpackConfig({
    stats: {
        children: true,
    },
});

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/darkModeBootstrap.js','public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

mix.postCss('resources/views/login/css/style.css', 'public/css/login')
    .sourceMaps();

mix.copyDirectory('resources/views/elegant/fonts','public/fonts')
    .copyDirectory('resources/views/elegant/img','public/image/elegant')
    .postCss('resources/views/elegant/css/style.css', 'public/css/layout')
    .js('resources/views/elegant/js/script.js', 'public/js/layout')
    .js('resources/views/elegant/plugins/chart.min.js', 'public/js/layout')
    .copyDirectory('resources/views/elegant/plugins/feather.min.js', 'public/js/layout')
    .sourceMaps();
