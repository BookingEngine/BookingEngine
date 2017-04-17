<?php
    include_once "config/config.php";

    error_reporting(E_ERROR | E_PARSE);

    // Connection init
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);

    if ($conn->connect_error) {
        die("ERROR: " . $conn->connect_error) ;
    }
