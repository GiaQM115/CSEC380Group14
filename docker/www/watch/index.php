<?php
session_start();

require_once __DIR__ . '/../src/db_conn.php';

// Fetch video metadata
$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
$fields = $conn->query(sprintf('SELECT title, filename FROM video WHERE hash=%s;', $_GET['video']))->fetch_fields();
$title = $fields[0];
$src = $fields[1];
$conn->close();

function title($title)
{
    printf('%s%s', $title, "\n");
}

function video_source($src)
{
    printf('<source src="%s" type="video/mp4">%s', $src, "\n");
}

// Serve this HTML if user IS logged in, otherwise redirect
if ($auth->isLoggedIn()) {
    include __DIR__ . '/watch.html';
} else {
    http_response_code(302);
    header('Location: /');
}
