<?php

require_once __DIR__ . '/db_conn.php';

use Delight\Auth\AuthError;
use Delight\Auth\AuthException;

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

try {
    $userId = $auth->register('test1@test1.com', 'test1', 'test1', function ($selector, $token) use ($auth) {
        try {
            $auth->confirmEmail($selector, $token);
        } catch (AuthException $e) {
        }
    });
} catch (AuthException $e) {
} catch (AuthError $e) {
}

try {
    $userId = $auth->register('test2@test2.com', 'test2', 'test2', function ($selector, $token) use ($auth) {
        try {
            $auth->confirmEmail($selector, $token);
        } catch (AuthException $e) {
        }
    });
} catch (AuthException $e) {
} catch (AuthError $e) {
}
