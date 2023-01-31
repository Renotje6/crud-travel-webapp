<?php
require_once ROOT_PATH . 'includes/functions/database.php';

$bookings = getAllBookings();

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
