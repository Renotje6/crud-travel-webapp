<?php
require_once("../includes/config.php");
require_once(ROOT_PATH . "/includes/partials/header.php");
require_once(ROOT_PATH . "/includes/controllers/profile.php");
?>
<main>
    <div class="profile-container">
        <section class="account-info">
            <h2>Account Informatie</h2>
            <form>
                <label for="username">Gebruikersnaam:</label>
                <input type="text" name="username" value="<?php echo $user['username'] ?>" readonly>
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $user['email'] ?>" readonly>
            </form>
        </section>
        <section class="bookings">
            <h2>Mijn Boekingen</h2>
            <table>
                <tr>
                    <th>Accommodatie</th>
                    <th>Plaats</th>
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
                        <td><?php echo $booking['name'] ?></td>
                        <td><?php echo $booking['city'] ?></td>
                        <td><?php echo $booking['check_in'] ?></td>
                        <td><?php echo $booking['check_out'] ?></td>
                        <td><?php echo $booking['adults'] ?></td>
                        <td><?php echo $booking['children'] ?></td>
                        <td>€ <?php echo $booking['total_price'] ?></td>
                        <td><?php echo $booking['status'] ?></td>
                        <td>
                            <a href="<?php echo BASE_URL ?>includes/controllers/cancel_booking.php?booking=<?php echo $booking['id'] ?>"><button class="delete-btn">Annuleer</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </div>
</main>