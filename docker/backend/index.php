<?php

function db_connection_test() {
    $link = mysqli_connect('{host}', '{user}', '{password}', '{db_name}');

    // If connection is not successful you will see text error
    if (!$link) {
        die('Could not connect: ' . mysqli_error($link));
    }
    // If connection is successfully you will see message below
    echo 'Connected successfully';

    mysqli_close($link);
}
