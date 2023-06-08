const mix = require("laravel-mix");
const { VueLoaderPlugin } = require("vue-loader");
const path = require("path");
const env = process.env.NODE_ENV;

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

mix.js("resources/js/app.js", "public/js").vue();
// mix.js("resources/js/bootstrap.js", "public/js");
// mix.js("resources/js/websockets.js", "public/js");

mix.webpackConfig({
    resolve: {
        extensions: [".*", ".wasm", ".mjs", ".js", ".jsx", ".json", ".vue"],
        alias: {
            "@": __dirname + "/resources/js",
        },
    },
});

mix.css("resources/css/app.css", "public/css")
    .css("resources/css/header.css", "public/css")
    .css("resources/css/footer.css", "public/css")
    .css("resources/css/index.css", "public/css");

mix.options({
    hmrOptions:{
        host:'localhost',
        port : 8080
    }
})