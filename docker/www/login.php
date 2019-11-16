<?php

require_once __DIR__ . '/src/db_conn.php';

use Delight\Auth\AuthError;
use Delight\Auth\AuthException;

// Run this code if the request is a POST with correct parameters, otherwise bad request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    // Attempt to log in
    try {
        $auth->loginWithUsername($_POST['username'], $_POST['password']);
    } catch (AuthException $e) {
        http_response_code(401);
    } catch (AuthError $e) {
        http_response_code(500);
    }
} else {
    http_response_code(400);
}

// Include the login page
include __DIR__ . '/index.php';
