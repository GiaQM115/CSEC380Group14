<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BrickFlix</title>
    <link href="favicon.ico" rel="icon">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/classes.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<div class="logoDiv">
    <h1>BrickFlix</h1>
</div>

<?php pageHead(); ?>

<div class="navDiv">
    <?php pageNav(); ?>
</div>

<?php pageBody($auth); ?>

<div class="footerDiv">
    <h3>&copy;2019 CSEC-380 Group 14</h3>
</div>
</body>
</html>
