<?php
session_start();

require_once __DIR__ . '/src/db_conn.php';

// Run this code if user IS logged in, otherwise redirect
if ($auth->isLoggedIn()) {
    // Run this code if the request is a GET with correct parameters, otherwise bad request
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        // Fetch video data from DB
        $statement = $db->prepare('SELECT title, filename, username, upload_date FROM videos JOIN users ON (videos.uploader_id=users.id) WHERE hash_id=?;');
        $statement->execute(array($_GET['id']));
        $result = $statement->fetchAll();

        // Run this code if the result is not empty, otherwise not found
        if (!$result) {
            $title = $result[0];
            $src = '/src/' . $result[1];
            $uploader = $result[2];
            $date = $result[3];

            // Define functions to be called in the HTML
            function title($title)
            {
                printf('%s%s', $title, "\n");
            }

            function video_source($src)
            {
                printf('<source src="%s" type="video/mp4">%s', $src, "\n");
            }

            // Include the HTML
            include __DIR__ . '/watch.html';
        } else {
            http_response_code(404);
        }
    } else {
        http_response_code(400);
    }
} else {
    http_response_code(302);
    header('Location: /');
}
