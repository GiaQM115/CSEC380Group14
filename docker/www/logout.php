<?php
// Initialize the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

header("HTTP/1.1" . " 200 OK", true, 200);
exit;
