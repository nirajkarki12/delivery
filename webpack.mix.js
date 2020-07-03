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
        'public/plugins/jquery-ui/jquery-ui.min.js',
        'node_modules/jquery-validation/dist/jquery.validate.js',
        'public/plugins/ckeditor5/build/ckeditor.js',
        'resources/js/script.js',
      ], 'public/js')
	.js('node_modules/popper.js/dist/popper.js', 'public/js').sourceMaps()
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'public/css/app.css',
		 'public/plugins/jquery-ui/jquery-ui.min.css',
		 'public/template/css/icons.css',
		 'public/template/css/style.css',
		 'resources/sass/style.css'
      ], 'public/css/app.css')
	.styles('public/template/css/style.css.map', 'public/css/style.css.map')
    ;

mix.setPublicPath('public');
mix.setResourceRoot('../');


