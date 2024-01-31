let mix = require("laravel-mix");
mix.postCss(
    "resources/css/app.css",
    "resources/css/style.css",
    "public/css"
);
