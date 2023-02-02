<?php
require_once ROOT_PATH . 'includes/functions/database.php';
require_once ROOT_PATH . 'includes/functions/sessions.php';
require_once ROOT_PATH . 'includes/functions/mail.php';

startSession();
checkSession();

if (!isset($_GET['accommodation'])) {
    header("Location: " . BASE_URL . "pages/search.php");
} else {
    $accommodationId = $_GET['accommodation'];
}

$accommodation = getAccommodationById($accommodationId);

if (!$accommodation) {
    header("Location: " . BASE_URL . "pages/search.php");
}

if (isset($_POST['submit'])) {
    $errors = array();
    $values = array();

    if (!isset($_POST['adults']) || !isset($_POST['children']) || !isset($_POST['check-in']) || !isset($_POST['check-out']) || !isset($_POST['total-price']) || !isset($_POST['accommodation-id'])) {
        $errors = array_merge($errors, ["general" => "Vul alle velden in."]);
        return;
    } else {
        $adults = $_POST['adults'];
        $children = $_POST['children'];
        $checkIn = $_POST['check-in'];
        $checkOut = $_POST['check-out'];
        $totalPrice = $_POST['total-price'];
        $userId = $_SESSION['user']['id'];
        $accommodationId = $_POST['accommodation-id'];

        // Remove all non numeric characters from the total price
        $totalPrice = preg_replace('/[^0-9]/', '', $totalPrice);

        $values = array_merge($values, ["adults" => $adults, "children" => $children, "check-in" => $checkIn, "check-out" => $checkOut, "total-price" => $totalPrice]);

        //check if check-in date is before check-out date
        if ($checkIn > $checkOut) {
            $errors = array_merge($errors, ["check-in" => "Check-in datum moet voor de check-out datum liggen."]);
        }

        //check if check-in date is today or later
        if ($checkIn < date("Y-m-d")) {
            $errors = array_merge($errors, ["check-in" => "Check-in datum moet vandaag of later zijn."]);
        }

        //check if check-out date is today or later
        if ($checkOut < date("Y-m-d")) {
            $errors = array_merge($errors, ["check-out" => "Check-out datum moet vandaag of later zijn."]);
        }

        //check if check-in date is not more than 1 year in the future
        if ($checkIn > date("Y-m-d", strtotime("+1 year"))) {
            $errors = array_merge($errors, ["check-in" => "Check-in datum mag niet meer dan 1 jaar in de toekomst liggen."]);
        }

        //check if check-out date is not more than 1 year in the future
        if ($checkOut > date("Y-m-d", strtotime("+1 year"))) {
            $errors = array_merge($errors, ["check-out" => "Check-out datum mag niet meer dan 1 jaar in de toekomst liggen."]);
        }

        if (empty($errors)) {
            $sql = "INSERT INTO bookings (accommodation_id, user_id, adults, children, check_in, check_out, total_price) VALUES (:accommodation_id, :user_id, :adults, :children, :check_in, :check_out, :total_price)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':accommodation_id', $accommodationId);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':adults', $adults);
            $stmt->bindParam(':children', $children);
            $stmt->bindParam(':check_in', $checkIn);
            $stmt->bindParam(':check_out', $checkOut);
            $stmt->bindParam(':total_price', $totalPrice);
            $stmt->execute();

            $booking_id = $conn->lastInsertId();
            $success = true;


            $accommodation = getAccommodationById($accommodationId);

            // Send email to user
            $to = $_SESSION['user']['email'];
            $subject = "Bevestiging boeking";

            $message = "<h1>Bevestiging boeking</h1>";
            $message .= "<p>Beste " . $_SESSION['user']['username'] . ",</p>";
            $message .= "<p>Bedankt voor uw boeking bij InnerSunn.</p>";
            $message .= "<p>Uw gegevens:</p>";
            $message .= "<ul>";
            $message .= "<li>Email: " . $_SESSION['user']['email'] . "</li>";
            $message .= "<li>Accommodatie: " . $accommodation['name'] . "</li>";
            $message .= "<li>Reserveringsnummer: " . $booking_id . "</li>";
            $message .= "<li>Aantal volwassenen: " . $adults . "</li>";
            $message .= "<li>Aantal kinderen: " . $children . "</li>";
            $message .= "<li>Check-in datum: " . $checkIn . "</li>";
            $message .= "<li>Check-out datum: " . $checkOut . "</li>";
            $message .= "<li>Totaalprijs: &euro;" . $totalPrice . "</li>";
            $message .= "</ul>";
            $message .= "<p>Wij hopen dat u een fijne vakantie heeft!</p>";
            $message .= "<p>Met vriendelijke groet,</p>";
            $message .= "<p>InnerSunn</p>";



            if (sendMail($to, $subject, $message)) {
                $success = true;
            } else {
                $errors = array_merge($errors, ["general" => "Er is iets fout gegaan."]);
            }
        } else {
            $errors = array_merge($errors, ["general" => "Er is iets fout gegaan."]);
        }
    }
}
