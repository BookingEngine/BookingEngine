<?php
    include_once "../../../database/connection.php";
    include_once "../libs/mail.php";

    if (isset($_GET["input"])) {
        $matricola = $_GET["input"];

        if (isset($_GET["action"]) && $_GET["action"] == 'accept') {
            $sql ="INSERT INTO BebAccettate SELECT * FROM Beb WHERE matricola='$matricola'";
            $res = $conn->query($sql) or die($conn->error);

            $sql = "DELETE FROM Beb WHERE matricola='$matricola'";
            $res = $conn->query($sql) or die($conn->error);

            $sql = "SELECT * FROM BebAccettate WHERE matricola='$matricola'";
            $res = $conn->query($sql) or die($conn->error);

            if ($res) {
                $row = $res->fetch_assoc();

                if ($row) {
                    // FILE
                    $message = file_get_contents("msg.html");

                    // REPLACE
                    $message = str_replace("%nome%", $row["name"], $message);
                    $message = str_replace("%cognome%", $row["surname"], $message);
                    $message = str_replace("%start%", $row["start"], $message);
                    $message = str_replace("%end%", $row["end"], $message);
                    $message = str_replace("%ospiti%", $row["people"], $message);

                    // PAYPAL
                    $message = str_replace("%matricola%", $matricola, $message);
                    $message = str_replace("%vendorID%", "filippo.cozzini@gmail.com", $message);
                    $message = str_replace("%IPNurl%", "https://costasenel.it/booking/payment/ipn.php", $message);
                    $message = str_replace("%price%", "100", $message);

                    /*

                    * %vendorID% = Filipo Email
                    * %IPNurl% = https://costasenel.it/ipn/ipn.php
                    * %price% = 100
                    * %matricola% = 4

                    */

                    $mail->addAddress($row["email"], $row["name"]);
                    $mail->Subject = "Conferma Ordine N. $matricola";
                    $mail->setLanguage("it");
                    $mail->msgHTML($message);

                    if (!$mail->send()) {
                        die($mail->ErrorInfo);
                    } else {
                        header("location: ../../pages/suspended.php");
                    }
                }
            }




        }
    } else {
        die("Error on 'accepting' <a href='../dashboard.php'> Back </a>");
    }
