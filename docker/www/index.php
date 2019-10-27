<?php
session_start();

require_once __DIR__ . '/src/auth_instance.php';
require_once __DIR__ . '/src/insert_data.php';

require __DIR__ . '/login.php';

// Serve this HTML if user ISN'T logged in, otherwise redirect
if ($auth->isLoggedIn()) {
    http_response_code(302);
    header('Location: /home/');
} else {
    include __DIR__ . '/login.html';
}
