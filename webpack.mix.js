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
// mix.copyDirectory('node_modules/font-awesome/fonts', 'public/fonts/font-awesome');

mix.js([
        'resources/js/app.js',
        'public/vendor/jquery/jquery-ui.js',
        'node_modules/jquery-validation/dist/jquery.validate.js',
        'public/vendor/ckeditor5/build/ckeditor.js',
        'resources/js/script.js',
      ], 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'public/css/app.css',
        'resources/sass/style.css'
      ], 'public/css/app.css')
    ;

mix.setPublicPath('public');
mix.setResourceRoot('../');

