<?php

include ROOT_PATH . 'includes/functions/database.php';

if (!isset($_GET['accommodation'])) {
    header("Location: " . BASE_URL . "pages/search.php");
} else {
    $accommodationId = $_GET['accommodation'];
}

$accommodation = getAccommodationById($accommodationId);

if ($accommodation == null) {
    header("Location: " . BASE_URL . "pages/search.php");
}
