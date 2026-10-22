<?php
/**
 * Database Connection File
 * Project: A.A. Fazal Muhammad - University Portfolio
 * 
 * Resilient database connector:
 * - Prevents unhandled mysqli_sql_exception crashes in PHP 8.1+
 * - Automatically provisions database & messages table if MySQL is online
 * - Gracefully falls back if MySQL service is stopped in XAMPP
 */

// Turn off default exception throwing to handle connection failures gracefully
mysqli_report(MYSQLI_REPORT_OFF);

$host     = 'localhost';
$username = 'root';
$password = '';
$database = 'portfolio_db';

$conn = null;
$dbConnected = false;
$dbConnectionError = '';

try {
    // Attempt connecting to MySQL server
    $tempConn = @new mysqli($host, $username, $password);

    if ($tempConn && !$tempConn->connect_error) {
        // Ensure portfolio_db exists
        $tempConn->query("CREATE DATABASE IF NOT EXISTS `{$database}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        
        // Select the database
        if ($tempConn->select_db($database)) {
            $conn = $tempConn;
            $conn->set_charset("utf8mb4");
            $dbConnected = true;

            // Ensure messages table exists
            $createTableQuery = "CREATE TABLE IF NOT EXISTS `messages` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `fullname` VARCHAR(100) NOT NULL,
                `email` VARCHAR(150) NOT NULL,
                `subject` VARCHAR(200) DEFAULT 'General Inquiry',
                `message` TEXT NOT NULL,
                `ip_address` VARCHAR(45) DEFAULT '127.0.0.1',
                `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
            
            $conn->query($createTableQuery);
        } else {
            $dbConnectionError = "Could not select database '{$database}': " . $tempConn->error;
            $conn = null;
        }
    } else {
        $dbConnectionError = $tempConn ? $tempConn->connect_error : "MySQL connection refused.";
        $conn = null;
    }
} catch (Throwable $e) {
    $dbConnected = false;
    $dbConnectionError = $e->getMessage();
    $conn = null;
}
?>
