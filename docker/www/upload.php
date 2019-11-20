<?php

require_once __DIR__ . '/src/db_conn.php';

// Run this code if user IS logged in, otherwise unauthorized
if ($auth->isLoggedIn()) {
    // Run this code if the request is a POST with correct parameters, otherwise bad request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $position = strpos($name, ".");
        $fileextension = substr($name, $position + 1);
        $fileextension = strtolower($fileextension);

        $path = '../videos/';
        if (empty($name)) {
            echo "Please choose a file";
        } else if ($fileextension !== "mp4") {
            echo "The file extension must be .mp4 in order to be uploaded";
        } else {
            if (move_uploaded_file($tmp_name, $path . $name)) {
                $conn = new mysqli('db', 'php', 'SuperSecretPassword', 'brickflix') 
                or die ('Cannot connect to db');
                $sql = "insert into videos(filename, uploader_id) VALUES (\"$name\",12)";

                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    http_response_code(400);
                }
                echo 'Uploaded!';
                mysqli_close($conn);
            }

        }
    } else {
        http_response_code(400);
    }
} else {
    http_response_code(401);
}

// Redirect to the profile page
http_response_code(302);
header('Location: /profile.php');
