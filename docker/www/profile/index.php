<?php
session_start();

require_once __DIR__ . '/../src/db_conn.php';

use Delight\Auth\AuthError;

// Run this code if user IS logged in, otherwise redirect
if ($auth->isLoggedIn()) {
    // Attempt to upload the video if the request is a PUT
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        // TODO
    }

    // Finally, include the HTML
    include __DIR__ . '/upload.html';
} else {
    http_response_code(302);
    header('Location: /');
}
