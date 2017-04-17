<?php
    include_once "../database/connection.php";

    function check($var) {
        if (!empty($var) && isset($var)) {
            return true;
        }
    }

    function sanitize($var) {
        $isMail = filter_var($var, FILTER_VALIDATE_EMAIL);

        if ($isMail) {
            return filter_var($var, FILTER_SANITIZE_EMAIL);
        } else {
            return filter_var($var, FILTER_SANITIZE_STRING);
        }
    }

    $adminMail = sanitize($_POST["adminMail"]);
    $adminPassword = $_POST["adminPassword"];
    $adminName = sanitize($_POST["adminName"]);

    $dbHost = $_POST["dbHost"];
    $dbUser = $_POST["dbUser"];
    $dbPass = $_POST["dbPass"];
    $dbName = $_POST["dbName"];
    $dbPort = $_POST["dbPort"];

    $activityName = sanitize($_POST["activityName"]);
    $activityEmail = sanitize($_POST["activityEmail"]);
    $activityPhone = $_POST["activityPhone"];

    $paypal = $_POST["paypal"];
    $bonifico = $_POST["bonifico"];

    $table = "BebSettings";




    // ADMIN
    if (isset($adminMail) && !empty($adminMail)) {
      $sql = "UPDATE $table SET adminMail='$adminMail' WHERE id=10";
      $conn->query($sql) or die("ERROR WITH: adminMail. <br>" . $conn->error . "<br>");
    }
    if (isset($adminPassword) && !empty($adminPassword)) {
      $sql = "UPDATE $table SET adminPass='$adminPassword' WHERE id=10";
      $conn->query($sql) or die("ERROR WITH: adminPassword. <br>" . $conn->error . "<br>");
    }
    if (isset($adminName) && !empty($adminName)) {
      $sql = "UPDATE $table SET adminName='$adminName' WHERE id=10";
      $conn->query($sql) or die("ERROR WITH: adminName. <br>" . $conn->error . "<br>");
    }


    //DATABASE
    if (isset($dbHost) && !empty($dbHost)) {
      $sql = "UPDATE $table SET dbHost='$dbHost' WHERE id=10";
      $conn->query($sql) or die("ERROR WITH: dbHost. <br>" . $conn->error . "<br>");
    }
    if (isset($dbName) && !empty($dbName)) {
      $sql = "UPDATE $table SET dbName='$dbName' WHERE id=10";
      $conn->query($sql) or die("ERROR WITH: dbName. <br>" . $conn->error . "<br>");
    }
    if (isset($dbUser) && !empty($dbUser)) {
      $sql = "UPDATE $table SET dbUser='$dbUser' WHERE id=10";
      $conn->query($sql) or die("ERROR WITH: dbUser. <br>" . $conn->error . "<br>");
    }
    if (isset($dbPass) && !empty($dbPass)) {
      $sql = "UPDATE $table SET dbPass='$dbPass' WHERE id=10";
      $conn->query($sql) or die("ERROR WITH: dbPass. <br>" . $conn->error . "<br>");
    }
    if (isset($dbPort) && !empty($dbPort)) {
      $sql = "UPDATE $table SET dbPort='$dbPort' WHERE id=10";
      $conn->query($sql) or die("ERROR WITH: dbPort. <br>" . $conn->error . "<br>");
    } else {
      $sql = "UPDATE $table SET dbPort='3306' WHERE id=10";
      $conn->query($sql) or die("ERROR WITH: dbPort. <br>" . $conn->error . "<br>");
    }

    // activity
    if (isset($activityName) && !empty($activityName)) {
      $sql = "UPDATE $table SET activityName='$activityName' WHERE id=10";
      $conn->query($sql) or die("ERROR WITH: activityName. <br>" . $conn->error . "<br>");
    }
    if (isset($activityEmail) && !empty($activityEmail)) {
      $sql = "UPDATE $table SET activityMail='$activityEmail' WHERE id=10";
      $conn->query($sql) or die("ERROR WITH: activityEmail. <br>" . $conn->error . "<br>");
    }
    if (isset($activityPhone) && !empty($activityPhone)) {
      $sql = "UPDATE $table SET activityPhone='$activityPhone' WHERE id=10";
      $conn->query($sql) or die("ERROR WITH: activityPhone. <br>" . $conn->error . "<br>");
    }

    // PAYMENT
    if (isset($paypal) && !empty($paypal)) {
      $sql = "UPDATE $table SET paypal='$paypal' WHERE id=10";
      $conn->query($sql) or die("ERROR WITH: paypal. <br>" . $conn->error . "<br>");
    } else {
      $sql = "UPDATE $table SET paypal=NULL WHERE id=10";
      $conn->query($sql) or die("ERROR WITH: paypal. <br>" . $conn->error . "<br>");
    }

    if (isset($bonifico) && !empty($bonifico)) {
      $sql = "UPDATE $table SET bonifico='$bonifico' WHERE id=10";
      $conn->query($sql) or die("ERROR WITH: bonifico. <br>" . $conn->error . "<br>");
    } else {
      $sql = "UPDATE $table SET bonifico=NULL WHERE id=10";
      $conn->query($sql) or die("ERROR WITH: bonifico. <br>" . $conn->error . "<br>");
    }

    header("Location: ../admin/dashboard.php");
