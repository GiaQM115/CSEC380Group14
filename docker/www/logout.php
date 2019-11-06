<?php

require_once __DIR__ . '/src/db_conn.php';

use Delight\Auth\AuthError;

try {
    $auth->logOut();
    $auth->destroySession();
} catch (AuthError $e) {
}
