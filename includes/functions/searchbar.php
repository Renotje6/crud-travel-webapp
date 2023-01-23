<?php
include_once ROOT_PATH . 'includes/connection.php';

function getResults($parameters)
{
    $results = _searchAccommodations($parameters);
    return $results;
}

function _searchAccommodations($parameters)
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
