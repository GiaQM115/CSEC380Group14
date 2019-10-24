<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Define environment variables
define('FAVICON_HREF', '/favicon.ico');
define('MAIN_CSS_HREF', '/css/main.css');
define('FONT_CSS_HREF', 'https://fonts.googleapis.com/css?family=Roboto');

function favicon_link($href) {
    printf('<link rel="icon" href="%s">%s', $href, "\n");
}

function css_link($href) {
    printf('<link rel="stylesheet" href="%s">%s', $href, "\n");
}

function js_script($src) {
    printf('<script src="%s" type="text/javascript"></script>%s', $src, "\n");
}
