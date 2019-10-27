<?php
session_start();

require_once './src/auth_instance.php';

require './login.php';

// Serve this HTML if user ISN'T logged in, otherwise redirect
if ($auth->isLoggedIn()) {
    http_response_code(302);
    header('Location: /home/');
} else {
    include './login.html';
}
