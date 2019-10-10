<?php

function auth_user($www_user, $www_pass) {
    // Establish connection and verify that it was established
    $connection = mysqli_connect('localhost', 'php', 'SuperSecretPassword', 'brickflix', 3306);
    if (!$connection) {
        return false;
    }

    // Retrieve account and verify that it was retrieved
    $db_account = mysqli_query($connection,"SELECT login_id, pass_hash FROM account WHERE login_id=" . "'$www_user'");
    if (!$db_account) {
        print "fail";
        return false;
    }

    //$db_user = mysqli_fetch_row($db_account)[0];
    $db_pass_hash = mysqli_fetch_row($db_account)[1];
    print $db_pass_hash;

    // TODO: compare the $db_pass_hash stored in the database with SHA2($www_pass)

    // TODO: if everything checks out, then return a session token?

    return false;
}

function deauth_user() {
}

/*
 * The following are test statements to test PHP independently from js
 */
auth_user('ccs5486', '1MoarRoad2Cr0ss!');
