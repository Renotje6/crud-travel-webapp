<?php
session_start();

include ROOT_PATH . 'includes/connection.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $error = "";

    if (empty($username) || empty($password)) {
        $error = "Vul alle velden in";
        return;
    } else {
        $sql = "SELECT * FROM USERS WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['user'] = $user['id'];
                $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                $_SESSION['last_ping'] = time();

                header('Location: ./index.php');
            } else {
                $error = "Ongeldige gebruikersnaam of wachtwoord.";
            }
        } else {
            $error = "Ongeldige gebruikersnaam of wachtwoord.";
        }
    }
}
