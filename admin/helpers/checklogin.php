<?php
    // CHECK LOGIN
    header("Location: ../index.php");

    include_once "../../libraries/functions.php";
    include_once "../../libraries/crypter.php";
    include_once "../../settings/connection.php";

    $table = "BebLogin";

    if ( isset($_POST["submit"]) ) {
        // GET POSTED DATA
        $mail = sanitize($_POST["loginEmail"]);
        $mail = ensure($mail);

        $username = explode("@", $mail)[0];

        // crypter('encrypt', $_POST["login[password]"]);
        $password = $_POST["loginPass"];

        $sql = "SELECT * FROM $table WHERE email='$mail' and password='$password'";
        $result = $conn->query($sql) or die("Error with query: EMAIL: $mail - PASS: $password <br>" . $conn->error);

        $count = $result->num_rows;

        if (isset($count) && $count == 1) {
            session_start();
            $_SESSION["admin"] = $username;
        } else {
            die("Check your credentials. <br> <a href='../login.php'> Go Back </a>");
        }
    } else { die("No SubMit <br> <a href='../login.php'> Go Back </a>"); }
?>