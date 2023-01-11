<?php
include_once '../includes/connection.php';

function getResults($parameters)
{
    $results = _searchAccommodations($parameters);

    foreach ($results as &$result) {
        $result['image'] = _findImage($result['ID']);
        $result['rating'] = _getRating($result['ID']);
    }
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
        $searchConstraints .= " airport = :airport";
    }

    $query = "SELECT * FROM accommodations";

    if (!empty($searchConstraints)) {
        $query .= " WHERE" . $searchConstraints;
    } else {
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
    if (!empty($parameters['date'])) {
        $queryExec->bindParam(":date", $parameters['date']);
    }
    if (!empty($parameters['airport'])) {
        $queryExec->bindParam(":airport", $parameters['airport']);
    }

    $queryExec->execute();
    $results = $queryExec->fetchAll();
    return $results;
}

function _findImage($id)
{
    global $conn;
    $query = "SELECT url FROM IMAGES WHERE accommodationID = :id AND isThumbnail = true";
    $queryExec = $conn->prepare($query);
    $queryExec->bindParam(":id", $id, PDO::PARAM_INT);
    $queryExec->execute();

    $result = $queryExec->fetch(PDO::FETCH_ASSOC);
    return $result['url'];
}

function _getRating($id)
{
    global $conn;
    $query = "SELECT AVG(rating) AS rating FROM reviews WHERE accommodationID = :id";
    $queryExec = $conn->prepare($query);
    $queryExec->bindParam(":id", $id, PDO::PARAM_INT);
    $queryExec->execute();

    $result = $queryExec->fetch(PDO::FETCH_ASSOC);
    return round($result['rating']);
}
