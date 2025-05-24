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
    $sql = "SELECT id, name, location, cuisine, rating, image FROM restaurants";
    $result = $conn->query($sql);
    $restaurants = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $restaurants[] = $row;
        }
    }
    return $restaurants;
}

function getMenuHighlights($conn) {
    $sql = "SELECT * FROM menus LIMIT 6"; // Adjust table name and logic as needed
    $result = mysqli_query($conn, $sql);

    $menus = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $menus[] = $row;
    }

    return $menus;
}















?>