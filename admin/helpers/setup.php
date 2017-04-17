<?php
    include_once "../../settings/config/config.php";

    $config_path = "../../settings/config/config.php";
    $config = file_get_contents($config_path);

    // ADMIN
    if (!empty($_POST["a_email"])) {
        $config = str_replace($ad_email, $_POST["a_email"], $config);
    } else {
        $config = str_replace($ad_email, "%Your cool email%", $config);
    }

    if (!empty($_POST["a_password"])) {
        $config = str_replace($ad_password, $_POST["a_password"], $config);
    } else {
        $config = str_replace($ad_password, "%Your strong password%", $config);
    }

    // TABLES
    if (!empty($_POST["tb_accepted"])) {
        $config = str_replace($tb_accepted, $_POST["tb_accepted"], $config);
    } else {
        $config = str_replace($tb_accepted, "%Accepted Table%", $config);
    }

    if (!empty($_POST["tb_suspended"])) {
        $config = str_replace($tb_suspended, $_POST["tb_suspended"], $config);
    } else {
        $config = str_replace($tb_suspended, "%Suspended Table%", $config);
    }

    if (!empty($_POST["tb_denied"])) {
        $config = str_replace($tb_denied, $_POST["tb_denied"], $config);
    } else {
        $config = str_replace($tb_denied, "%Denied Table%", $config);
    }

    if (!empty($_POST["tb_completed"])) {
        $config = str_replace($tb_completed, $_POST["tb_completed"], $config);
    } else {
        $config = str_replace($tb_completed, "%Completed Table%", $config);
    }

    if (!empty($_POST["tb_login"])) {
        $config = str_replace($tb_login, $_POST["tb_login"], $config);
    } else {
        $config = str_replace($tb_login, "%Login Table%", $config);
    }

    // HOST
    if (!empty($_POST["db_host"])) {
        $config = str_replace($dbhost, $_POST["db_host"], $config);
    } else {
        $config = str_replace($dbhost, "%Host%", $config);
    }

    if (!empty($_POST["db_name"])) {
        $config = str_replace($dbname, $_POST["db_name"], $config);
    } else {
        $config = str_replace($dbname, "%Name%", $config);
    }

    if (!empty($_POST["db_port"])) {
        $config = str_replace($dbport, $_POST["db_port"], $config);
    } else {
        $config = str_replace($dbport, 3306, $config);
    }

    if (!empty($_POST["db_user"])) {
        $config = str_replace($dbuser, $_POST["db_user"], $config);
    } else {
        $config = str_replace($dbuser, "%Username%", $config);
    }

    if (!empty($_POST["db_pass"])) {
        $config = str_replace($dbpass, $_POST["db_pass"], $config);
    } else {
        $config = str_replace($dbpass, "%Password%", $config);
    }


    file_put_contents($config_path, $config);

    header("Location: ../settings.php");