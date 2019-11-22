<?php

require_once __DIR__ . '/src/db_conn.php';

// Run this code if user IS logged in, otherwise unauthorized
if ($auth->isLoggedIn()) {
    // Run this code if the request is a POST with correct parameters, otherwise bad request
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nameOfFile']) && isset($_POST['urlToUpload'])) {
        $name = $_POST['nameOfFile'];
        $url = $_POST['urlToUpload'];
        $file_ext = substr($url, -4); // TODO: Implement better file extension check

        if (empty($name)) {
            echo "Please enter a file name";
        } else if ($file_ext !== ".mp4") {
            echo "The url file extension must be .mp4 in order to be downloaded";
        } else if (file_put_contents('videos/' . $name, file_get_contents($url))) {
            $conn = new mysqli('db', 'php', 'SuperSecretPassword', 'brickflix')
            or die ('Cannot connect to db');

            $id = $auth->getUserId();
            $sql = "INSERT INTO videos(filename, uploader_id) VALUES ('$name', $id)";

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                http_response_code(400);
            }
            echo "Downloaded!";
            mysqli_close($conn);
        } else {
            echo "File download failed.";
        }
    } else {
        http_response_code(400);
    }
} else {
    http_response_code(401);
}

// Redirect to the profile page
http_response_code(302);
header('Location: /dashboard.php');
