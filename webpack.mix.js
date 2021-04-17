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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')

    .copyDirectory('resources/assets', 'public/assets')
    .copyDirectory('resources/dist', 'public/dist')
    .copyDirectory('resources/favicon', 'public');
/*
.styles([
    'resources/dist/css/style.css',
], 'public/assets/css/index.css')
    .scripts([
        'resources/assets/js/jquery-3.3.1.min.js',
        'resources/assets/js/popper.min.js',
        'resources/assets/js/bootstrap.min.js',
        'resources/assets/js/magnific-popup.min.js',
        'resources/assets/js/owl.carousel.min.js',
        'resources/assets/js/scrollIt.min.js',
        'resources/assets/js/validator.min.js',
        'resources/assets/js/contact.js',
        'resources/assets/js/custom.js'], 'public/assets/js/index.js')*/
