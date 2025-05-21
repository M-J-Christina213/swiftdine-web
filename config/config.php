<?php
// config/config.php

$host = 'localhost';        // Usually localhost if running locally
$dbname = 'swift_dine';     // Your database name
$user = 'root';             // Your MySQL username
$pass = '';                 // Your MySQL password (empty if none)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    // Set error mode to exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
