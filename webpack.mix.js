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

//  module.exports = {
//     mode: 'production',
//     resolve: {
//         alias: {
//             vue: process.env.NODE_ENV == 'production' ? 'vue/dist/vue.min.js' : 'vue/dist/vue.js'
//         }
//     }
// }

mix.js('resources/js/app.js', 'dist/js')
   .sass('resources/sass/app.scss', 'dist/css');

const path = require('path');