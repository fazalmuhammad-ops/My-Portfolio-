<?php
/**
 * Database Connection File
 * Project: A.A. Fazal Muhammad - University Portfolio
 */

$host     = 'localhost';
$username = 'root';
$password = '';
$database = 'portfolio_db';

// Create MySQLi connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Set charset to UTF-8
$conn->set_charset("utf8mb4");
?>

