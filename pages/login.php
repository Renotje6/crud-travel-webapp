<?php
require_once("../includes/config.php");
include(ROOT_PATH . "/includes/header.php");
?>
<main>
    <div class="container">
        <div class="image">
        </div>
        <form action="" class="log-in" autocomplete="off">
            <h4><span>Inner</span>Sunn</h4>
            <p>Welkom terug! Log in om je account te bekijken:</p>
            <div class="floating-label">
                <input placeholder="Email" type="text" name="email" id="email" autocomplete="off">
                <label for="email">Email:</label>
            </div>
            <div class="floating-label">
                <input placeholder="Wachtwoord" type="password" name="password" id="password" autocomplete="off">
                <label for="password">Wachtwoord:</label>
            </div>
            <p class="forgot-password">
                <a href="">Wachtwoord vergeten? </a>
            </p>
            <button type="submit" onClick="return false;">Log in</button>
            <p class="bottom-text">Nog geen account? <br /><a href="<?php echo BASE_URL ?>pages/registration.php">Creëer een account</a></p>
        </form>
    </div>
</main>