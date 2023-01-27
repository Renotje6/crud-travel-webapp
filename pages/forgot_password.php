<?php
require_once("../includes/config.php");
require_once(ROOT_PATH . "/includes/partials/header.php");
require_once(ROOT_PATH . "/includes/controllers/forgot_password.php");
?>
<main>
    <div class="container">
        <div class="image">
        </div>
        <?php if (!isset($success) || empty($success)) : ?>
            <form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> class="log-in" autocomplete="off">
                <h4><span>Inner</span>Sunn</h4>
                <p>Vul jouw e-mailadres in en we sturen een e-mail met een link om een nieuw wachtwoord in te stellen</p>
                <?php if (isset($error) && !empty($error))  echo "<p class='error'>" . $error . "</p>" ?>
                <div class="floating-label">
                    <input placeholder="Email" type="text" name="email" id="email" autocomplete="off">
                    <label for="email">Email:</label>
                </div>
                <button type="submit" name="submit">verzenden</button>
            </form>
        <?php else : ?>
            <form method="POST" action="" class="log-in" autocomplete="off">
                <h4><span>Inner</span>Sunn</h4>
                <p>Er is een e-mail verstuurd naar <?php echo $email ?> met een link om een nieuw wachtwoord in te stellen</p>
            </form>
        <?php endif; ?>
    </div>
</main>