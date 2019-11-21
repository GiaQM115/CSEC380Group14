<?php
session_start();

require_once __DIR__ . '/src/db_conn.php';

// Run this code if user IS logged in, otherwise redirect
if ($auth->isLoggedIn()) {
    // Run this code if the request is a GET with correct parameters, otherwise bad request
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        function pageHead()
        {
            $conn = new mysqli('db', 'php', 'SuperSecretPassword', 'brickflix')
            or die ('Cannot connect to db');

            $title = $_GET['id'];
            $res = mysqli_query($conn, "SELECT filename FROM videos WHERE id='$title'");
            while ($row = $res->fetch_assoc()) {
                printf('<h2>%s</h2>', $row['filename']);
            }
        }

        function pageNav()
        {
            printf('
<form action="login.php" id="profileForm" method="get">
    <button form="profileForm" type="submit">My Profile</button>
</form>
<form action="logout.php" id="logoutForm" method="post">
    <button form="logoutForm" type="submit">Logout</button>
</form>
    ');
        }

        function pageBody()
        {
            $conn = new mysqli('db', 'php', 'SuperSecretPassword', 'brickflix')
            or die ('Cannot connect to db');
            $res = mysqli_query($conn, 'SELECT filename FROM videos WHERE id=$_GET["id"])');

            while ($row = $res->fetch_assoc()) {
                printf('
<div class="viewerDiv">
    <video controls height="480" width="720">
        <source src="videos/%s" type="video/mp4">
    </video>
</div>
', $row['filename']);
            }
        }

        // Include the HTML skeleton
        include __DIR__ . '/skel.php';
    } else {
        http_response_code(400);
    }
} else {
    http_response_code(302);
    header('Location: /');
}
