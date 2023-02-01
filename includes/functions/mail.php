<?php
require_once ROOT_PATH . 'libraries/PHPMailer/src/Exception.php';
require_once ROOT_PATH . 'libraries/PHPMailer/src/PHPMailer.php';
require_once ROOT_PATH . 'libraries/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail($to, $subject, $body)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host = 'smtp-mail.outlook.com';
        $mail->SMTPAuth = true;
        $mail->Username = '1204544@student.roc-nijmegen.nl';
        $mail->Password = 'zTm3w8-B';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('1204544@student.roc-nijmegen.nl', 'InnerSunn');

        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        return false;
    }
}
