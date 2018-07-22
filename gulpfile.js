var elixir = require('laravel-elixir');
elixir.config.sourcemaps = true;
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
    //we need to move the files to /build because of the versioning
    mix.copy('resources/assets/js/pages', 'public/js/pages');

    //Please run gulp --production for minified version
});