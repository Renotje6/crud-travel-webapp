<?php
include_once ROOT_PATH . 'includes/connection.php';
function getTop6()
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
