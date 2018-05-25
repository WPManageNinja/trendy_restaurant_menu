const mix = require('laravel-mix');

mix.setPublicPath('assets');
mix.setResourceRoot('./');

mix.js('src/js/app.js', 'assets/app.js');
mix.js('src/js/tinymce-button.js', 'assets/tinymce-button.js');
mix.sass('src/css/styles.scss', 'assets/styles.css');
mix.sass('src/css/tinymce-button.scss', 'assets/tinymce-button.css');
mix.sass('src/css/admin_settings.scss', 'assets/admin_settings.css');