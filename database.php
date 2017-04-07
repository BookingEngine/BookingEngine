<?php
    error_reporting(E_ERROR | E_PARSE);

    // CREDENTIALS
    // Database from https://freemysqlhosting.net
    $host = 'sql8.freemysqlhosting.net';
    $name = "sql8167203";
    $port = 3306;
    $user = "sql8167203";
    $pass = "sPxjck5E8z";
    $server = "$host:$port";

    // Connection init
    $conn = new mysqli($host, $user, $pass, $name);

    if ($conn->connect_error) {
        die("ERROR: " . $conn->connect_error) ;
    }
