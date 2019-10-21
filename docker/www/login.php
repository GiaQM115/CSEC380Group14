<?php
session_start();

use Delight\Auth\AmbiguousUsernameException;
use Delight\Auth\AttemptCancelledException;
use Delight\Auth\AuthError;
use Delight\Auth\EmailNotVerifiedException;
use Delight\Auth\InvalidPasswordException;
use Delight\Auth\TooManyRequestsException;
use Delight\Auth\UnknownUsernameException;

require_once __DIR__ . '/vendor/autoload.php';
require 'db_link.php';

// Check to see if the test user isn't defined
if( !defined('TEST_USER_DEFINED') ){
    require 'db_insert.php';
    define('TEST_USER_DEFINED', true);
}

// Take an action depending on whether the request was GET or POST
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if the user isn't already logged in
    if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
        http_response_code(200);
    } else {
        http_response_code(302);
        header('Location: /home.html', true);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Attempt to log in
    try {
        $auth->loginWithUsername($_POST['username'], $_POST['password']);
        http_response_code(302);
        header('Location: /home.html', true);
        echo 'User is logged in';
    } catch (InvalidPasswordException $e) {
        http_response_code(401);
        die('Wrong password');
    } catch (EmailNotVerifiedException $e) {
        http_response_code(401);
        die('Email not verified');
    } catch (TooManyRequestsException $e) {
        http_response_code(401);
        die('Too many requests');
    } catch (AttemptCancelledException $e) {
        http_response_code(401);
        die('Attempt cancelled');
    } catch (AmbiguousUsernameException $e) {
        http_response_code(401);
        die("Ambiguous username");
    } catch (UnknownUsernameException $e) {
        http_response_code(401);
        die("Unknown username");
    } catch (AuthError $e) {
        http_response_code(500);
        die('Authentication error');
    }
} else {
    // Default to bad request
    http_response_code(400);
    die('Bad request');
}
