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

    // Compile the SCCS files. and place them in public/css/<filename>
    mix.sass('404.scss');

    // Compile the LESS files. and place them in public/css/<filename>
    mix.less('bootstrap.less');

    // Copy fonts to the public DIR.
    // mix.copy('./resources/assets/fonts/glyphicons-regular.eot', 'public/fonts/glyphicons-regular.eot');
    // mix.copy('./resources/assets/fonts/glyphicons-regular.tff', 'public/fonts/glyphicons-regular.tff');
    // mix.copy('./resources/assets/fonts/glyphicons-regular.svg', 'public/fonts/glyphicons-regular.svg');
    // mix.copy('./resources/assets/fonts/glyphicons-regular.woff', 'public/fonts/glyphicons-regular.woff');
    // mix.copy('resources/assets/fonts/glyphicons-regular.woff2', 'public/fonts/glyphicons-regular.woff2');

    // Cache busting
    mix.version('css/bootstrap.css');

    // Compile the JS.
    mix.scripts([
        'affix.js',
        'alert.js',
        'button.js',
        'carousel.js',
        'collapse.js',
        'dropdown.js',
        'modal.js',
        'popover.js',
        'scrollspy.js',
        'tab.js',
        'tooltip.js',
        'transition.js'
    ], 'public/js/bootstrap.js');

    // Run the sync system in the vagrant box for real time css changes
    // use command gulp watch for activation.
    mix.browserSync({
        proxy: 'homestead.app'
    });
});
