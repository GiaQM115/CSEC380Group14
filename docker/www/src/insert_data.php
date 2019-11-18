<?php

require_once __DIR__ . '/db_conn.php';

use Delight\Auth\AuthError;
use Delight\Auth\AuthException;

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
