<?php
require_once '../includes/config.php';
require_once ROOT_PATH . 'includes/partials/header.php';
require_once ROOT_PATH . 'includes/controllers/admin.php';
?>
<main>
    <section class="bookings">
        <h2>Boekingen</h2>
        <table>
            <tr>
                <th>Reserveringsnummer</th>
                <th>Accommodatie</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Volwassenen</th>
                <th>Kinderen</th>
                <th>Totaal Prijs</th>
                <th>Status</th>
                <th>Actie</th>
            </tr>
            <?php foreach ($bookings as $booking) : ?>
                <tr>
                    <td><?php echo $booking['id'] ?></td>
                    <td><?php echo $booking['name'] ?></td>
                    <td><?php echo $booking['check_in'] ?></td>
                    <td><?php echo $booking['check_out'] ?></td>
                    <td><?php echo $booking['adults'] ?></td>
                    <td><?php echo $booking['children'] ?></td>
                    <td><?php echo $booking['status'] ?></td>
                    <td>€ <?php echo $booking['total_price'] ?></td>
                    <td>
                        <a href="<?php echo BASE_URL ?>includes/controllers/delete_booking.php?booking=<?php echo $booking['id'] ?>"><button class="delete-btn">Annuleer</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>


</main>