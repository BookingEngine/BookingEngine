<?php
    include_once "../../database.php";

    function r_string($length = 10) {
        // generate random string
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    function sanitize($address) {
        // Sanitize email address.
        return filter_var(trim($address), FILTER_SANITIZE_EMAIL);
    }

    function check_mail($mail) {
        // Sanitize email
        $email = filter_var(trim($mail), FILTER_SANITIZE_EMAIL);

        // Return true or false if the email is a mail or not.
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function ensure($text) {
        $txt = htmlspecialchars(htmlentities(trim($text)));
        return $txt;
    }


    if ( isset($_POST["sub-mit"]) ) {
        $name = ensure($_POST["name"]);
        $surname = ensure($_POST["surname"]);
        $mail = sanitize($_POST["email"]);
        $tell = ensure($_POST["tel"]);
        $start = ensure($_POST["start"]);
        $end = ensure($_POST["end"]);
        $people = ensure($_POST["ospiti"]);
        $pay = ensure($_POST["pagamento"]);
        $matricola =  ensure(r_string(10));


        if (check_mail($_POST['email'])) {
            $sql = "INSERT INTO Beb (name, surname, email, telefono, start, end, people, pay, matricola) VALUES ('$name', '$surname', '$mail', '$tell', '$start', '$end', '$people', '$pay', '$matricola')";
            $result = $conn->query($sql);
            if ($result) {
                header("Location: ../prenota.php");
            } else {
                die("Error with record. <br /> <a href='../prenota.php'> < Back </a> ");
            }
        } else {
            die("Invalid email address");
        }

    } else {
        die("Sub Mit not defined");
    }
