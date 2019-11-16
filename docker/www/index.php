<?php
session_start();

require_once __DIR__ . '/src/db_conn.php';

// Run this code if user ISN'T logged in, otherwise redirect
if (!$auth->isLoggedIn()) {
    // Include the HTML
    include __DIR__ . '/login.html';
} else {
    http_response_code(302);
    header('Location: /home.php');
}
