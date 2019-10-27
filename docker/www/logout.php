<?php

use Delight\Auth\AuthError;

try {
    $auth->logOut();
    $auth->destroySession();
} catch (AuthError $e) {
}
