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
    <div class="navDiv">
        <form action="home.php" id="homeForm" method="get">
            <button form="homeForm" type="submit">Home</button>
        </form>
        <form action="logout.php" id="logoutForm" method="post">
            <button form="logoutForm" type="submit">Logout</button>
        </form>
    </div>
    <div class="titleDiv">
        <h2>Delete Manager</h2>
    </div>
    <div class="DeleteDiv">
        <form action="delVideo.php" enctype="multipart/form-data" id="DeleteForm" method="post">
            <select name="delVid">
            <?php 
                $conn = new mysqli('db', 'php', 'SuperSecretPassword', 'brickflix') 
                or die ('Cannot connect to db');
                 $query = "select filename from videos";
                 $res = mysqli_query($conn, $query); 
                 while ($row = $res->fetch_assoc()) 
                {
                    echo "<option value=\"".$row['filename']."\">".$row['filename']."</option>";
                }
                ?>
            </select>
            <input type="submit" name="submit" value="Get Selected Values"/>
            <!-- <button type="submit">Delete Video</button> -->
        </form>
    </div>
    <div class="footerDiv">
        <h3>&copy;2019 CSEC-380 Group 14</h3>
    </div>
</div>
</body>
</html>