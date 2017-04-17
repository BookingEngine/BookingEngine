<?php
    session_start();

    if ( isset($_SESSION["admin"]) || isset($_COOKIE["settings"]) && $_COOKIE["settings"] == 'true' ) {
        header("Location: admin/index.php");
    } else {
        session_destroy();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title> Home | BookingEngine </title>

        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/nav.css">
        <link rel="stylesheet" href="css/skeleton.css">
    </head>
    <body>
        <nav class="navbar">
            <div class="brand">
                <a href="../index.php"> BookingEngine </a>
            </div>
        </nav>
        <div class="center">
            <div class="row">
                <a href="">
                    <span class="button">
                        BUTTOn
                    </span>
                </a>
            </div>
        </div>
    </body>
</html>
