<?php
session_start();

require_once __DIR__ . '/../src/db_conn.php';

use Delight\Auth\AuthError;

// Attempt to log out if the request is a POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $auth->logOut();
        $auth->destroySession();
    } catch (AuthError $e) {
        http_response_code(500);
    }
}

// Run this code if user IS logged in, otherwise redirect
if ($auth->isLoggedIn()) {
    function title($title)
    {
        printf('%s%s', $title, "\n");
    }

    function video_source($src)
    {
        printf('<source src="%s" type="video/mp4">%s', $src, "\n");
    }

    // Fetch video metadata
    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
    $fields = $conn->query(sprintf('SELECT title, filename FROM video WHERE hash=%s;', $_GET['video']))->fetch_fields();
    $title = $fields[0];
    $src = $fields[1];
    $conn->close();

    // Finally, include the HTML
    include __DIR__ . '/watch.html';
} else {
    http_response_code(302);
    header('Location: /');
}
