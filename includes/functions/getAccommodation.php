<?php
include_once ROOT_PATH . 'includes/connection.php';

function getAccommodation($accommodationId)
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

function getImages($accommodationId)
{
    global $conn;
    $query = "SELECT URL as image FROM images WHERE accommodationID = :accommodationId";
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

function getReviews($accommodationId)
{
    global $conn;
    $query = "SELECT userID, review, rating FROM reviews WHERE accommodationID = :accommodationId";
    $queryExec = $conn->prepare($query);
    $queryExec->bindParam(":accommodationId", $accommodationId);
    $queryExec->execute();
    $results = $queryExec->fetchAll();
    $reviews = array();
    foreach ($results as $review) {
        $review['user'] = getUser($review['userID']);
        $reviews[] = $review;
    }

    return $reviews;
}

function getUser($userId)
{
    global $conn;
    $query = "SELECT username FROM users WHERE ID = :userId";
    $queryExec = $conn->prepare($query);
    $queryExec->bindParam(":userId", $userId);
    $queryExec->execute();
    $results = $queryExec->fetch();

    return $results['username'];
}
