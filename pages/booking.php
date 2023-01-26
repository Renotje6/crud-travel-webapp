<?php
require_once("../includes/config.php");
include(ROOT_PATH . "includes/partials/header.php");
include(ROOT_PATH . "includes/functions/get_accommodation.php");
include(ROOT_PATH . "includes/controllers/booking.php");

if (!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != true) {
    $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
    header('Location: ' . BASE_URL . 'pages/login.php');
}


if (!isset($_GET['accommodation'])) {
    header("Location: " . BASE_URL . "pages/search.php");
} else {
    $accommodationId = $_GET['accommodation'];
}

$accommodation = getAccommodationById($accommodationId);

if (!$accommodation) {
    header("Location: " . BASE_URL . "pages/search.php");
}

?>

<main>
    <?php if (!isset($success) || empty($success) || $success == false) : ?>
        <div class="container">
            <section class="accommodation-image">
                <img src="<?php echo BASE_URL . "resources/images/accommodations/" . $accommodation['images'][0] ?>" alt=" Chlamydosaurus kingii">
            </section>
            <section class="accommodation-info">
                <h2><?php echo $accommodation['name'] ?></h2>
                <h3><?php echo $accommodation['city'] . ', ' . $accommodation['address'] ?></h3>
                <div class="prices">
                    <ul>
                        <li>Volwassenen: €<?php echo $accommodation['price'] ?> per nacht</li>
                        <li>Kinderen: €<?php echo round($accommodation['price'] / 2, 0) ?> per nacht</li>
                        <li>Reserveringskosten: €50</li>
                    </ul>
                </div>
            </section>
            <section class="booking-form">
                <h2>Boek nu!</h2>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?accommodation=" . $_GET['accommodation'] ?>" method="POST">
                    <input type="hidden" name="accommodation-id" value="<?php echo $_GET['accommodation'] ?>">
                    <label for="adults">Volwassenen</label>
                    <input type="number" name="adults" id="adults" min="1" max="10" value="1" onchange="calculateTotalPrice(<?php echo $accommodation['price'] ?>, 50);">
                    <label for="children">Kinderen</label>
                    <input type="number" name="children" id="children" min="0" max="10" value="0" onchange="calculateTotalPrice(<?php echo $accommodation['price'] ?>, 50);">
                    <label for="check-in">Check-in</label>
                    <input type="date" name="check-in" id="check-in" onchange="checkDates(); calculateTotalPrice(<?php echo $accommodation['price'] ?>, 50);">
                    <label for="check-out">Check-out</label>
                    <input type="date" name="check-out" id="check-out" onchange="checkDates(); calculateTotalPrice(<?php echo $accommodation['price'] ?>, 50);">
                    <label for="total-price">Totaal prijs</label>
                    <input type="text" name="total-price" id="total-price" value="€ <?php echo $accommodation['price'] + 50 ?>" readonly>
                    <button type="submit" name="submit" value="Boeken"> Boeken </button>
                </form>
            </section>
        </div>
    <?php else : ?>
        <div class="confirmation-container">
            <section class="booking-info">
                <h2>Boeking succesvol!</h2>
                <p>Bedankt voor het boeken bij <?php echo $accommodation['name'] ?>.<br /> Uw boeking is succesvol gemaakt. U ontvangt een bevestigingsmail op het opgegeven e-mailadres.</p>
            </section>
        </div>
    <?php endif; ?>
</main>