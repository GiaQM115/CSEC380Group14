<?php

require_once '../vendor/autoload.php';

use Delight\Auth\Auth;

// Define DB variables
define('DB_HOST', 'db');
define('DB_PORT', 3306);
define('DB_NAME', 'brickflix');
define('DB_CHARSET', 'utf8mb4');
define('DB_USERNAME', 'php');
define('DB_PASSWORD', 'SuperSecretPassword');

// Establish connection to DB
$db = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';charset=' . DB_CHARSET, DB_USERNAME, DB_PASSWORD);
$auth = new Auth($db);
