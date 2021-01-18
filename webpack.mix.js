const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js/app.js')
    .vue()
    .sass('resources/scss/admin-site.scss', 'public/css/admin-site.css')
    .sass('resources/scss/main-site.scss', 'public/css/main-site.css')
    .js('resources/js/parallax.min.js', 'public/js/parallax.min.js')
    .js('resources/js/script.js', 'public/js/script.js')
    .copy('resources/images', 'public/images')
    .copy('resources/fonts', 'public/fonts')
    .version();
