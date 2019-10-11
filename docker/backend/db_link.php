<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'php');
define('DB_PASSWORD', 'SuperSecretPassword');
define('DB_NAME', 'brickflix');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Set parameters
$param_username = $username;
$param_password = password_hash($password, PASSWORD_DEFAULT);
