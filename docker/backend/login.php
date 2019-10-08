<?php

$db_port = 3306;

function db_connection_test($db_user, $db_password) {
    $connection = mysqli_connect('localhost', $db_user, $db_password, 'MariaDB');

    // If connection is not successful you will see text error
    if (!$connection) {
        die('Could not connect: ' . mysqli_error($connection));
    }
    // If connection is successfully you will see message below
    echo 'Connected successfully';

    mysqli_close($connection);
}

db_connection_test('root', 'WhereTheH00dAt!');
