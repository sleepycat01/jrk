const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
<<<<<<< HEAD
 | for your Laravel application. By default, we are compiling the Sass
=======
 | for your Laravel applications. By default, we are compiling the CSS
>>>>>>> c1eb2b18879cec9baeddaf79fa43f0f999ed9a2a
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
<<<<<<< HEAD
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
=======
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
>>>>>>> c1eb2b18879cec9baeddaf79fa43f0f999ed9a2a
