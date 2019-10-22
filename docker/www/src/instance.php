<?php

use Delight\Auth\Auth;
use Delight\Auth\AuthError;
use Delight\Auth\InvalidEmailException;
use Delight\Auth\InvalidPasswordException;
use Delight\Auth\InvalidSelectorTokenPairException;
use Delight\Auth\TokenExpiredException;
use Delight\Auth\TooManyRequestsException;
use Delight\Auth\UserAlreadyExistsException;

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
                echo 'Email address has been verified';
            } catch (InvalidSelectorTokenPairException $e) {
                die('Invalid token');
            } catch (TokenExpiredException $e) {
                die('Token expired');
            } catch (UserAlreadyExistsException $e) {
                die('Email address already exists');
            } catch (TooManyRequestsException $e) {
                die('Too many requests');
            }
        });
        echo 'We have signed up a new user with the ID ' . $userId;
    } catch (InvalidEmailException $e) {
        die('Invalid email address');
    } catch (InvalidPasswordException $e) {
        die('Invalid password');
    } catch (UserAlreadyExistsException $e) {
        die('User already exists');
    } catch (TooManyRequestsException $e) {
        die('Too many requests');
    } catch (AuthError $e) {
        die('Auth error');
    }
    define('TEST_USER_DEFINED', true);
}
