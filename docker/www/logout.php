<?php
session_start();

use Delight\Auth\AuthError;

require_once __DIR__ . '/vendor/autoload.php';
require_once 'db_link.php';

// Unset all of the session variables and destroy the session
$_SESSION = array();
session_destroy();

// Attempt to log out
try {
    $auth->logOut();
    http_response_code(302);
    header('Location: /index.html', true);
    echo 'User is logged out';
} catch (AuthError $e) {
    http_response_code(500);
    die("Auth error");
}
