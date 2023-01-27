<?php
require_once ROOT_PATH . 'includes/functions/database.php';
require_once ROOT_PATH . 'includes/functions/sessions.php';

startSession();
checkIfNotLoggedIn();

if (!isset($success) && (!isset($_GET['token']) || !checkIfTokenIsValid($_GET['token']))) {
    header('Location: ' . BASE_URL . 'index.php');
}

if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    $token = $_POST['token'];
    $errors = array();

    if (empty($password) || empty($repeat_password)) {
        $errors['password'] = "Vul alle velden in";
        return;
    } else {
        if (!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*\W).{8,}$/', $password)) {
            $errors['password'] = "Wachtwoord moet minimaal 8 karakters lang zijn en <br/> moet minimaal 1 nummer, 1 hoofdletter en <br /> 1 speciaal karakter bevatten.";
            return;
        } elseif ($password != $repeat_password) {
            $errors['repeat_password'] = "Wachtwoorden komen niet overeen";
            return;
        }

        $user_id = getUserIdByToken($token);

        if ($user_id == null) {
            header('Location: ' . BASE_URL . 'index.php');
        }

        updateToken($user_id);

        $success = "Wachtwoord is succesvol gewijzigd";
        $_POST['submit'] = null;
        return;
    }
}
