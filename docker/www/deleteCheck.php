<?php

require_once __DIR__ . '/src/db_conn.php';

// Run this code if user IS logged in, otherwise redirect
if ($auth->isLoggedIn()) {
    // TODO: load metadata for videos

    // Include the HTML
    include 'delete.php';
} else {
    http_response_code(302);
    header('Location: /');
}