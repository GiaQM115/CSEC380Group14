<?php
session_start();

require_once '../src/auth_instance.php';

// TODO

// Serve this HTML if user IS logged in, otherwise redirect
if ($auth->isLoggedIn()) {
    include './home.html';
} else {
    http_response_code(302);
    header('Location: /');
}
