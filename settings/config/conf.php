<?php
    include_once "config.php";
    $tables = array(
        "login"  => $tb_login,
        "denied" => $tb_denied,
        "accepted"  => $tb_accepted,
        "completed" => $tb_completed,
        "suspended" => $tb_suspended
    );

    $database = array(
        "host" => $dbhost,
        "name" => $dbname,
        "port" => $dbport,
        "user" => $dbuser,
        "password" => $dbpass
    );

    $admin = array(
        "email" => $ad_email,
        "password" => $ad_password
    );