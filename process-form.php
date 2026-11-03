<?php
/**
 * Backend Form Processing Script
 * Project: A.A. Fazal Muhammad - University Portfolio
 * Purpose: Handles POST submission from contact.php, sanitizes input, validates required fields,
 *          logs to messages.txt, inserts into MySQL database (if online),
 *          and dispatches an instant email notification to fazalaamuhammad@gmail.com.
 */

// Include DB connection
require_once __DIR__ . '/includes/db.php';
// Include Mailer Service
require_once __DIR__ . '/includes/mailer.php';

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: contact.php");
    exit();
}

// 1. Retrieve and Sanitize Form Inputs
$fullname = isset($_POST['fullname']) ? trim($_POST['fullname']) : '';
$email    = isset($_POST['email'])    ? trim($_POST['email'])    : '';
$subject  = isset($_POST['subject'])  ? trim($_POST['subject'])  : '';
$message  = isset($_POST['message'])  ? trim($_POST['message'])  : '';

// Sanitize string data using htmlspecialchars to prevent XSS
$cleanFullname = htmlspecialchars($fullname, ENT_QUOTES, 'UTF-8');
$cleanSubject  = !empty($subject) ? htmlspecialchars($subject, ENT_QUOTES, 'UTF-8') : 'General Inquiry';
$cleanMessage  = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

// Sanitize email address using PHP filter_var
$cleanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

// 2. Validate Required Fields & Email Format
if (empty($cleanFullname) || empty($cleanEmail) || empty($cleanMessage)) {
    $errorMessage = urlencode("Please fill in all required fields (Name, Email, and Message).");
    header("Location: contact.php?status=error&msg={$errorMessage}");
    exit();
}

if (!filter_var($cleanEmail, FILTER_VALIDATE_EMAIL)) {
    $errorMessage = urlencode("Please provide a valid email address.");
    header("Location: contact.php?status=error&msg={$errorMessage}");
    exit();
}

// 3. Log to Local Backup File (messages.txt)
$clientIp = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';

$logEntry = sprintf(
    "[%s] IP: %s | Name: %s | Email: %s | Subject: %s\nMessage: %s\n--------------------------------------------------------\n",
    date('Y-m-d H:i:s'),
    $clientIp,
    $cleanFullname,
    $cleanEmail,
    $cleanSubject,
    $cleanMessage
);
@file_put_contents(__DIR__ . '/messages.txt', $logEntry, FILE_APPEND | LOCK_EX);

// 4. Insert into MySQL Database if connection is available
try {
    if (!empty($dbConnected) && isset($conn) && ($conn instanceof mysqli) && !$conn->connect_error) {
        $stmt = $conn->prepare(
            "INSERT INTO messages (fullname, email, subject, message, ip_address)
             VALUES (?, ?, ?, ?, ?)"
        );

        if ($stmt) {
            $stmt->bind_param("sssss",
                $cleanFullname,
                $cleanEmail,
                $cleanSubject,
                $cleanMessage,
                $clientIp
            );
            $stmt->execute();
            $stmt->close();
            $conn->close();
        }
    }
} catch (Throwable $e) {
    // If MySQL insert encounters an issue, safely ignore as backup log succeeded
}

// 5. Dispatch Direct Email Notification to fazalaamuhammad@gmail.com
try {
    $mailResult = PortfolioMailer::sendNotification(
        $cleanFullname,
        $cleanEmail,
        $cleanSubject,
        $cleanMessage,
        $clientIp
    );

    // Record email dispatch outcome into log file
    $mailLog = sprintf(
        "[%s] EMAIL NOTIFICATION -> Recipient: fazalaamuhammad@gmail.com | Method: %s | Result: %s\n--------------------------------------------------------\n\n",
        date('Y-m-d H:i:s'),
        $mailResult['method'] ?? 'unknown',
        (!empty($mailResult['success'])) ? 'DISPATCHED' : 'LOGGED / QUEUED'
    );
    @file_put_contents(__DIR__ . '/messages.txt', $mailLog, FILE_APPEND | LOCK_EX);
} catch (Throwable $e) {
    // Prevent email failures from ever breaking the user experience
}

// Redirect back with success status and sender name for personalized confirmation
$nameParam = urlencode($cleanFullname);
header("Location: contact.php?status=success&name={$nameParam}");
exit();
?>
