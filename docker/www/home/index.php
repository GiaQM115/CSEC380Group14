<?php
session_start();

require_once __DIR__ . '/../src/db_conn.php';

// TODO

// Serve this HTML if user IS logged in, otherwise redirect
if ($auth->isLoggedIn()) {
    include __DIR__ . '/home.html';
} else {
    http_response_code(302);
    header('Location: /');
}