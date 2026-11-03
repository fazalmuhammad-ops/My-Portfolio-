<?php
/**
 * Email Notification Configuration File
 * Project: A.A. Fazal Muhammad - University Portfolio
 * 
 * Target Email: fazalaamuhammad@gmail.com
 * 
 * Supports:
 * 1. 'auto' / 'mail': Uses PHP's built-in mail() function (works out of the box on live web servers like cPanel, VPS, Apache).
 * 2. 'smtp': Connects directly to Gmail SMTP (smtp.gmail.com:587) using a 16-character Gmail App Password.
 */

return [
    // Recipient email where all contact form submissions will be delivered
    'recipient_email' => 'fazalaamuhammad@gmail.com',
    'recipient_name'  => 'A.A. Fazal Muhammad',

    // Sender details shown in the incoming email header
    'sender_email'    => 'fazalaamuhammad@gmail.com',
    'sender_name'     => 'Fazal Portfolio Contact Form',

    // Delivery Driver: 'auto' (tries SMTP if password provided, otherwise PHP mail)
    'driver'          => 'auto',

    // SMTP Configuration for Gmail (Optional - useful for Localhost XAMPP)
    // To generate a Gmail App Password:
    // Go to Google Account -> Security -> 2-Step Verification -> App Passwords
    'smtp' => [
        'enabled'    => false, // Set to true once you paste your 16-character App Password below
        'host'       => 'smtp.gmail.com',
        'port'       => 587,
        'encryption' => 'tls', // 'tls' or 'ssl'
        'username'   => 'fazalaamuhammad@gmail.com',
        'password'   => '', // Paste 16-character App Password here e.g. 'abcd efgh ijkl mnop'
        'timeout'    => 5
    ]
];
