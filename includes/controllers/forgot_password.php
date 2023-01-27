<?php

require ROOT_PATH . 'libraries/PHPMailer/src/Exception.php';
require ROOT_PATH . 'libraries/PHPMailer/src/PHPMailer.php';
require ROOT_PATH . 'libraries/PHPMailer/src/SMTP.php';
include ROOT_PATH . 'includes/functions/database.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit']) && isset($_POST['email'])) {
    $email = $_POST['email'];

    if (empty($email)) {
        $error = 'Vul een e-mailadres in';
        return;
    } else {
        $sql = "SELECT * FROM USERS WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $token =  getExistingToken($user['id']);

            if ($token == null) {
                $token = bin2hex(random_bytes(32));
            }

            insertToken($user['id'], $token);

            $to = $user['email'];
            $subject = "Wachtwoord resetten";
            $link = "localhost" . BASE_URL . "pages/change_password.php?token=" . $token;
            $message = "
                <p>Beste Gebruiker,</p>
                <p>Er is een verzoek gedaan om uw wachtwoord te resetten. Klik op de onderstaande link om uw wachtwoord te resetten.</p>
                <p><a href='" . $link . "'>" . $link . "</a></p>
                <p>Als u geen verzoek heeft gedaan om uw wachtwoord te resetten, kunt u deze e-mail negeren.</p>
            ";

            $mail = new PHPMailer;
            $mail->isSMTP();
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
            $mail->Body = $message;
            $mail->AltBody = strip_tags($message);

            if ($mail->send()) {
                $success =  'Er is een e-mail verstuurd naar ' . $to . ' met instructies om uw wachtwoord te resetten.';
            } else {
                $error = 'Er is iets fout gegaan. Probeer het later opnieuw.';
            }
        } else {
            $error = 'Geen account gevonden met dit e-mailadres';
        }
    }
}
