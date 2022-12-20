<?php

// Connection details
$servername = "localhost";
$username = "admin";
$password = "YkoUWPst70BjnmU7";
$database = "high_street_gym";

// Connect to database
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>