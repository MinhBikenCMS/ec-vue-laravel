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

mix.scripts(['resources/assets/js/jquery-2.2.3.min.js', 'resources/assets/js/bootstrap.min.js',
    'resources/assets/js/jquery.mycart.js' ], 'public/js/app.js')
    .copy( 'resources/assets/images', 'public/images', false )
    .copy( 'resources/assets/fonts', 'public/fonts', false )
    .styles(['resources/assets/sass/bootstrap.min.css'], 'public/css/all.css')
    .js('resources/assets/js/app.js','public/js/vue.js' )
    .js('resources/assets/js/shopto.js','public/js/shopto.js' )
    .js('resources/assets/js/checkout.js','public/js/checkout.js' )
   .sass('resources/assets/sass/app.scss', 'public/css/app.css');
