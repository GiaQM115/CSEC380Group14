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
require_once 'db_link.php';
require_once 'db_insert.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if the user is already logged in
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
        http_response_code(302); // TODO: set the response code for all error cases
        http_get_request_body(); // TODO: set the JSON body for all error cases
        die('Wrong password');
    } catch (EmailNotVerifiedException $e) {
        die('Email not verified');
    } catch (TooManyRequestsException $e) {
        die('Too many requests');
    } catch (AttemptCancelledException $e) {
        die('Attempt cancelled');
    } catch (AuthError $e) {
        die('Authentication error');
    } catch (AmbiguousUsernameException $e) {
        die("Ambiguous username");
    } catch (UnknownUsernameException $e) {
        die("Unknown username");
    }
}
