<?php
require_once(__DIR__ . "/config.php");

$styles = [
    "index.php" => [
        "homepage.css",
        "searchsection.css",
    ],
    "searchPage.php" => [
        "searchpage.css",
        "searchsection.css",
    ],
]
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

    <?php
    if (isset($styles[basename($_SERVER['PHP_SELF'])])) {
        foreach ($styles[basename($_SERVER['PHP_SELF'])] as $style) {
            echo "<link rel='stylesheet' href='" . BASE_URL . "css/" . $style . "' />";
        }
    }
    ?>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <script src="<?php echo BASE_URL; ?>js/toggle_nav_menu.js" defer></script>

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
            <li class="nav-item"><a href="<?php echo BASE_URL ?>pages/searchPage.php">Zoek & Boek</a></li>
            <li class="nav-item"><a href="#">Contact</a></li>
            <li class="nav-item"><a href="#">Over Ons</a></li>
        </ul>
        <p class="button"><a href="#">Login</a></p>
    </nav>