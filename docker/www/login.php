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

// Attempt to log in
try {
    $auth->loginWithUsername($_POST['username'], $_POST['password']);
    echo 'User is logged in';
} catch (InvalidPasswordException $e) {
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
