<?php
session_start();

include ROOT_PATH . 'includes/connection.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $error = "";

    if (empty($email) || empty($password)) {
        $error = "Vul alle velden in";
        return;
    } else {
        $sql = "SELECT * FROM USERS WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['user'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['last_ping'] = time();

                header('Location: ' . BASE_URL . 'index.php');
            } else {
                $error = "Ongeldige gebruikersnaam of wachtwoord.";
            }
        } else {
            $error = "Ongeldige gebruikersnaam of wachtwoord.";
        }
    }
}
