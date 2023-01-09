<?php
$styles = [
    "index.php" => [
        "homepage.css"
    ]
]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/variables.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/index.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/navigation.css" />

    <?php
    ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/homepage.css" />

    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <script src="<?php echo BASE_URL; ?>js/toggle_nav_menu.js" defer></script>
</head>

<body>
    <nav>
        <div class="toggle"><span></span><span></span><span></span></div>
        <div class="brand-name">
            <h1><span>Inner</span>Sunn</h1>
        </div>
        <ul class="navigation-links">
            <div class="close-btn">&#10006;</div>
            <li class="nav-item"><a href="#">Home</a></li>
            <li class="nav-item"><a href="#">Zoek & Boek</a></li>
            <li class="nav-item"><a href="#">Contact</a></li>
            <li class="nav-item"><a href="#">Over Ons</a></li>
        </ul>
        <p class="button"><a href="#">Login</a></p>
    </nav>