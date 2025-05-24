<?php
$host = 'localhost';
$dbname = 'swiftdine'; 
$username = 'root'; 
$password = ''; 
$port = 3307; 

$conn = new mysqli("localhost", "root", "", "swiftdine", port: 3307);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

  // Get all restaurants
function getRestaurants($conn) {
    $sql = "SELECT id, name, location, cuisine, rating FROM restaurants ORDER BY rating DESC";
    $result = $conn->query($sql);
    $restaurants = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $restaurants[] = $row;
        }
    }
    return $restaurants;
}














?>