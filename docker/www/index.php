<?php
session_start();

use Delight\Auth\AuthError;
use Delight\Auth\AuthException;

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/common.php';
require __DIR__ . '/src/instance.php';

// Attempt to log in if the request is a POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $auth->loginWithUsername($_POST['username'], $_POST['password']);
        http_response_code( 302);
        header('Location: /home/', true);
    } catch (AuthException $e) {
        http_response_code(401);
    } catch (AuthError $e) {
        http_response_code(500);
    }
}

// Serve this HTML if user ISN'T logged in, otherwise redirect
if($auth->isLoggedIn()) {
    http_response_code( 302);
    header('Location: /home/', true);
} else {
    include __DIR__ . '/login.html';
}
