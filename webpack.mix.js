const mix = require('laravel-mix');
const postCssImport = require('postcss-import');
const tailwindcss = require('tailwindcss');
const autoprefixer = require('autoprefixer');

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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        postCssImport,
        tailwindcss,
        autoprefixer,
    ])
    .browserSync({
        proxy: 'localhost:8000', // Change this to your local development URL
        files: [
            'resources/views/**/*.blade.php',
            'resources/css/**/*.css',
            'resources/js/**/*.js',
            'public/css/**/*.css',
            'public/js/**/*.js'
        ]
    });

if (mix.inProduction()) {
    mix.version();
} else {
    mix.sourceMaps();
}
