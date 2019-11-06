<?php

require_once __DIR__ . '/src/insert_data.php';

use Delight\Auth\AuthError;
use Delight\Auth\AuthException;

// Attempt to log in if the request is a POST with the correct parameters
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    try {
        $auth->loginWithUsername($_POST['username'], $_POST['password']);
    } catch (AuthException $e) {
        http_response_code(401);
    } catch (AuthError $e) {
        http_response_code(500);
    }
}
