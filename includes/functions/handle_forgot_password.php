<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ROOT_PATH . 'libraries/PHPMailer/src/Exception.php';
require ROOT_PATH . 'libraries/PHPMailer/src/PHPMailer.php';
require ROOT_PATH . 'libraries/PHPMailer/src/SMTP.php';
include ROOT_PATH . 'includes/connection.php';

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

            $expFormat = mktime(
                date("H") + 1,
                date("i"),
                date("s"),
                date("m"),
                date("d"),
                date("Y")
            );

            $expDate = date("Y-m-d H:i:s", $expFormat);

            $sql = "INSERT INTO RESET_PASSWORD_TOKENS (user_id, token, expiration_date) VALUES (:user_id, :token, :expiration_date)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':user_id', $user['id'], PDO::PARAM_INT);
            $stmt->bindParam(':token', $token, PDO::PARAM_STR);
            $stmt->bindParam(':expiration_date', $expDate, PDO::PARAM_STR);
            $stmt->execute();

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

            $mail->setFrom('1204544@student.roc-nijmegen.nl', 'CRUD App');
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

// function that checks if a token exists for user
function getExistingToken($user_id)
{
    global $conn;

    $sql = "SELECT token FROM RESET_PASSWORD_TOKENS WHERE user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $token = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($token) {
        if (checkIfTokenIsValid($token['token'])) {
            return $token['token'];
        } else {
            return null;
        }
    } else {
        return null;
    }
}


// function that checks if a valid token exists for the user
function checkIfTokenIsValid($token)
{
    global $conn;

    $sql = "SELECT * FROM RESET_PASSWORD_TOKENS WHERE token = :token";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
    $stmt->execute();
    $token = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($token) {
        $expDate = $token['expiration_date'];
        $expDate = strtotime($expDate);
        $today = date("Y-m-d H:i:s");
        $today = strtotime($today);

        if ($today > $expDate || $token['expired'] == 1) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}
