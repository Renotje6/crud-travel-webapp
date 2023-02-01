<?php

require_once ROOT_PATH . 'includes/functions/database.php';
require_once ROOT_PATH . 'includes/functions/sessions.php';
require_once ROOT_PATH . 'includes/functions/mail.php';

startSession();
checkIfNotLoggedIn();

if (isset($_POST['submit']) && isset($_POST['email'])) {
    $email = $_POST['email'];

    if (empty($email)) {
        $error = 'Vul een e-mailadres in';
        return;
    } else {
        $user = getUserByEmail($email);

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

            sendMail($to, $subject, $message);
        } else {
            $error = 'Geen account gevonden met dit e-mailadres';
        }
    }
}
