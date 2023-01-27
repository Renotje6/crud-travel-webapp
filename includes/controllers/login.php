<?php
require_once ROOT_PATH . 'includes/functions/database.php';
require_once ROOT_PATH . 'includes/functions/sessions.php';

startSession();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    $redirect = $_SESSION['redirect'] ?? BASE_URL . 'index.php';
    unset($_SESSION['redirect']);
    header('Location: ' . $redirect);
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $error = "";
    $redirect = $_SESSION['redirect'] ?? BASE_URL . 'index.php';

    if (empty($email) || empty($password)) {
        $error = "Vul alle velden in";
        return;
    } else {
        $user = getUserByEmail($email);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['user'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['last_ping'] = time();

                header('Location: ' . $redirect);
            } else {
                $error = "Ongeldige gebruikersnaam of wachtwoord.";
            }
        } else {
            $error = "Ongeldige gebruikersnaam of wachtwoord.";
        }
    }
}
