var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    //associa todos os estilos em um unico arquivo
    mix.styles([
        'bootstrap.min.css',
        'font-awesome.min.css',
        'prettyPhoto.css',
        'animate.css',
        'main.css',
        'responsive.css'
    ], 'public/css/all.css');

    // Associa todos os scripts em um unico arquivo
    mix.scripts([
        'jquery.js',
        'bootstrap.min.js',
        'jquery.scrollUp.min.js',
        'price-range.js',
        'jquery.prettyPhoto.js',
        'main.js'
    ], 'public/js/all.js');

    // gera uma nova versao de all.css e all.js cada vez que o gulp é executado
    mix.version(['css/all.css','js/all.js']);

    mix.copy('resources/assets/fonts','public/build/fonts')
});
