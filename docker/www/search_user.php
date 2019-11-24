<?php
session_start();

require_once __DIR__ . '/src/db_conn.php';

// Run this code if user IS logged in, otherwise redirect
if ($auth->isLoggedIn()) {
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

    function pageBody()
    {
        $uinput = $_POST['search'];

        $conn = new mysqli('db', 'php', 'SuperSecretPassword', 'brickflix')
        or die ('Cannot connect to db');

        $sql = mysqli_query($conn, "SELECT username, filename, upload_date FROM videos RIGHT JOIN users ON videos.uploader_id = users.id WHERE username = '$uinput'")
        or die(mysqli_error($conn));

        printf('
<h2>Search Results</h2>
<div class="viewerDiv">
');

        while ($row = $sql->fetch_assoc()) {
            printf('<p>');
            foreach ($row as $field) {
                printf('%s ', $field);
            }
            printf('</p>');
        }
        printf('</div>');
    }

    // Include the HTML skeleton
    include __DIR__ . '/skel.php';
} else {
    http_response_code(302);
    header('Location: /');
}
