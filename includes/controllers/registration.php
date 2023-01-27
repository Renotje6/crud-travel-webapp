<?php
require_once ROOT_PATH . 'includes/functions/database.php';
require_once ROOT_PATH . 'includes/functions/sessions.php';

startSession();
checkIfNotLoggedIn();


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $errors = array();
    $values = array();

    if (empty($username) || empty($email) || empty($password)) {
        $errors = array_merge($errors, ["general" => "Vul alle velden in."]);
        return;
    } else {
        $values = array_merge($values, ["username" => $username, "email" => $email]);

        if (str_contains($username, " ")) {
            $errors = array_merge($errors, ["username" => "Gebruikersnaam mag geen spaties bevatten."]);
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors = array_merge($errors, ["email" => "Email is ongeldig."]);
        }
        if (!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*\W).{8,}$/', $password)) {
            $errors = array_merge($errors, ["password" => "Wachtwoord moet minimaal 8 karakters lang zijn en moet minimaal 1 nummer, 1 hoofdletter en 1 speciaal karakter bevatten."]);
        }

        $user = getUserByUsername($username);

        if ($user) {
            $errors = array_merge($errors, ["username" => "Gebruikersnaam bestaat al."]);
        } else {
            $user = getUserByEmail($email);

            if ($user) {
                $errors = array_merge($errors, ["email" => "Email bestaat al."]);
            } else {
                $user = insertUser($username, $email, $password);
                header('Location: ./login.php');
            }
        }
    }
}
