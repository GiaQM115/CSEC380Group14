<?php
session_start();

use Delight\Auth\AuthError;
use Delight\Auth\AuthException;

require_once __DIR__ . '/src/common.php';
require_once __DIR__ . '/src/auth_instance.php';
require_once __DIR__ . '/src/insert_data.php';

// Attempt to log in if the request is a POST with the correct parameters
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
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
if ($auth->isLoggedIn()) {
    http_response_code( 302);
    header('Location: /home/', true);
} else {
    include __DIR__ . '/login.html';
}
