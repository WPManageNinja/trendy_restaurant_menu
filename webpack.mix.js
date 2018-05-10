const mix = require('laravel-mix');

mix.js('src/js/app.js', 'assets/app.js');
mix.sass('src/css/styles.scss', 'assets/styles.css');