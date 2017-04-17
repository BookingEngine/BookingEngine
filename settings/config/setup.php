<?php

    $config = file_get_contents("config.php");

    foreach($_POST as $key => $val) {
        if ( $key !== 'submit' && isset($_POST[$key]) ) {
            $config = str_replace("%$key%", "$val", $config);
        }
    }

    file_put_contents("config.php", $config);

    setcookie("SETTINGS", "true",time() + (10*365*24*60*60));
    header("Location: ../index.php");
