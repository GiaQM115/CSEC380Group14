<?php
session_start();

/**
 * Define the environment variables
 */
define('FAVICON_LOC', '/favicon.ico');
define('MAIN_CSS_LOC', '/css/main.css');
define('FONT_CSS_LOC', 'https://fonts.googleapis.com/css?family=Roboto');

function favicon() {
    printf('<link rel="icon" href="%s">%s', FAVICON_LOC, "\n");
}

function css() {
    printf('<link rel="icon" href="%s">%s', MAIN_CSS_LOC, "\n");
    printf('<link rel="icon" href="%s">%s', FONT_CSS_LOC, "\n");
}
