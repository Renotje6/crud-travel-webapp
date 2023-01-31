<?php
require_once '../config.php';
require_once ROOT_PATH . '/includes/functions/database.php';

if (isset($_GET['booking'])) {
    $bookingId = $_GET['booking'];

    cancelBookingById($bookingId);
    header('Location: ' . BASE_URL . 'pages/profile.php');
}
