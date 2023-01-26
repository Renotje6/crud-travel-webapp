<?php
session_start();

require_once("../includes/config.php");
include(ROOT_PATH . "/includes/partials/header.php");
include(ROOT_PATH . "/includes/controllers/change_password.php");


if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    header('Location: ' . BASE_URL . 'index.php');
}

if (!isset($success) && (!isset($_GET['token']) || !checkIfTokenIsValid($_GET['token']))) {
    header('Location: ' . BASE_URL . 'index.php');
}
?>

<main>
    <div class="container">
        <div class="image">
        </div>
        <?php if (!isset($success)) : ?>
            <form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?token=' . $_GET['token'] ?> class="log-in" autocomplete="off">
                <h4><span>Inner</span>Sunn</h4>
                <p>Wachtwoord vergeten? Geen probleem! Vul hieronder je nieuwe wachtwoord in.</p>
                <input type="hidden" value=<?php echo $_GET['token'] ?> name='token' id='token'>
                <div class="floating-label">
                    <input placeholder="Wachtwoord" type="password" name="password" id="password" autocomplete="off" <?php if (isset($errors['password'])) echo 'style="border-bottom: 1px red solid"' ?> required>
                    <label for="password">Wachtwoord:</label>
                </div>
                <div class="error password"><?php if (isset($errors['password'])) echo $errors['password'] ?></div>
                <div class="floating-label">
                    <input placeholder="Herhaal wachtwoord" type="password" name="repeat_password" id="repeat_password" autocomplete="off" <?php if (isset($errors['repeat_password'])) echo 'style="border-bottom: 1px red solid"' ?> required>
                    <label for="repeat_password">Herhaal wachtwoord:</label>
                </div>
                <div class="error repeat_password"><?php if (isset($errors['repeat_password'])) echo $errors['repeat_password'] ?></div>
                <button type="submit" name="submit">Verzenden</button>
            </form>
        <?php else : ?>
            <form method="" action="" class="log-in" autocomplete="off">
                <h4><span>Inner</span>Sunn</h4>
                <p><?php echo $success ?></p>
                <a href="<?php echo BASE_URL . 'pages/login.php' ?>">Ga naar de inlogpagina</a>
            </form>
        <?php endif; ?>
    </div>
</main>