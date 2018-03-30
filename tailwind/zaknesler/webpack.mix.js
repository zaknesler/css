let mix = require('laravel-mix');
let tailwind = require('tailwindcss');

mix.less('resources/assets/less/app.less', 'public/css')
  .options({
    postCss: [
      tailwind('./tailwind.js'),
    ]
  });
