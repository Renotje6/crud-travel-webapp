<?php
include ROOT_PATH . 'includes/connection.php';

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

        $user_id = getUserIdFromToken($token);

        if ($user_id == null) {
            header('Location: ' . BASE_URL . 'index.php');
        }

        $sql = "UPDATE USERS SET password = :password WHERE id = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        $sql = "UPDATE RESET_PASSWORD_TOKENS SET expired = 1 WHERE token = :token AND user_id = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':token', $_GET['token'], PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        $success = "Wachtwoord is succesvol gewijzigd";
        $_POST['submit'] = null;
        return;
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

function getUserIdFromToken($token)
{
    global $conn;

    $sql = "SELECT user_id FROM RESET_PASSWORD_TOKENS WHERE token = :token";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
    $stmt->execute();
    $user_id = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user_id) {
        return $user_id['user_id'];
    } else {
        return null;
    }
}
