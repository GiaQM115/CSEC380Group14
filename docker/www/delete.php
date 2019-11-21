<?php

require_once __DIR__ . '/src/db_conn.php';

// Run this code if user IS logged in, otherwise unauthorized
if ($auth->isLoggedIn()) {
    // Run this code if the request is a POST with correct parameters, otherwise bad request
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delVid'])) {
        $name = $_POST['delVid'];

        $file = 'videos/' . $name;
        unlink($file) or die("Couldn't delete file");

        $conn = new mysqli('db', 'php', 'SuperSecretPassword', 'brickflix')
        or die ('Cannot connect to db');

        if (mysqli_query($conn, "DELETE FROM videos WHERE filename='$name'")) {
            echo "New record created successfully";
        } else {
            http_response_code(400);
        }
        echo 'Deleted!';
        mysqli_close($conn);
    } else {
        http_response_code(400);
    }
} else {
    http_response_code(401);
}

// Redirect to the profile page
http_response_code(302);
header('Location: /profile.php');
