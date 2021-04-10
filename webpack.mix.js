let mix = require('laravel-mix');
const { forIn } = require('lodash');

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

const directoriosVue = {
   'resources/assets/js/vue/controllers/': {
      'archivos': [
         'verFormulario.js'
      ],
      'destino': ""
   },
   'resources/assets/js/vue/controllers/formularios/' : {
      'archivos' : [
         'formulario.js'
      ],
      'destino' : ""
   },
}

const destinoVue = 'js/vue';
for (let directorio in directoriosVue) {
   for (let archivo in directoriosVue[directorio].archivos) {
      mix.js(directorio + directoriosVue[directorio].archivos[archivo], destinoVue + directoriosVue[directorio].destino);
   }

}

mix.js('resources/assets/js/bundle.js', 'js/');
mix.js('resources/assets/lib/semantic/dist/semantic.min.js', 'lib/semantic/semantic.min.js');
mix.css('resources/assets/lib/semantic/dist/semantic.min.css', 'lib/semantic/semantic.min.css');


mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');


const sass_dir = 'resources/assets/css/';
const sass_dest = 'css';
const sass = [
   'layout.scss'
];

for(let archivo in sass){
   mix.sass(sass_dir + sass[archivo], sass_dest).options({
      processCssUrls: false,
      uglyfy: {
         parallel: 8, // multithreading for this
         uglyfyOptions: {
            mangle: true,
            compress: false,
         }
      }
   });
}

mix.styles(
   'resources/assets/lib/semantic/dist/semantic.min.css'
   , 'public/css/semantic.min.css');
