let mix = require("laravel-mix");
mix.postCss(
    "resources/css/app.css",
    "resources/css/style.css",
    "resources/css/styledefault.css",
    "public/css"
);
