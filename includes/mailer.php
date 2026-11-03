<?php
/**
 * Portfolio Mailer Service
 * Project: A.A. Fazal Muhammad - University Portfolio
 * Purpose: Formats and dispatches contact notifications directly to fazalaamuhammad@gmail.com
 *          via PHP mail() or direct SMTP (Gmail TLS).
 */

class PortfolioMailer {

    /**
     * Send email notification to portfolio owner
     *
     * @param string $fullname Sender's full name
     * @param string $email Sender's email
     * @param string $subject Subject of inquiry
     * @param string $message Inbound message
     * @param string $clientIp Client IP address
     * @return array Status report
     */
    public static function sendNotification($fullname, $email, $subject, $message, $clientIp = '127.0.0.1') {
        $configPath = __DIR__ . '/mail-config.php';
        $config = file_exists($configPath) ? require $configPath : [
            'recipient_email' => 'fazalaamuhammad@gmail.com',
            'recipient_name'  => 'A.A. Fazal Muhammad',
            'sender_email'    => 'fazalaamuhammad@gmail.com',
            'sender_name'     => 'Fazal Portfolio Contact Form',
            'driver'          => 'auto',
            'smtp'            => ['enabled' => false]
        ];

        $toEmail   = $config['recipient_email'] ?? 'fazalaamuhammad@gmail.com';
        $toName    = $config['recipient_name']  ?? 'A.A. Fazal Muhammad';
        $fromEmail = $config['sender_email']    ?? 'fazalaamuhammad@gmail.com';
        $fromName  = $config['sender_name']     ?? 'Fazal Portfolio Contact Form';

        $emailSubject = "Portfolio Contact: " . (!empty($subject) ? $subject : 'New Inquiry') . " from " . $fullname;
        $htmlBody = self::buildHtmlTemplate($fullname, $email, $subject, $message, $clientIp);
        $plainBody = self::buildPlainTemplate($fullname, $email, $subject, $message, $clientIp);

        // Attempt 1: SMTP if enabled and password configured
        if (!empty($config['smtp']['enabled']) && !empty($config['smtp']['password'])) {
            try {
                $smtpSuccess = self::sendViaSmtp($config['smtp'], $toEmail, $toName, $fromEmail, $fromName, $email, $fullname, $emailSubject, $htmlBody, $plainBody);
                if ($smtpSuccess) {
                    return [
                        'success' => true,
                        'method'  => 'smtp',
                        'message' => 'Dispatched via Gmail SMTP'
                    ];
                }
            } catch (Throwable $e) {
                // If SMTP fails, fallback gracefully to PHP mail()
            }
        }

        // Attempt 2: PHP built-in mail() function
        try {
            $headers = [
                'MIME-Version: 1.0',
                'Content-Type: text/html; charset=UTF-8',
                'From: ' . self::encodeHeader($fromName) . ' <' . $fromEmail . '>',
                'Reply-To: ' . self::encodeHeader($fullname) . ' <' . $email . '>',
                'X-Mailer: PHP/' . phpversion(),
                'X-Portfolio-Sender-IP: ' . $clientIp
            ];

            set_error_handler(function() { return true; });
            $mailSent = @mail($toEmail, $emailSubject, $htmlBody, implode("\r\n", $headers));
            restore_error_handler();

            return [
                'success' => $mailSent,
                'method'  => 'php_mail',
                'message' => $mailSent ? 'Dispatched via server mail()' : 'Queued in local mail spool'
            ];
        } catch (Throwable $e) {
            return [
                'success' => false,
                'method'  => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Builds responsive HTML email template
     */
    private static function buildHtmlTemplate($fullname, $email, $subject, $message, $clientIp) {
        $timestamp = date('M d, Y &bull; h:i A');
        $safeName    = htmlspecialchars($fullname, ENT_QUOTES, 'UTF-8');
        $safeEmail   = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $safeSubject = htmlspecialchars($subject ?: 'General Inquiry', ENT_QUOTES, 'UTF-8');
        $safeMessage = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));
        $replyMailto = "mailto:{$safeEmail}?subject=" . rawurlencode("Re: " . $safeSubject);

        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Portfolio Message</title>
</head>
<body style="margin: 0; padding: 0; background-color: #0b1120; font-family: 'Segoe UI', Arial, sans-serif; color: #e2e8f0; line-height: 1.6;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #0b1120; padding: 30px 15px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" style="max-width: 620px; background: #0f172a; border: 1px solid rgba(250, 204, 21, 0.35); border-radius: 16px; overflow: hidden; box-shadow: 0 20px 45px rgba(0,0,0,0.5);">
                    <!-- Header -->
                    <tr>
                        <td style="padding: 28px 32px; background: linear-gradient(135deg, #022c22 0%, #064e3b 100%); border-bottom: 2px solid #facc15;">
                            <table role="presentation" width="100%">
                                <tr>
                                    <td>
                                        <span style="background: rgba(250, 204, 21, 0.2); color: #facc15; font-size: 11px; font-weight: bold; padding: 4px 10px; border-radius: 20px; text-transform: uppercase; letter-spacing: 0.08em; border: 1px solid rgba(250, 204, 21, 0.4);">
                                            Portfolio Inbound Message
                                        </span>
                                        <h1 style="margin: 8px 0 0 0; font-size: 22px; font-weight: 800; color: #ffffff;">
                                            New Contact Inquiry Received
                                        </h1>
                                        <p style="margin: 4px 0 0 0; font-size: 13px; color: #cbd5e1;">
                                            Sent via <a href="http://localhost/j%20pura%20project/contact.php" style="color: #facc15; text-decoration: none;">A.A. Fazal Muhammad Portfolio</a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Details Table -->
                    <tr>
                        <td style="padding: 28px 32px;">
                            <table role="presentation" width="100%" style="background: #1e293b; border-radius: 10px; padding: 18px; margin-bottom: 24px;">
                                <tr>
                                    <td width="30%" style="padding: 8px; font-size: 13px; color: #94a3b8; font-weight: 600;">Sender:</td>
                                    <td style="padding: 8px; font-size: 14px; color: #ffffff; font-weight: bold;">{$safeName}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px; font-size: 13px; color: #94a3b8; font-weight: 600;">Email:</td>
                                    <td style="padding: 8px; font-size: 14px; color: #38bdf8;">
                                        <a href="mailto:{$safeEmail}" style="color: #38bdf8; text-decoration: none;">{$safeEmail}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px; font-size: 13px; color: #94a3b8; font-weight: 600;">Subject:</td>
                                    <td style="padding: 8px; font-size: 14px; color: #facc15; font-weight: 600;">{$safeSubject}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px; font-size: 13px; color: #94a3b8; font-weight: 600;">Received At:</td>
                                    <td style="padding: 8px; font-size: 13px; color: #cbd5e1;">{$timestamp}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px; font-size: 13px; color: #94a3b8; font-weight: 600;">Sender IP:</td>
                                    <td style="padding: 8px; font-size: 12px; color: #64748b; font-family: monospace;">{$clientIp}</td>
                                </tr>
                            </table>

                            <!-- Message Content -->
                            <h3 style="font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em; color: #facc15; margin: 0 0 10px 0;">
                                Message Content
                            </h3>
                            <div style="background: #021a14; border-left: 4px solid #10b981; border-radius: 6px; padding: 20px; font-size: 14.5px; color: #f1f5f9; line-height: 1.7; margin-bottom: 28px;">
                                {$safeMessage}
                            </div>

                            <!-- Quick Reply Button -->
                            <table role="presentation" width="100%">
                                <tr>
                                    <td align="center">
                                        <a href="{$replyMailto}" style="background: linear-gradient(135deg, #facc15 0%, #eab308 100%); color: #022c22; font-weight: bold; font-size: 14px; padding: 12px 28px; border-radius: 30px; text-decoration: none; display: inline-block; box-shadow: 0 4px 15px rgba(250, 204, 21, 0.4);">
                                            &rarr; Click Here to Reply to {$safeName}
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding: 20px 32px; background: #090e17; border-top: 1px solid rgba(255,255,255,0.08); text-align: center; font-size: 12px; color: #64748b;">
                            A.A. Fazal Muhammad &bull; Diploma in Information Technology &bull; University of Sri Jayewardenepura<br>
                            This email was automatically generated by your portfolio website contact system.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
HTML;
    }

    /**
     * Builds plain text email fallback
     */
    private static function buildPlainTemplate($fullname, $email, $subject, $message, $clientIp) {
        $timestamp = date('Y-m-d H:i:s');
        return "NEW PORTFOLIO MESSAGE RECEIVED\n"
             . "==============================\n\n"
             . "Sender:      {$fullname}\n"
             . "Email:       {$email}\n"
             . "Subject:     {$subject}\n"
             . "Date:        {$timestamp}\n"
             . "IP Address:  {$clientIp}\n\n"
             . "MESSAGE:\n"
             . "------------------------------\n"
             . "{$message}\n"
             . "------------------------------\n\n"
             . "To reply directly, email {$email}";
    }

    /**
     * Native Pure PHP SMTP Client (Supports Gmail TLS on port 587)
     */
    private static function sendViaSmtp($smtp, $to, $toName, $from, $fromName, $replyTo, $replyName, $subject, $htmlBody, $plainBody) {
        $host       = $smtp['host'] ?? 'smtp.gmail.com';
        $port       = $smtp['port'] ?? 587;
        $timeout    = $smtp['timeout'] ?? 5;
        $username   = $smtp['username'] ?? '';
        $password   = str_replace(' ', '', $smtp['password'] ?? '');

        $socket = @stream_socket_client("tcp://{$host}:{$port}", $errno, $errstr, $timeout);
        if (!$socket) {
            return false;
        }

        stream_set_timeout($socket, $timeout);

        $read = function() use ($socket) {
            $data = '';
            while ($str = fgets($socket, 515)) {
                $data .= $str;
                if (substr($str, 3, 1) === ' ') break;
            }
            return $data;
        };

        $write = function($cmd) use ($socket) {
            fputs($socket, $cmd . "\r\n");
        };

        $res = $read();
        if (!str_starts_with($res, '220')) { fclose($socket); return false; }

        $write("EHLO " . ($_SERVER['SERVER_NAME'] ?? 'localhost'));
        $read();

        // Upgrade to STARTTLS
        $write("STARTTLS");
        $res = $read();
        if (!str_starts_with($res, '220')) { fclose($socket); return false; }

        if (!stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
            fclose($socket);
            return false;
        }

        $write("EHLO " . ($_SERVER['SERVER_NAME'] ?? 'localhost'));
        $read();

        // Authenticate
        $write("AUTH LOGIN");
        $read();

        $write(base64_encode($username));
        $read();

        $write(base64_encode($password));
        $res = $read();
        if (!str_starts_with($res, '235')) { fclose($socket); return false; }

        // Mail transaction
        $write("MAIL FROM:<{$username}>");
        $res = $read();
        if (!str_starts_with($res, '250')) { fclose($socket); return false; }

        $write("RCPT TO:<{$to}>");
        $res = $read();
        if (!str_starts_with($res, '250')) { fclose($socket); return false; }

        $write("DATA");
        $res = $read();
        if (!str_starts_with($res, '354')) { fclose($socket); return false; }

        $boundary = "----=_Part_" . md5(uniqid(time(), true));

        $emailHeaders = [
            "MIME-Version: 1.0",
            "Content-Type: multipart/alternative; boundary=\"{$boundary}\"",
            "From: " . self::encodeHeader($fromName) . " <{$username}>",
            "To: " . self::encodeHeader($toName) . " <{$to}>",
            "Reply-To: " . self::encodeHeader($replyName) . " <{$replyTo}>",
            "Subject: " . self::encodeHeader($subject),
            "Date: " . date('r'),
            "X-Mailer: FazalPortfolioMailer/2.0"
        ];

        $payload  = implode("\r\n", $emailHeaders) . "\r\n\r\n";
        $payload .= "--{$boundary}\r\n";
        $payload .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $payload .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
        $payload .= $plainBody . "\r\n\r\n";
        $payload .= "--{$boundary}\r\n";
        $payload .= "Content-Type: text/html; charset=UTF-8\r\n";
        $payload .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
        $payload .= $htmlBody . "\r\n\r\n";
        $payload .= "--{$boundary}--\r\n.";

        $write($payload);
        $res = $read();

        $write("QUIT");
        fclose($socket);

        return str_starts_with($res, '250');
    }

    /**
     * RFC 2047 encode for non-ASCII headers
     */
    private static function encodeHeader($str) {
        return '=?UTF-8?B?' . base64_encode($str) . '?=';
    }
}
?>
