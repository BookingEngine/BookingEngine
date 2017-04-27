<?php
    require_once "../../../libraries/PHPMailer/PHPMailerAutoload.php";

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->Username = "jdoe@gmail.com";
    $mail->Password = "***************";

    $mail->SMTPDebug = 0;

    $mail->From = "support@bookingengine.com";
    $mail->FromName = "BookingEngine";
    $mail->IsHTML(true);
