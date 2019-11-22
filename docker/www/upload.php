<?php

require_once __DIR__ . '/src/db_conn.php';

// Run this code if user IS logged in, otherwise unauthorized
if ($auth->isLoggedIn()) {
    // Run this code if the request is a POST, otherwise bad request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $file_ext = strtolower(substr($name, strpos($name, ".") + 1)); // TODO: Implement better file extension check

        if (empty($name)) {
            echo "Please choose a file";
        } else if ($file_ext !== "mp4") {
            echo "The file extension must be .mp4 in order to be uploaded";
        } else if (move_uploaded_file($tmp_name, 'videos/' . $name)) {
            $conn = new mysqli('db', 'php', 'SuperSecretPassword', 'brickflix')
            or die ('Cannot connect to db');

            $id = $auth->getUserId();
            $sql = "INSERT INTO videos(filename, uploader_id) VALUES ('$name' , $id)";

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                http_response_code(400);
            }
            echo "Uploaded!";
            mysqli_close($conn);
        } else {
            echo "File upload failed";
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
