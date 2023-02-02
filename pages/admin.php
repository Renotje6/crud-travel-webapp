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
            <?php foreach ($bookings as $key => $booking) : ?>
                <tr id="booking-<?php echo $key ?>">
                    <td><?php echo $booking['id'] ?></td>
                    <td><?php echo $booking['name'] ?></td>
                    <td><?php echo $booking['check_in'] ?></td>
                    <td><?php echo $booking['check_out'] ?></td>
                    <td><?php echo $booking['adults'] ?></td>
                    <td><?php echo $booking['children'] ?></td>
                    <td><?php echo $booking['status'] ?></td>
                    <td>€ <?php echo $booking['total_price'] ?></td>
                    <td>
                        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                            <input type="hidden" name="index" value=<?php echo $key ?>>
                            <input type="hidden" name="booking_id" value=<?php echo $booking['id'] ?>>
                            <button type="submit" class="delete-btn" name="cancel_booking">Annuleer</button>
                        </form>

                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
    <section class="users">
        <h2>Gebruikers</h2>
        <table>
            <tr>
                <th>Gebruikersnaam</th>
                <th>Email</th>
                <th>Actie</th>
            </tr>
            <?php foreach ($users as $key => $user) : ?>
                <tr id="user-<?php echo $key ?>">
                    <td><?php echo $user['username'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                            <input type="hidden" name="user_id" value=<?php echo $user['id'] ?>>
                            <input type="hidden" name="index" value=<?php echo $key ?>>
                            <button type="submit" class="delete-btn" name="delete_user" <?php echo $user['is_admin'] == 1 ? " disabled" : "" ?>>Verwijder</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
    <section class="accommodations">
        <h2>Accommodatie</h2>
        <!-- add accommodation in a modal-->
        <button class="add-btn" id="add-accommodation-btn" onclick="toggleModal()">Voeg toe</button>
        <table>
            <tr>
                <th>Naam</th>
                <th>Adres</th>
                <th>Plaats</th>
                <th>Actie</th>
            </tr>
            <?php foreach ($accommodations as $key => $accommodation) : ?>
                <tr id="accommodation-<?php echo $key ?>">
                    <td><?php echo $accommodation['name'] ?></td>
                    <td><?php echo $accommodation['address'] ?></td>
                    <td><?php echo $accommodation['city'] ?></td>
                    <td>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                            <input type="hidden" name="accommodation_id" value=<?php echo $accommodation['id'] ?>>
                            <input type="hidden" name="index" value=<?php echo $key ?>>
                            <button type="submit" class="delete-btn" name="delete_accommodation">Verwijder</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
    <div class="modal">
        <div class="modal-content">
            <span class="close" onclick="toggleModal();">&times;</span>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
                <div class="floating-label">
                    <label for="name">Naam</label>
                    <input type="text" name="name" id="name" placeholder="Naam" required>
                </div>
                <div class="floating-label">
                    <label for="city">Land</label>
                    <input type="text" name="country" id="country" placeholder="Land" required>
                </div>
                <div class="floating-label">
                    <label for="city">Plaats</label>
                    <input type="text" name="city" id="city" placeholder="Plaats" required>
                </div>
                <div class="floating-label">
                    <label for="address">Adres</label>
                    <input type="text" name="address" id="address" placeholder="Adres" required>
                </div>
                <div class="floating-label">
                    <label for="price">Prijs</label>
                    <input type="number" name="price" id="price" placeholder="Prijs" required>
                </div>
                <div class="floating-label">
                    <label for="description">Beschrijving</label>
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Beschrijving" required></textarea>
                </div>
                <input type="file" name="images[]" id="image" accept="image/png, image/jpeg, image/jpg" multiple max=5 required>
                <button type="submit" class="" name="add_accommodation">Voeg toe</button>
            </form>
        </div>
    </div>


</main>