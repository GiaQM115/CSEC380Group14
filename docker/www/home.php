<?php
session_start();

require_once __DIR__ . '/src/db_conn.php';

// Run this code if user IS logged in, otherwise redirect
if ($auth->isLoggedIn()) {
    function pageHead()
    {
        printf('<h2>Home</h2>');
    }

    function pageNav()
    {
        printf('
<form action="profile.php" id="profileForm" method="get">
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

        $res = mysqli_query($conn, "SELECT username, filename, upload_date FROM videos JOIN users ON videos.uploader_id = users.id ORDER BY videos.id DESC");
	printf('
<h2>What do you want to watch today?</h2>
<div class="viewerDiv">
');

        while ($row = $res->fetch_assoc()) {
	$title = "".$row['username']." uploaded  ".$row['filename']." on ".$row['upload_date'];
            printf('
    <div class="videoDiv">
        <video controls height="480" width="720">
            <source src="videos/%s" type="video/mp4">
        </video>
        <br>
        <h3>%s</h3>
    </div>
', $row['filename'], $title);
        }
	printf('</div>');
    }

    // Include the HTML skeleton
    include __DIR__ . '/skel.php';
} else {
    http_response_code(302);
    header('Location: /');
}
