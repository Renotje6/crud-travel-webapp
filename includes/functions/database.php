<?php

require_once ROOT_PATH . 'includes/connection.php';

//////////////////////////////////////////////////////////////////
////////////////////  USER FUNCTIONS  ////////////////////////////
//////////////////////////////////////////////////////////////////

/* 
    * Function that gets the user by id
    * @param $userId
    * @return $results['username']
*/
function getUserById($userId)
{
    global $conn;
    $query = "SELECT * FROM USERS WHERE ID = :userId";
    $queryExec = $conn->prepare($query);
    $queryExec->bindParam(":userId", $userId);
    $queryExec->execute();
    $results = $queryExec->fetch();

    return $results;
}

/* 
    * Function that gets the user by email
    * @param $email
    * @return $user
*/
function getUserByEmail($email)
{
    global $conn;
    $query = "SELECT * FROM USERS WHERE email = :email";
    $queryExec = $conn->prepare($query);
    $queryExec->bindParam(":email", $email, PDO::PARAM_STR);
    $queryExec->execute();
    $user = $queryExec->fetch(PDO::FETCH_ASSOC);

    return $user;
}

/* 
    * Function that gets the user by username
    * @param $username
    * @return $user
*/
function getUserByUsername($username)
{
    global $conn;
    $query = "SELECT * FROM USERS WHERE username = :username";
    $queryExec = $conn->prepare($query);
    $queryExec->bindParam(":username", $username, PDO::PARAM_STR);
    $queryExec->execute();
    $user = $queryExec->fetch(PDO::FETCH_ASSOC);

    return $user;
}

/*
    * Function that inserts a new user into the database
    * @param $username
    * @param $email
    * @param $password
    * @return $user
*/
function insertUser($username, $email, $password)
{
    global $conn;
    $query = "INSERT INTO USERS (username, email, password) VALUES (:username, :email, :password)";
    $queryExec = $conn->prepare($query);
    $queryExec->bindParam(":username", $username, PDO::PARAM_STR);
    $queryExec->bindParam(":email", $email, PDO::PARAM_STR);
    $queryExec->bindParam(":password", password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
    $queryExec->execute();
    $user = $queryExec->fetch(PDO::FETCH_ASSOC);

    return $user;
}

/* 
    * Function that updates the user's password
    * @param $user_id
    * @param $password
*/
function updatePassword($user_id, $password)
{
    global $conn;

    $sql = "UPDATE USERS SET password = :password WHERE id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
}

///////////////////////////////////////////////////////////////////
/////////////  RESET PASSWORD TOKENS  FUNCTIONS  /////////////////
//////////////////////////////////////////////////////////////////

/* 
    * Function that gets the user_id by token
    * @param $token
    * @return $result['user_id']
*/
function getUserIdByToken($token)
{
    global $conn;

    $sql = "SELECT user_id FROM RESET_PASSWORD_TOKENS WHERE token = :token";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return $result['user_id'];
    } else {
        return null;
    }
}

/* 
    * Function that checks if a valid token exists for the user
    * @param $user_id
    * @return $token['token']
*/
function getExistingToken($user_id)
{
    global $conn;

    $sql = "SELECT token FROM RESET_PASSWORD_TOKENS WHERE user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        if (checkIfTokenIsValid($result['token'])) {
            return $result['token'];
        } else {
            return null;
        }
    } else {
        return null;
    }
}

/* 
    * Function that checks if a token is valid
    * @param $token
    * @return boolean
*/
function checkIfTokenIsValid($token)
{
    global $conn;

    $sql = "SELECT * FROM RESET_PASSWORD_TOKENS WHERE token = :token";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($token) {
        $expDate = $result['expiration_date'];
        $expDate = strtotime($expDate);
        $today = date("Y-m-d H:i:s");
        $today = strtotime($today);

        if ($today > $expDate || $result['expired'] == 1) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}

/* 
    * Function that inserts a new token into the database
    * @param $user_id
    * @param $token
    * @return $token
*/
function insertToken($user_id, $token)
{
    global $conn;

    $sql = "INSERT INTO RESET_PASSWORD_TOKENS (user_id, token, expiration_date) VALUES (:user_id, :token, :expiration_date)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
    $stmt->bindValue(':expiration_date', date("Y-m-d H:i:s", strtotime("+1 day")), PDO::PARAM_STR);
    $stmt->execute();
    $token = $stmt->fetch(PDO::FETCH_ASSOC);

    return $token;
}

/* 
    * Function that updates the expired column for a token in the database
    * @param $user_id
*/
function updateToken($user_id)
{
    global $conn;

    $sql = "UPDATE RESET_PASSWORD_TOKENS SET expired = 1 WHERE user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
}

//////////////////////////////////////////////////////////////////
////////////////////  ACCOMMODATION  FUNCTIONS  //////////////////
//////////////////////////////////////////////////////////////////

/* 
    * Function that gets the accommodation by id
    * @param $accommodationId
    * @return $result
*/
function getAccommodationById($accommodationId)
{
    global $conn;
    $result = null;
    $query = "SELECT * FROM accommodations WHERE ID = :accommodationId";
    $queryExec = $conn->prepare($query);
    $queryExec->bindParam(":accommodationId", $accommodationId);
    $queryExec->execute();
    $results = $queryExec->fetch();

    if ($results) {
        $result = $results;
        $result['images'] = getImages($accommodationId);
        $result['reviews'] = getReviews($accommodationId);
    }

    return $result;
}

/* 
    * Function that gets the accommodation images by id
    * @param $accommodationId
    * @return $images
*/
function getImages($accommodationId)
{
    global $conn;
    $query = "SELECT URL as image FROM images WHERE accommodation_id = :accommodationId";
    $queryExec = $conn->prepare($query);
    $queryExec->bindParam(":accommodationId", $accommodationId);
    $queryExec->execute();
    $results = $queryExec->fetchAll();
    $images = array();

    foreach ($results as $image) {
        $images[] = $image['image'];
    }
    return $images;
}

/* 
    * Function that gets the accommodation reviews by id
    * @param $accommodationId
    * @return $reviews
*/
function getReviews($accommodationId)
{
    global $conn;
    $query = "SELECT user_id, review, rating FROM reviews WHERE accommodation_id = :accommodationId";
    $queryExec = $conn->prepare($query);
    $queryExec->bindParam(":accommodationId", $accommodationId);
    $queryExec->execute();
    $results = $queryExec->fetchAll();
    $reviews = array();
    foreach ($results as $review) {
        $review['user'] = getUserById($review['user_id'])['username'];
        $reviews[] = $review;
    }

    return $reviews;
}

/*
    * Function that gets the top 6 accommodations
    * @return $results
*/
function getTop6Accommodations()
{
    global $conn;
    $query = "SELECT ACCOMMODATIONS.id, ACCOMMODATIONS.name, ACCOMMODATIONS.country, ACCOMMODATIONS.city, ACCOMMODATIONS.address, 
                     ACCOMMODATIONS.price, ROUND(AVG(REVIEWS.rating)) AS rating, IMAGES.URL as image
                FROM accommodations 
                INNER JOIN REVIEWS
                ON ACCOMMODATIONS.id = REVIEWS.accommodation_id
                INNER JOIN IMAGES
                ON ACCOMMODATIONS.id = IMAGES.accommodation_id
                WHERE IMAGES.isThumbnail = 1
                GROUP BY ACCOMMODATIONS.name, IMAGES.URL
                ORDER BY rating DESC LIMIT 6;";

    $queryExec = $conn->prepare($query);
    $queryExec->execute();
    $results = $queryExec->fetchAll();

    return $results;
}

/*
    * Function that gets the top 3 locations
    * @return $results
*/
function getTop3Locations()
{
    global $conn;
    $query = "SELECT ACCOMMODATIONS.country, COUNT(country) as count FROM ACCOMMODATIONS
                INNER JOIN BOOKINGS
                ON BOOKINGS.accommodation_id = ACCOMMODATIONS.id
                GROUP BY ACCOMMODATIONS.country
                ORDER BY count DESC LIMIT 3;";

    $queryExec = $conn->prepare($query);
    $queryExec->execute();
    $results = $queryExec->fetchAll();

    return $results;
}

/*
    * Function that searches accommodations by parameters
    * @param $parameters
    * @return $results
*/
function searchAccommodations($parameters)
{
    global $conn;
    $results = [];

    $searchConstraints = "";

    if (!empty($parameters['destination'])) {
        $searchConstraints .= " country LIKE :destination OR city LIKE :destination2 OR name LIKE :destination3 OR address LIKE :destination4";
    }
    if (!empty($parameters['date'])) {
        if (!empty($searchConstraints)) {
            $searchConstraints .= " AND";
        }
        $searchConstraints .= " departure = :date";
    }
    if (!empty($parameters['airport'])) {
        if (!empty($searchConstraints)) {
            $searchConstraints .= " AND";
        }
        $searchConstraints .= " airport LIKE :airport";
    }

    $query = "SELECT ACCOMMODATIONS.id, ACCOMMODATIONS.name, ACCOMMODATIONS.country, ACCOMMODATIONS.city, ACCOMMODATIONS.address, 
                     ACCOMMODATIONS.price, ROUND(AVG(REVIEWS.rating)) AS rating, IMAGES.URL as image
                    FROM accommodations 
                    INNER JOIN REVIEWS
                    ON ACCOMMODATIONS.id = REVIEWS.accommodation_id
                    INNER JOIN IMAGES
                    ON ACCOMMODATIONS.id = IMAGES.accommodation_id
                    WHERE IMAGES.isThumbnail = true";

    if (!empty($searchConstraints)) {
        $query .= " AND (" . $searchConstraints . ")";
        $query .= " GROUP BY ACCOMMODATIONS.name, IMAGES.URL";
    } else {
        $query .= " GROUP BY ACCOMMODATIONS.name, IMAGES.URL";
        $query .= " LIMIT 10";
    }



    $queryExec = $conn->prepare($query);

    if (!empty($parameters['destination'])) {
        $destination = '%' . $parameters['destination'] . '%';
        $queryExec->bindParam(":destination", $destination);
        $queryExec->bindParam(":destination2", $destination);
        $queryExec->bindParam(":destination3", $destination);
        $queryExec->bindParam(":destination4", $destination);
    }
    if (!empty($parameters['airport'])) {
        $airport = '%' . $parameters['airport'] . '%';
        $queryExec->bindParam(":airport", $airport);
    }

    $queryExec->execute();
    $results = $queryExec->fetchAll();
    return $results;
}

//////////////////////////////////////////////////////////////////
//////////////////////  BOOKINGS  FUNCTIONS  /////////////////////
//////////////////////////////////////////////////////////////////

/*
    * Function that gets the bookings by user id
    * @param $userId
    * @return $results
*/
function getBookingsByUserId($userId)
{
    global $conn;
    $query = "SELECT BOOKINGS.id, BOOKINGS.check_in, BOOKINGS.check_out, BOOKINGS.total_price, BOOKINGS.status, BOOKINGS.adults, BOOKINGS.children,
                     ACCOMMODATIONS.name, ACCOMMODATIONS.country, ACCOMMODATIONS.city, ACCOMMODATIONS.address, IMAGES.URL as image
                FROM BOOKINGS
                INNER JOIN ACCOMMODATIONS
                ON BOOKINGS.accommodation_id = ACCOMMODATIONS.id
                INNER JOIN IMAGES
                ON BOOKINGS.accommodation_id = IMAGES.accommodation_id
                WHERE BOOKINGS.user_id = :userId AND IMAGES.isThumbnail = 1
                GROUP BY BOOKINGS.id, IMAGES.URL";

    $queryExec = $conn->prepare($query);
    $queryExec->bindParam(":userId", $userId);
    $queryExec->execute();
    $results = $queryExec->fetchAll();

    return $results;
}

/*
    * Function that cancels a booking by id
    * @param $bookingId
*/
function cancelBookingById($bookingId)
{
    global $conn;
    $query = "UPDATE BOOKINGS SET status = 'CANCELLED' WHERE id = :bookingId";

    $queryExec = $conn->prepare($query);
    $queryExec->bindParam(":bookingId", $bookingId);
    $queryExec->execute();
}

/*
    * Function that deletes a booking by id
    * @param $bookingId
*/
function deleteBookingById($bookingId)
{
    global $conn;
    $query = "DELETE FROM BOOKINGS WHERE id = :bookingId";

    $queryExec = $conn->prepare($query);
    $queryExec->bindParam(":bookingId", $bookingId);
    $queryExec->execute();
}

/*
    * Function that gets all bookings
    * @return $results
*/
function getAllBookings()
{
    global $conn;
    $query = "SELECT BOOKINGS.id, BOOKINGS.check_in, BOOKINGS.check_out, BOOKINGS.total_price, BOOKINGS.status, BOOKINGS.adults, BOOKINGS.children,
                     ACCOMMODATIONS.name, ACCOMMODATIONS.country, ACCOMMODATIONS.city, ACCOMMODATIONS.address, IMAGES.URL as image, USERS.username
                FROM BOOKINGS
                INNER JOIN ACCOMMODATIONS
                ON BOOKINGS.accommodation_id = ACCOMMODATIONS.id
                INNER JOIN IMAGES
                ON BOOKINGS.accommodation_id = IMAGES.accommodation_id
                INNER JOIN USERS
                ON BOOKINGS.user_id = USERS.id
                WHERE IMAGES.isThumbnail = 1
                GROUP BY BOOKINGS.id, IMAGES.URL";

    $queryExec = $conn->prepare($query);
    $queryExec->execute();
    $results = $queryExec->fetchAll();

    return $results;
}
