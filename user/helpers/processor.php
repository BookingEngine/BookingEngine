<?php
    include_once "../../settings/connection.php";
    include_once "../../libraries/functions.php";

    if ( isset($_POST["submit"]) ) {

        $name = ensure($_POST["customer_name"]);
        $surname = ensure($_POST["customer_surname"]);
        $mail = filter_var($_POST["customer_email"], FILTER_SANITIZE_EMAIL);
        $tell = ensure($_POST["customer_tel"]);
        $start = ensure($_POST["start"]);
        $end = ensure($_POST["end"]);
        $people = ensure($_POST["customer_people"]);
        $matricola =  ensure(r_string(10));
        $pay = ensure($_POST["payment"]);


        if ( filter_var($mail, FILTER_VALIDATE_EMAIL) ) {
            $sql = "INSERT INTO Beb (name, surname, email, telefono, start, end, people, pay, matricola) VALUES ('$name', '$surname', '$mail', '$tell', '$start', '$end', '$people', '$pay', '$matricola')";
            $result = $conn->query($sql);
            if ($result) {
                $msg = "Ordine n. <b>$matricola</b> registrato con successo.";
                $msg = str_replace(" ", "%20", $msg);
                $msg = str_replace(".", "+.", $msg);

                header("Location: ../prenota.php?sent=true&msg=$msg&status=success");
            } else {
                $msg = "Query error. Contact the <a href='mailto:support@bookingengine.com'>technical support</a>.";
                $msg = str_replace(" ", "%20", $msg);
                $msg = str_replace(".", "+.", $msg);

                header("Location: ../prenota.php?sent=false&msg=$msg&status=danger");
            }
        } else {
            $msg = "Invalid email address.";
            $msg = str_replace(" ", "%20", $msg);
            $msg = str_replace(".", "+.", $msg);

            header("Location: ../prenota.php?sent=false&msg=$msg&status=danger");
        }

    } else {
        die(print_r($_POST));
    }
