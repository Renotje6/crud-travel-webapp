<?php
require_once ROOT_PATH . 'includes/functions/database.php';

$bookings = getAllBookings();
$users = getAllUsers();
$accommodations = getAllAccommodations();

foreach ($bookings as $key => $booking) {
    $bookings[$key]['check_in'] = date('d-m-Y', strtotime($booking['check_in']));
    $bookings[$key]['check_out'] = date('d-m-Y', strtotime($booking['check_out']));

    $bookings[$key]['total_price'] = number_format($booking['total_price'], 2, ',', '.');

    switch ($booking['status']) {
        case 'NOT_PAID':
            $bookings[$key]['status'] = 'Niet betaald';
            break;
        case 'PAID':
            $booking[$key]['status'] = 'Betaald';
            break;
        case 'CANCELLED':
            $bookings[$key]['status'] = 'Geannuleerd';
            break;

        default:
            $bookings[$key]['status'] = 'Onbekend';
            break;
    }
}

if (isset($_POST['cancel_booking'])) {
    $booking_id = $_POST['booking_id'];
    $booking = getBookingById($booking_id);
    $index = $_POST['index'];
    $index == 0 ? $index = 1 : $index;

    if ($booking['status'] === 'NOT_PAID') {
        cancelBookingById($booking_id);
    }
    header('Location: ' . BASE_URL . 'pages/admin.php#booking-' . $index - 1);
}

if (isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];
    $index = $_POST['index'];
    $index == 0 ? $index = 1 : $index;

    $user = getUserById($user_id);

    if ($user['is_admin'] != 1) {
        deleteUser($user_id);
    }

    header('Location: ' . BASE_URL . 'pages/admin.php#user-' . $index - 1);
}

if (isset($_POST['delete_accommodation'])) {
    $accommodation_id = $_POST['accommodation_id'];
    $index = $_POST['index'];
    $index == 0 ? $index = 1 : $index;

    deleteAccommodationById($accommodation_id);

    header('Location: ' . BASE_URL . 'pages/admin.php#accommodation-' . $index - 1);
}

if (isset($_POST['add_accommodation'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $images = $_FILES['images'];

    var_dump($images);

    addAccommodation($name, $country, $city, $address, $description, $price, $images);

    // header('Location: ' . BASE_URL . 'pages/admin.php#accommodations');
}
