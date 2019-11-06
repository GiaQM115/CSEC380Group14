<?php
session_start();

require_once __DIR__ . '/../src/db_conn.php';

use Delight\Auth\AuthError;

// Attempt to log out if the request is a POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $auth->logOut();
        $auth->destroySession();
    } catch (AuthError $e) {
        http_response_code(500);
    }
}

// Run this code if user IS logged in, otherwise redirect
if ($auth->isLoggedIn()) {
    // TODO

    // Finally, include the HTML
    include __DIR__ . '/home.html';
} else {
    http_response_code(302);
    header('Location: /');
}
