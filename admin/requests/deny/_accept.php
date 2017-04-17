<?php
    header("location: ../../pages/accepted.php");
    include_once "../../../database/connection.php";

    if (isset($_GET["input"])) {
        $matricola = $_GET["input"];

        if (isset($_GET["action"]) && $_GET["action"] == 'deny') {
            $sql ="INSERT INTO  BebRifiutate SELECT * FROM BebAccettate WHERE matricola='$matricola'";
            $res = $conn->query($sql);
            $sql = "DELETE FROM BebAccettate WHERE matricola='$matricola'";
            $res = $conn->query($sql);
        }
    } else {
        die("Error on 'accepting' <a href='../dashboard.php'> Back </a>");
    }
