<?php

use Delight\Auth\AuthError;
use Delight\Auth\InvalidEmailException;
use Delight\Auth\InvalidPasswordException;
use Delight\Auth\InvalidSelectorTokenPairException;
use Delight\Auth\TokenExpiredException;
use Delight\Auth\TooManyRequestsException;
use Delight\Auth\UserAlreadyExistsException;

// Set up the test user and automatically verify the email
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
