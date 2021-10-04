const mix = require('laravel-mix');

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

//css bundle
mix.combine([
    "resources/vendor/bootstrap/css/bootstrap.min.css",
    "resources/vendor/icofont/icofont.min.css",
    "resources/vendor/boxicons/css/boxicons.min.css",
    "resources/vendor/animate/animate.min.css",
    "resources/vendor/venobox/venobox.css",
    "resources/vendor/owl.carousel/assets/owl.carousel.min.css",
    "resources/vendor/persian-calendar/css/kamadatepicker.min.css",
    'resources/css/style.css'
], 'public/css/app.css');

//js bundle
mix.combine([
    "resources/vendor/jquery/jquery.min.js",
    "resources/vendor/persian-calendar/js/popper.min.js",
    "resources/vendor/bootstrap/js/bootstrap.bundle.min.js",
    "resources/vendor/jquery.easing/jquery.easing.min.js",
    "resources/vendor/php-email-form/validate.js",
    "resources/vendor/jquery-sticky/jquery.sticky.js",
    "resources/vendor/isotope-layout/isotope.pkgd.min.js",
    "resources/vendor/venobox/venobox.min.js",
    "resources/vendor/owl.carousel/owl.carousel.min.js",
    "resources/vendor/persian-calendar/js/popper.min.js",
    "resources/vendor/persian-calendar/js/kamadatepicker.min.js",
    "resources/js/main.js",
], 'public/js/app.js');
