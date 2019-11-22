<?php
session_start();

use Delight\Auth\Auth;

require_once __DIR__ . '/src/db_conn.php';

// Run this code if user IS logged in, otherwise redirect
if ($auth->isLoggedIn()) {
    $uinput = $_POST['listVid'];
    $output = shell_exec('ls videos/'.$uinput);
    function pageHead()
    {
        printf('<h2>Search</h2>');
    }

    function pageNav()
    {
        printf('
<form action="home.php" id="homeForm" method="get">
    <button form="homeForm" type="submit">Home</button>
</form>
<form action="logout.php" id="logoutForm" method="post">
    <button form="logoutForm" type="submit">Logout</button>
</form>
');
    }

    function pageBody(Auth $auth)
    {
        printf('
            <div class="listDiv">
                <h2>Search Results</h2>
            </div>');
    }

    printf('
    <div class="viewerDiv">
        <p>%s</p>
    </div>', "".$output);


    // Include the HTML skeleton
    include __DIR__ . '/skel.php';
} else {
    http_response_code(302);
    header('Location: /');
}
