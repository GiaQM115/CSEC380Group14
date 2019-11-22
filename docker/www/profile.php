<?php
session_start();

require_once __DIR__ . '/src/db_conn.php';

// Run this code if user IS logged in, otherwise redirect
if ($auth->isLoggedIn()) {
    function pageHead()
    {
        printf('<h2>My Profile</h2>');
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

    function pageBody(\Delight\Auth\Auth $auth)
    {
        printf('
<div class="profileDiv">

    <h2>Upload Manager</h2>

    <div class="uploadDiv">
        <img alt="Upload From File" src="images/file_upload.png">
        <form action="upload.php" enctype="multipart/form-data" id="fileForm" method="post">
            <input accept="video/mp4" name="file" type="file" value="Upload">
            <br>
						<button form="fileForm" type="submit">Upload From File</button>
        </form>
    </div>

    <div class="uploadDiv">
        <img alt="Upload From URL" src="images/cloud_upload.png">
        <form action="download.php" id="urlForm" method="post">
            <input name="urlToUpload" id="urlToUpload" placeholder="URL" type="text">
            <input name="nameOfFile" id="nameOfFile" placeholder="Name to call it" type="text">
            <br>
						<button form="urlForm" type="submit">Upload From URL</button>
        </form>
    </div>
</div>

<div class="deleteDiv">
		<h2>Delete Manager</h2>
    <form action="delete.php" enctype="multipart/form-data" id="deleteForm" method="post">
        <select name="delVid">
');
        $conn = new mysqli('db', 'php', 'SuperSecretPassword', 'brickflix')
        or die ('Cannot connect to db');

        $id = $auth->getUserId();
        $res = mysqli_query($conn, "SELECT filename FROM videos WHERE uploader_id = $id");
        while ($row = $res->fetch_assoc()) {
            printf('<option value="%s">%s</option>', $row['filename'], $row['filename']);
        }
        printf('
        </select>
        <input type="submit" form="deleteForm" value="Delete Video">
    </form>
</div>
');
    }

    // Include the HTML skeleton
    include __DIR__ . '/skel.php';
} else {
    http_response_code(302);
    header('Location: /');
}
