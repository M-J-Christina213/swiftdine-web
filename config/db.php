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
?>