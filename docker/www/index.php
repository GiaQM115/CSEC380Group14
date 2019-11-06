<?php
session_start();

require_once __DIR__ . '/src/db_conn.php';
require_once __DIR__ . '/src/insert_data.php';

use Delight\Auth\AuthError;
use Delight\Auth\AuthException;

// Attempt to log in if the request is a POST with the correct parameters
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    try {
        $auth->loginWithUsername($_POST['username'], $_POST['password']);
    } catch (AuthException $e) {
        http_response_code(401);
    } catch (AuthError $e) {
        http_response_code(500);
    }
}

// Run this code if user ISN'T logged in, otherwise redirect
if ($auth->isLoggedIn()) {
    http_response_code(302);
    header('Location: /home/');
} else {
    // Finally, include the HTML
    include __DIR__ . '/login.html';
}
