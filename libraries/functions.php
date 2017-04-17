<?php
    function r_string($length = 10) {
        // generate random string
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    function sanitize($var) {
        // Sanitize email address.
        $isMail = filter_var($var, FILTER_VALIDATE_EMAIL);
        if ($isMail) {
            return filter_var(trim($var), FILTER_SANITIZE_EMAIL);
        } else {
            return filter_var(trim($var), FILTER_SANITIZE_STRING);
        }
    }

    function check_mail($mail) {
        // Sanitize email
        $email = filter_var(trim($mail), FILTER_SANITIZE_EMAIL);

        // Return true or false if the email is a mail or not.
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function ensure($text) {
        $txt = htmlspecialchars(htmlentities(trim($text)));
        return filter_var($txt, FILTER_SANITIZE_STRING);
    }

    function week_counter() {
        $host = 'sql8.freemysqlhosting.net';
        $name = "sql8167203";
        $user = "sql8167203";
        $pass = "sPxjck5E8z";
        //$port = 3306;

        // Connection init
        $conn = new mysqli($host, $user, $pass, $name);

        if ($conn->connect_error) {
            die("ERROR: " . $conn->connect_error) ;
        }

        $next_week = strtotime('next week');
        $monday = date("Y-m-d", strtotime('monday', $next_week));
        $tuesday = date("Y-m-d", strtotime('tuesday', $next_week));
        $wednesday = date("Y-m-d", strtotime('wednesday', $next_week));
        $thursday = date("Y-m-d", strtotime('thursday', $next_week));
        $friday = date("Y-m-d", strtotime('friday', $next_week));
        $saturday = date("Y-m-d", strtotime('saturday', $next_week));
        $sunday = date("Y-m-d", strtotime('sunday', $next_week));


        $sqlMon = "SELECT * FROM BebAccetate WHERE start='$monday'";
        $sqlTue = "SELECT * FROM BebAccetate WHERE start='$tuesday'";
        $sqlWed = "SELECT * FROM BebAccetate WHERE start='$wednesday'";
        $sqlThu = "SELECT * FROM BebAccetate WHERE start='$thursday'";
        $sqlFri = "SELECT * FROM BebAccetate WHERE start='$friday'";
        $sqlSat = "SELECT * FROM BebAccetate WHERE start='$saturday'";
        $sqlSun = "SELECT * FROM BebAccetate WHERE start='$sunday'";

        $count = $conn->query($sqlMon)->num_rows;
        $count += $conn->query($sqlTue)->num_rows;
        $count += $conn->query($sqlWed)->num_rows;
        $count += $conn->query($sqlThu)->num_rows;
        $count += $conn->query($sqlFri)->num_rows;
        $count += $conn->query($sqlSat)->num_rows;
        $count += $conn->query($sqlSun)->num_rows;
        $conn->close();

        return $count;
    }