<?php

use Delight\Auth\Auth;
use Delight\Auth\AuthError;
use Delight\Auth\AuthException;

// Define DB variables
define('DB_HOST', 'db');
define('DB_NAME', 'brickflix');
define('DB_CHARSET', 'utf8mb4');
define('DB_USERNAME', 'php');
define('DB_PASSWORD', 'SuperSecretPassword');

// Establish connection to DB
$db = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';charset=' . DB_CHARSET, DB_USERNAME, DB_PASSWORD);
$auth = new Auth($db);

// Check to see if the test user isn't defined
if (!defined('TEST_USER_DEFINED')) {
    try {
        $userId = $auth->register('test@test.com', 'test', 'test', function ($selector, $token) use ($auth) {
            try {
                $auth->confirmEmail($selector, $token);
            } catch (AuthException $e) {
            }
        });
    } catch (AuthException $e) {
    } catch (AuthError $e) {
    }
    define('TEST_USER_DEFINED', true);
}
