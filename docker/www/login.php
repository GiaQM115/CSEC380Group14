<?php
// Initialize the session
session_start();

// Check if the user is already logged in
if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
    http_response_code(200);
    exit;
}

// Include db_link helper files
require_once "db_link.php";
require "db_insert.php";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch parameters from the body
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Check if username or password are empty
    if(empty($username) || empty($password)) {
        mysqli_close($link);
        exit;
    }

    // Validate credentials
    // Prepare a select statement
    $sql = "SELECT login_id, pass_hash FROM account WHERE login_id = ?";

    if($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $username);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)) {
            // Store result
            mysqli_stmt_store_result($stmt);

            // Check if username exists, if yes then verify password
            if(mysqli_stmt_num_rows($stmt) == 1) {
                // Bind result variables
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

                if(mysqli_stmt_fetch($stmt)) {
                    if(password_verify($password, $hashed_password)) {
                        // Password is correct, so start a new session
                        session_start();

                        // Store data in session variables
                        $_SESSION["logged_in"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;

                        http_response_code(200);
                    } else {
                        http_response_code(403);
                    }
                }
            } else {
                http_response_code(403);
            }
        } else {
            http_response_code(500);
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
}
