const mix = require('laravel-mix');

 mix.webpackConfig({
    stats: {
        children: true,
    },
});


mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .css('resources/css/style.css', 'public/css')
    .sourceMaps();