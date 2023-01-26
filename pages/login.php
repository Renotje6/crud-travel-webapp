<?php
require_once("../includes/config.php");
include(ROOT_PATH . "/includes/controllers/login.php");
include(ROOT_PATH . "/includes/partials/header.php");

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    $redirect = $_SESSION['redirect'] ?? BASE_URL . 'index.php';
    unset($_SESSION['redirect']);
    header('Location: ' . $redirect);
}
?>
<main>
    <div class="container">
        <div class="image">
        </div>
        <form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> class="log-in" autocomplete="off">
            <h4><span>Inner</span>Sunn</h4>
            <p>Welkom terug! Log in om je account te bekijken:</p>
            <?php if (isset($error) && !empty($error))  echo "<p class='error'>" . $error . "</p>" ?>
            <div class="floating-label">
                <input placeholder="Email" type="text" name="email" id="email" autocomplete="off">
                <label for="email">Email:</label>
            </div>
            <div class="floating-label">
                <input placeholder="Wachtwoord" type="password" name="password" id="password" autocomplete="off">
                <label for="password">Wachtwoord:</label>
            </div>
            <p class="forgot-password">
                <a href="<?php echo BASE_URL ?>pages/forgot_password.php">Wachtwoord vergeten? </a>
            </p>

            <button type="submit" name="submit">Log in</button>
            <p class="bottom-text">Nog geen account? <br /><a href="<?php echo BASE_URL ?>pages/registration.php">Creëer een account</a></p>
        </form>
    </div>
</main>