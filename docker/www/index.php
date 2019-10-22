<?php
session_start();

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/common.php';
require __DIR__ . '/src/instance.php';

// TODO

// Serve this HTML if user ISN'T logged in, otherwise redirect
if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
    http_response_code(302);
    header('Location: /', true);
} else {
    include __DIR__ . '/login.html';
}
