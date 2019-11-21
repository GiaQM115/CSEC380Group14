<?php
session_start();

require_once __DIR__ . '/src/db_conn.php';

// Run this code if user ISN'T logged in, otherwise redirect
if (!$auth->isLoggedIn()) {
    function pageHead()
    {
        printf('<h2>Welcome to BrickFlix. Please log in.</h2>');
    }

    function pageNav()
    {
        // No nav bar on login page
    }

    function pageBody()
    {
        printf('
<div class="loginDiv">
    <form action="login.php" id="loginForm" method="post">
        <input name="username" placeholder="username" required type="text">
        <input name="password" placeholder="password" required type="password">
        <button form="loginForm" type="submit">Login</button>
    </form>
</div>
');
    }

    // Include the HTML skeleton
    include __DIR__ . '/skel.php';
} else {
    http_response_code(302);
    header('Location: /home.php');
}
