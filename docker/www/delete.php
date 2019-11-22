<?php

require_once __DIR__ . '/src/db_conn.php';

// Run this code if user IS logged in, otherwise unauthorized
if ($auth->isLoggedIn()) {
    // Run this code if the request is a POST with correct parameters, otherwise bad request
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delVid'])) {
        $name = $_POST['delVid'];

        unlink('videos/' . $name) or die("Couldn't delete file");

        $conn = new mysqli('db', 'php', 'SuperSecretPassword', 'brickflix')
        or die ('Cannot connect to db');

        $id = $auth->getUserId();
        $sql = "DELETE FROM videos WHERE filename='$name' AND id=$id";

        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
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
header('Location: /dashboard.php');
