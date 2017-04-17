<?php
/**
 *  PHP-PayPal-IPN Example
 *
 *  This shows a basic example of how to use the IPNListener() PHP class to
 *  implement a PayPal Instant Payment Notification (IPN) listener script.
 *
 *  This package is available at GitHub:
 *  https://github.com/WadeShuler/PHP-PayPal-IPN/
 *
 *  @package    PHP-PayPal-IPN
 *  @link       https://github.com/WadeShuler/PHP-PayPal-IPN
 *  @forked     https://github.com/Quixotix/PHP-PayPal-IPN
 *  @author     Wade Shuler
 *  @copyright  Copyright (c) 2015, Wade Shuler
 *  @license    http://choosealicense.com/licenses/gpl-2.0/
 */
// include the IpnListener Class, unless it's in your autoload
require_once('IpnListener.php');

use wadeshuler\paypalipn\IpnListener;
$listener = new IpnListener();
$listener->use_sandbox = true;      // Only needed for testing (sandbox), else omit or set false
$listener->use_curl = FALSE;
if ($verified = $listener->processIpn())  {
    // Valid IPN
    /*
        1. Check that $_POST['payment_status'] is "Completed"
        2. Check that $_POST['txn_id'] has not been previously processed
        3. Check that $_POST['receiver_email'] is your Primary PayPal email
        4. Check that $_POST['payment_amount'] and $_POST['payment_currency'] are correct
    */
    $transactionRawData = $listener->getRawPostData();      // raw data from PHP input stream
    $transactionData = $listener->getPostData();            // POST data array

    $status = explode("=", $transactionData[6])[1];    //6
    $receiver = explode("=", $transactionData[26])[1]; //26
    $custom = explode("=", $transactionData[14])[1];
    $txn_id = explode("=", $transactionData[22])[1];


    if ($status == 'Completed' or $status == 'payment_status=Completed') {

            $host = 'sql8.freemysqlhosting.net';
        $name = "sql8167203";
        $port = 3306;
        $user = "sql8167203";
        $pass = "sPxjck5E8z";

        $tables = array(
        "acceppted" => "BebAccettate",
        "denied" => "BebRifiutate",
        "completed" => "BebPagate",
        "suspended" => "Beb"
        );

        error_reporting(E_ERROR | E_PARSE);

        // Connection init
        $conn = new mysqli($host, $user, $pass, $name);

        if ($conn->connect_error) {
            die("ERROR: " . $conn->connect_error) ;
        }

        $custom = $_GET["custom"];
        $txn_id = $_GET["txn_id"];

        $sql = "INSERT INTO BebPagate SELECT * FROM BebAccettate WHERE matricola='$custom'";
        $res = $conn->query($sql) or die("ERROR: " . $conn->error);

        $sql = "DELETE FROM BebAccettate WHERE matricola='$custom'";
        $res = $conn->query($sql) or die("ERROR: " . $conn->error);

        $sql = "UPDATE BebPagate SET txn_id='$txn_id' WHERE matricola='$custom'";
        $res = $conn->query($sql) or die("ERROR: " . $conn->error);

        include_once "../admin/requests/libs/mail.php";

        $mail->addAddress("filippo.cozzini@gmail.com");
        $mail->addAddress("fedevitale99@gmail.com");

        $mail->Subject = "Pagamento Effettuato";
        $mail->Body = "Grazie per aver pagato. Ci vediamo presto!";

        $mail->send() or die($mail->ErrorInfo);

    } else {

        file_put_contents('ipn_success.log', print_r($transactionData, true) . PHP_EOL, LOCK_EX | FILE_APPEND);
    }

} else {
    // Invalid IPN
    $errors = $listener->getErrors();
    // Feel free to modify path and filename. Make SURE THE DIRECTORY IS WRITEABLE!
    // For security reasons, you should use a path above/outside of your webroot
    file_put_contents('ipn_errors.log', print_r($errors, true) . PHP_EOL, LOCK_EX | FILE_APPEND);
}