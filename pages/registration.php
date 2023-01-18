<?php
require_once("../includes/config.php");
// require(ROOT_PATH . "/includes/functions/registration.php");
include(ROOT_PATH . "/includes/header.php");
?>
<main>
    <div class="session">
        <div class="left">
        </div>
        <form id="registration-form" autocomplete="off" method="POST" action="../includes/functions/handleRegistration.php">
            <h4><span>Inner</span>Sunn</h4>
            <p>Welkom! Creëer een nieuw account.</p>
            <div class="floating-label">
                <input placeholder="Gebruikersnaam" type="text" name="username" id="username" autocomplete="off" required>
                <label for="username">Gebruikersnaam:</label>
            </div>
            <div class="error username"></div>
            <div class="floating-label">
                <input placeholder="Email" type="text" name="email" id="email" autocomplete="off" required>
                <label for="email">Email:</label>
            </div>
            <div class="error email"></div>
            <div class="floating-label">
                <input placeholder="Wachtwoord" type="password" name="password" id="password" autocomplete="off" required>
                <label for="password">Wachtwoord:</label>
            </div>
            <div class="error password"></div>
            <button type="submit">Registreren</button>
            <p class="create-account">Heb je al een account? <a href="<?php echo BASE_URL ?>/pages/login.php">Log in</a></p>
        </form>
    </div>
</main>