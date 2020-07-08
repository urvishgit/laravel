const mix = require('laravel-mix');
const webpack = require('webpack');
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
  plugins: [
    new webpack.SourceMapDevToolPlugin({
      exclude: ['popper.js']
    })
  ]
});

/*
 * For Frontend Js & css
 *
 */
mix.js('resources/js/app.js', 'public/js').version();
mix.sass('resources/sass/app.scss', 'public/css').version();

/*
 * For Admin Js & css
 *
 */
mix.js('resources/js/admin/app.js', 'public/js/admin').version();
mix.sass('resources/sass/admin/app.scss', 'public/css/admin').version();