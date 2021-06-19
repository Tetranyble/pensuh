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
    .copyDirectory('resources/favicon', 'public')
    .copyDirectory('resources/js/scanner.min.js', 'public/js')
    .styles([
        'resources/assets/css/pensuh/bootstrap.min.css',
        'resources/assets/css/pensuh/owl.carousel.min.css',
        'resources/assets/css/pensuh/magnific-popup.css',
        'resources/assets/css/pensuh/icomoon.css',
        'resources/assets/css/pensuh/icofont.min.css',
        'resources/assets/css/pensuh/animate.css',
        'resources/assets/css/pensuh/style.css',
        'resources/assets/css/pensuh/responsive.css'], 'public/assets/css/index.css')
    .scripts([
        'resources/assets/js/pensuh/jquery-3.3.1.min.js',
        'resources/assets/js/pensuh/popper.min.js',
        'resources/assets/js/pensuh/bootstrap.min.js',
        'resources/assets/js/pensuh/magnific-popup.min.js',
        'resources/assets/js/pensuh/owl.carousel.min.js',
        'resources/assets/js/pensuh/scrollIt.min.js',
        'resources/assets/js/pensuh/validator.min.js',
        // 'resources/assets/js/pensuh/contact.js',
        'resources/assets/js/pensuh/custom.js'], 'public/assets/js/index.js');
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
