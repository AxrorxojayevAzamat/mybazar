let mix = require('laravel-mix');

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

let js_files = ['1-index', '2-catalog-page', 'compare-items', 'header-414', 'main', 'search-bar', 'shopping-cart'];
let css_files = ['app','colorpicker','fileinput'];
let r_path = 'resources/assets/';
let p_path = 'public/build/';

function min_func(mix_arg, type, file) {
    if(mix_arg.inProduction()) {
        mix_arg.minify(`${p_path}${type}/${file}.${type}`)
    }
}

const mixFiles = type => args => {
    if(type === 'js') {
        for(let x of args) {
            mix
                .js(`${r_path}${type}/${x}.${type}`, `${type}`)
                min_func(mix, type, x)
        }
        
    } else if (type === 'css') {
        for(let x of args) {
            mix
                .sass(`${r_path}sass/${x}.scss`, `${type}`)
                min_func(mix, type, x)
        } 
    }     
}

const mixCss = mixFiles('css');
const mixJs = mixFiles('js');

mix
    .setPublicPath('public/build')
    .setResourceRoot('/build/')
    

mixCss(css_files)
mixJs(js_files)
    
mix.version()