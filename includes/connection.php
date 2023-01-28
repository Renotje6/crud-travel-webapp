<?php
$servername = "localhost";
$username = "crud_app";
$password = "crud_application";

try {
    $conn = new PDO("mysql:host=$servername;dbname=crud_travel_webapp", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
