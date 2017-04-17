<?php
    include_once "../database/connection.php";

    $custom = $_GET["custom"];
    $txn_id = $_GET["txn_id"];

    $sql = "INSERT INTO BebPagate SELECT * FROM BebAccettate WHERE matricola='$custom'";
    $res = $conn->query($sql) or die("ERROR: " . $conn->error);

    $sql = "DELETE FROM BebAccettate WHERE matricola='$custom'";
    $res = $conn->query($sql) or die("ERROR: " . $conn->error);

    $sql = "UPDATE BebPagate SET txn_id='$txn_id' WHERE matricola='$custom'";
    $res = $conn->query($sql) or die("ERROR: " . $conn->error);

    header("Location: ../index.pchp");