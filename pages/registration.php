<?php
require_once("../includes/config.php");
include(ROOT_PATH . "/includes/header.php");
include(ROOT_PATH . "/includes/functions/handleRegistration.php");
?>
<main>
    <div class="session">
        <div class="left">
        </div>
        <form id="registration-form" autocomplete="off" method="POST" action="registration.php" onsubmit="return validateForm();">
            <h4><span>Inner</span>Sunn</h4>
            <p>Welkom! Creëer een nieuw account.</p>
            <div class="floating-label">
                <input placeholder="Gebruikersnaam" type="text" name="username" id="username" autocomplete="off" <?php if (isset($values['username'])) echo 'value=' . $values['username'];
                                                                                                                    if (isset($errors['username'])) echo ' style="border-bottom: 1px red solid"' ?> required>
                <label for="username">Gebruikersnaam:</label>
            </div>
            <div class="error username"><?php if (isset($errors['username'])) echo $errors['username'] ?></div>
            <div class="floating-label">
                <input placeholder="Email" type="text" name="email" id="email" autocomplete="off" <?php if (isset($values['email'])) echo 'value=' . $values['email'] . ' ';
                                                                                                    if (isset($errors['email'])) echo ' style="border-bottom: 1px red solid" '
                                                                                                    ?>required>
                <label for="email">Email:</label>
            </div>
            <div class="error email"><?php if (isset($errors['email'])) echo $errors['email'] ?></div>
            <div class="floating-label">
                <input placeholder="Wachtwoord" type="password" name="password" id="password" autocomplete="off" <?php
                                                                                                                    if (isset($errors['password'])) echo 'style="border-bottom: 1px red solid"' ?> required>
                <label for="password">Wachtwoord:</label>
            </div>
            <div class="error password"><?php if (isset($errors['password'])) echo $errors['password'] ?></div>
            <div class="error password"></div>
            <button type="submit" name="submit">Registreren</button>
            <p class="create-account">Heb je al een account? <a href="<?php echo BASE_URL ?>/pages/login.php">Log in</a></p>
        </form>
    </div>
</main>