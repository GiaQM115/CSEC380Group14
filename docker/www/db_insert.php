<?php
require_once "db_link.php";

// Declare test account parameters
$username = 'test';
$hashed_password = password_hash('test', PASSWORD_DEFAULT);

/*
 * Check to make sure that the test user hasn't already been added to the database.
 * If it isn't then proceed to add the test user.
 */
// Prepare a select statement
$sql = "SELECT login_id, pass_hash FROM account WHERE login_id = ?";

if ($stmt = mysqli_prepare($link, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $username);

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Store result
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
            echo "Test account already initialized";

        } else {
            // Prepare an insert statement
            $sql = "INSERT INTO account (login_id, pass_hash) VALUES (?, ?)";

            if ($stmt = mysqli_prepare($link, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ss", $username, $hashed_password);

                mysqli_stmt_execute($stmt);
                echo "Initialized test account";
            }
        }
    }

    mysqli_stmt_close($stmt);
}
