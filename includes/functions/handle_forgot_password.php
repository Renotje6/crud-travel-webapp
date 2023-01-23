<?php
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
            $token = bin2hex(random_bytes(32));
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
            $link = "localhost" . BASE_URL . "reset_password.php?token=" . $token;
            $message = "
                <p>Beste Gebruiker,</p>
                <p>Er is een verzoek gedaan om uw wachtwoord te resetten. Klik op de onderstaande link om uw wachtwoord te resetten.</p>
                <p><a href='" . $link . "'>" . $link . "</a></p>
                <p>Als u geen verzoek heeft gedaan om uw wachtwoord te resetten, kunt u deze e-mail negeren.</p>
            ";
            $headers = [
                'From' => 'crud_app@localhost',
                'Reply-To' => 'crud_app@localhost',
                'MIME-Version' => '1.0',
                'Content-Type' => 'text/html; charset=ISO-8859-1',
                'X-Mailer' => 'PHP/' . phpversion()
            ];

            if (mail($to, $subject, $message, $headers)) {
                $error =  "succes";
            } else {
                $error = 'Er is iets fout gegaan, probeer het later opnieuw';
            }
        } else {
            $error = 'Geen account gevonden met dit e-mailadres';
        }
    }
}
