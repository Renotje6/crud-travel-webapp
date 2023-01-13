<?php
function getTop6()
{
    global $conn;
    $query = "SELECT ACCOMMODATIONS.ID, ACCOMMODATIONS.name, ACCOMMODATIONS.country, ACCOMMODATIONS.city, ACCOMMODATIONS.address, 
                     ACCOMMODATIONS.price, ROUND(AVG(REVIEWS.rating)) AS rating, IMAGES.URL as image
                FROM accommodations 
                INNER JOIN REVIEWS
                ON ACCOMMODATIONS.ID = REVIEWS.accommodationID
                INNER JOIN IMAGES
                ON ACCOMMODATIONS.ID = IMAGES.accommodationID
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
                ON BOOKINGS.accommodationID = ACCOMMODATIONS.ID
                GROUP BY ACCOMMODATIONS.country
                ORDER BY count DESC LIMIT 3;";

    $queryExec = $conn->prepare($query);
    $queryExec->execute();
    $results = $queryExec->fetchAll();

    return $results;
}
