<?php

require_once __DIR__ . '/src/db_conn.php';

use Delight\Auth\AuthError;

// Run this code if the request is a POST, otherwise bad request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Attempt to log out
    try {
        $auth->logOut();
        $auth->destroySession();
    } catch (AuthError $e) {
        http_response_code(500);
    }
} else {
    http_response_code(400);
}

// Redirect to the login page
http_response_code(302);
header('Location: /');
