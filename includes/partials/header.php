<?php
require_once ROOT_PATH . 'includes/functions/sessions.php';

startSession();

$styles = [
    "index.php" => [
        "homepage.css",
        "search_section.css",
    ],
    "search.php" => [
        "search_page.css",
        "search_section.css",
    ],
    "accommodation.php" => [
        "accommodation.css",
    ],
    "login.php" => [
        "account_form.css",
    ],
    "registration.php" => [
        "account_form.css",
    ],
    "forgot_password.php" => [
        "account_form.css",
    ],

    "change_password.php" => [
        "account_form.css",
    ],
    "booking.php" => [
        "booking.css",
    ],
    "profile.php" => [
        "profile.css",
    ],
    "admin.php" => [
        "admin.css",
    ],
];

$scripts = [
    "accommodation.php" => [
        "slideshow.js",
    ],

    "booking.php" => [
        "booking.js",
    ],
    "admin.php" => [
        "toggle_modal.js",
    ],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/variables.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/index.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/navigation.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/footer.css" />

    <?php
    if (isset($styles[basename($_SERVER['PHP_SELF'])])) {
        foreach ($styles[basename($_SERVER['PHP_SELF'])] as $style) {
            echo "<link rel='stylesheet' href='" . BASE_URL . "css/" . $style . "' />";
        }
    }

    if (isset($scripts[basename($_SERVER['PHP_SELF'])])) {

        foreach ($scripts[basename($_SERVER['PHP_SELF'])] as $script) {
            echo "<script src='" . BASE_URL . "js/" . $script . "' defer></script>";
        }
    }
    ?>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <script src="<?php echo BASE_URL; ?>js/toggle_nav_menu.js" defer></script>
    <script src="<?php echo BASE_URL; ?>js/toggle_profile_button.js" defer></script>

    <title>Document</title>
</head>

<body>
    <nav>
        <div class="toggle"><span></span><span></span><span></span></div>
        <div class="brand-name">
            <h1><span>Inner</span>Sunn</h1>
        </div>
        <ul class="navigation-links">
            <div class="close-btn">&#10006;</div>
            <li class="nav-item"><a href="<?php echo BASE_URL ?>index.php">Home</a></li>
            <li class="nav-item"><a href="<?php echo BASE_URL ?>pages/search.php">Zoek & Boek</a></li>
            <li class="nav-item"><a href="#">Contact</a></li>
            <li class="nav-item"><a href="#">Over Ons</a></li>
        </ul>

        <?php
        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) :
        ?>
            <div class="dropdown-container">
                <div class="dropdown">
                    <button class="dropdown-button">
                        <span class="material-symbols-outlined">account_circle</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo BASE_URL ?>pages/profile.php">Profiel</a></li>
                        <?php if (checkIfAdmin()) {
                            echo "<li><a href='" . BASE_URL . "pages/admin.php'>Dashboard</a></li>";
                        } ?>
                        <li><a href="<?php echo BASE_URL ?>includes/controllers/logout.php">Uitloggen</a></li>
                    </ul>
                </div>
            </div>
        <?php else : ?>
            <div class="dropdown-container">
                <div class="dropdown">
                    <a href="<?php echo BASE_URL ?>pages/login.php">
                        <button class="dropdown-button">
                            <span class="material-symbols-outlined">account_circle</span>
                        </button>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </nav>