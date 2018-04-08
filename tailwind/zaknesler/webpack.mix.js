let mix = require('laravel-mix');
let tailwind = require('tailwindcss');

mix.setPublicPath('public')
  .less('resources/assets/less/app.less', 'public/css')
  .options({
    postCss: [
      tailwind('./tailwind.js'),
    ]
  })
  .js('resources/assets/js/app.js', 'public/js');
