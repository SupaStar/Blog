const mix = require('laravel-mix');
//npm run dev
//php artisan migrate:refresh --seed
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
/*DB_CONNECTION=mysql
DB_HOST=remotemysql.com
DB_PORT=3306
DB_DATABASE=706LifRzVb
DB_USERNAME=706LifRzVb
DB_PASSWORD=MFruMsR2j0*/

//Del sistema
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/Css');
//Propios
mix.styles([
    'resources/css/bulma/bulma.css',
    'resources/css/bulma/bulma-pageloader.min.css',
    'resources/css/Otros/estilos.css'
], 'public/css/all.css');
mix.styles([
    'resources/css/Otros/usosLimitados.css'
],'public/css/usosL.css');
mix.js('resources/js/MisJs.js', 'public/js/scripts.js');
mix.js('resources/js/nuevaP.js', 'public/js/nuevaP.js');
mix.js('resources/js/verPerfil.js', 'public/js/verPerfil.js');

