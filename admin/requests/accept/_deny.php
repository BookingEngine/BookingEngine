<?php
    header("location: ../../pages/denies.php");
    include_once "../../../database/connection.php";

    if (isset($_GET["input"])) {
    $matricola = $_GET["input"];

        if (isset($_GET["action"]) && $_GET["action"] == 'accept') {
            $sql ="INSERT INTO BebAccettate SELECT * FROM BebRifiutate WHERE matricola='$matricola'";
            $res = $conn->query($sql);

            $sql = "DELETE FROM BebRifiutate WHERE matricola='$matricola'";
            $res = $conn->query($sql);

            $sql = "INSERT INTO BebAccettate (orario) WHERE matricola=$matricola VALUES (date('h:i a')) ";
            $res = $conn->query($sql);

            $res->close();
            $conn->close();
        } else {
            $conn->close();
            die("ERROR");
        }
    } else {
        $conn->close();
        die("Error on 'accepting' <a href='../dashboard.php'> Back </a>");
    }
