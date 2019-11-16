<?php

require_once __DIR__ . '/src/db_conn.php';

// Run this code if user IS logged in, otherwise unauthorized
if ($auth->isLoggedIn()) {
    // Run this code if the request is a PUT, otherwise bad request
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        // Attempt to upload the video
        // TODO
    } else {
        http_response_code(400);
    }
} else {
    http_response_code(401);
}
