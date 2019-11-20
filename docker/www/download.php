<?php

require_once __DIR__ . '/src/db_conn.php';

// Run this code if user IS logged in, otherwise unauthorized
if ($auth->isLoggedIn()) {
    // Run this code if the request is a POST with correct parameters, otherwise bad request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Initialize a file URL to the variable    
        $url = $_POST['urlToUpload']; 
        $fileext = substr($url,-4);
    
        $path = '../videos/';
        $file_name = $path.$_POST['nameOfFile'].$fileext; 
        if (empty($_POST['nameOfFile'])){
            echo "Please enter filename";
        }
        else if($fileext !== ".mp4"){
            echo "Please enter url with mp4 file";
        }
        else if(file_put_contents( $file_name,file_get_contents($url))) { 
            echo "File downloaded successfully"; 
        } 
        else { 
            echo "File downloading failed."; 
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
