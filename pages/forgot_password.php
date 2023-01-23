<?php
require_once("../includes/config.php");
include(ROOT_PATH . "/includes/header.php");
include(ROOT_PATH . "/includes/functions/handle_forgot_password.php");

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    header('Location: ' . BASE_URL . 'index.php');
}
?>
<main>
    <div class="container">
        <div class="image">
        </div>
        <form method="POST" action="forgot_password.php" class="log-in" autocomplete="off">
            <h4><span>Inner</span>Sunn</h4>
            <p>Vul jouw e-mailadres in en we sturen een e-mail met een link om een nieuw wachtwoord in te stellen</p>
            <?php if (isset($error) && !empty($error))  echo "<p class='error'>" . $error . "</p>" ?>
            <div class="floating-label">
                <input placeholder="Email" type="text" name="email" id="email" autocomplete="off">
                <label for="email">Email:</label>
            </div>
            <button type="submit" name="submit">verzenden</button>
        </form>
    </div>
</main>