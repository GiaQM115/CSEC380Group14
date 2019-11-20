<!DOCTYPE html>
<html lang="en">
<head>
    <title>BrickFlix</title>
    <meta charset="utf-8">
    <link href="favicon.ico" rel="icon">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/classes.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<div>
    <div class="logoDiv">
        <h1>BrickFlix</h1>
    </div>
    <div class="titleDiv">
        <h2>Home</h2>
    </div>
    <div class="navDiv">
        <form action="profile.php" id="profileForm" method="get">
            <button form="profileForm" type="submit">My Profile</button>
        </form>
        <form action="deleteCheck.php" id="deleteForm" method="post">
            <button form="deleteForm" type="submit">Delete Video</button>
        </form>
        <form action="logout.php" id="logoutForm" method="post">
            <button form="logoutForm" type="submit">Logout</button>
        </form>
    </div>
    <?php 
        $conn = new mysqli('db', 'php', 'SuperSecretPassword', 'brickflix') 
        or die ('Cannot connect to db');
        $query = "select filename from videos";
        $res = mysqli_query($conn, $query); 
        while ($row = $res->fetch_assoc()) 
        {
            echo "<div class=\"Videos\">";
            echo "<video controls name=\"media\" height=\"480\" width=\"720\">";
                echo "<source src=\"videos/".$row['filename']."\" type=\"video/mp4\">";
            echo "</video>";
        echo "</div>";
        }
    ?>
    <div class="footerDiv">
        <h3>&copy;2019 CSEC-380 Group 14</h3>
    </div>
</div>
</body>
</html>
