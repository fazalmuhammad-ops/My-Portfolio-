<?php
// Set page title
$pageTitle = "Messages Inbox | A.A. Fazal Muhammad";
require_once __DIR__ . '/includes/db.php';
include 'includes/header.php';

// Helper function to parse backup messages from messages.txt
function parseBackupMessages($filePath) {
    if (!file_exists($filePath)) {
        return [];
    }
    $content = @file_get_contents($filePath);
    if (empty($content)) {
        return [];
    }

    $pattern = '/\[(\d{4}-\d{2}-\d{2}\s+\d{2}:\d{2}:\d{2})\]\s*IP:\s*([^|\r\n]*)\|\s*Name:\s*([^|\r\n]*)\|\s*Email:\s*([^|\r\n]*)\|\s*Subject:\s*([^\r\n]*)\r?\nMessage:\s*(.*?)(?=\r?\n-{20,}|\z)/s';

    $items = [];
    if (preg_match_all($pattern, $content, $matches, PREG_SET_ORDER)) {
        $id = 1;
        foreach ($matches as $m) {
            $items[] = [
                'id'         => $id++,
                'created_at' => trim($m[1]),
                'ip_address' => trim($m[2]),
                'fullname'   => trim($m[3]),
                'email'      => trim($m[4]),
                'subject'    => trim($m[5]),
                'message'    => trim($m[6]),
                'source'     => 'Local Backup File'
            ];
        }
    }
    return array_reverse($items);
}

$messages = [];
$dataSource = 'none';
$dbRecordsCount = 0;
$backupMessages = parseBackupMessages(__DIR__ . '/messages.txt');
$backupRecordsCount = count($backupMessages);

// 1. If MySQL is connected, auto-sync any offline entries from messages.txt and fetch live records
if (!empty($dbConnected) && isset($conn) && ($conn instanceof mysqli)) {
    if ($backupRecordsCount > 0) {
        $checkStmt = @$conn->prepare("SELECT id FROM messages WHERE fullname = ? AND email = ? AND message = ? LIMIT 1");
        $insertStmt = @$conn->prepare("INSERT INTO messages (fullname, email, subject, message, ip_address, created_at) VALUES (?, ?, ?, ?, ?, ?)");
        
        if ($checkStmt && $insertStmt) {
            foreach ($backupMessages as $bm) {
                $checkStmt->bind_param("sss", $bm['fullname'], $bm['email'], $bm['message']);
                $checkStmt->execute();
                $checkRes = $checkStmt->get_result();
                if ($checkRes && $checkRes->num_rows === 0) {
                    $insertStmt->bind_param("ssssss", 
                        $bm['fullname'], 
                        $bm['email'], 
                        $bm['subject'], 
                        $bm['message'], 
                        $bm['ip_address'], 
                        $bm['created_at']
                    );
                    $insertStmt->execute();
                }
            }
            $checkStmt->close();
            $insertStmt->close();
        }
    }

    $result = $conn->query("SELECT * FROM messages ORDER BY id DESC");
    if ($result) {
        $dbRows = $result->fetch_all(MYSQLI_ASSOC);
        $dbRecordsCount = count($dbRows);
        foreach ($dbRows as $row) {
            $row['source'] = 'MySQL Database';
            $messages[] = $row;
        }
        if ($dbRecordsCount > 0) {
            $dataSource = 'database';
        }
    }
}

// 2. If MySQL is offline or returned no records, load from backup
if ($dataSource === 'none' && $backupRecordsCount > 0) {
    $messages = $backupMessages;
    $dataSource = 'backup';
}
?>

<!-- Banner Section -->
<section class="bg-dark text-white py-5 border-bottom border-secondary border-opacity-25">
    <div class="container py-2 text-center">
        <span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25 rounded-pill px-3 py-1 mb-2 fw-semibold">
            Admin Inbox
        </span>
        <h1 class="fw-bold display-6 mb-2">Received Messages</h1>
        <p class="text-secondary fs-6 mx-auto col-md-8 mb-3">
            Inquiries and contact submissions sent via your portfolio contact form.
        </p>

        <!-- Status Badges -->
        <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
            <?php if (!empty($dbConnected)): ?>
                <span class="badge bg-success-subtle text-success border border-success border-opacity-25 px-3 py-2 rounded-pill">
                    <i class="fa-solid fa-circle-check me-1"></i> MySQL Connected (portfolio_db)
                </span>
            <?php else: ?>
                <span class="badge bg-warning-subtle text-warning border border-warning border-opacity-25 px-3 py-2 rounded-pill">
                    <i class="fa-solid fa-triangle-exclamation me-1"></i> MySQL Offline &bull; Local Mode Active
                </span>
            <?php endif; ?>

            <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-25 px-3 py-2 rounded-pill">
                <i class="fa-solid fa-inbox me-1"></i> Total: <?php echo count($messages); ?> message(s)
            </span>
        </div>
    </div>
</section>

<!-- Messages Content Section -->
<section class="py-5 flex-grow-1">
    <div class="container">

        <!-- Informational Banner when running on Backup Mode -->
        <?php if (empty($dbConnected)): ?>
            <div class="alert alert-warning border-warning border-opacity-50 d-flex align-items-start gap-3 mb-4 rounded-3 shadow-sm" role="alert">
                <i class="fa-solid fa-circle-info fs-4 text-warning mt-1"></i>
                <div class="flex-grow-1">
                    <strong class="d-block text-warning fw-bold">Local Backup Storage Active</strong>
                    <div class="small text-secondary mt-1">
                        MySQL service is currently not connected (<code><?php echo htmlspecialchars($dbConnectionError ?: 'Connection refused'); ?></code>).
                        Messages are currently loaded from your backup log file (<code>messages.txt</code>).
                        <span class="d-block mt-1 text-light">To enable live MySQL database storage, start <strong>MySQL</strong> in your <strong>XAMPP Control Panel</strong>.</span>
                    </div>
                </div>
            </div>
        <?php elseif ($dataSource === 'database' && $backupRecordsCount > 0): ?>
            <div class="alert alert-dark border-secondary border-opacity-25 d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4 rounded-3 py-2 px-3">
                <small class="text-secondary">
                    <i class="fa-solid fa-database text-primary me-1"></i>
                    Displaying <strong><?php echo $dbRecordsCount; ?></strong> live record(s) from MySQL. You also have <strong><?php echo $backupRecordsCount; ?></strong> record(s) logged in <code>messages.txt</code>.
                </small>
                <a href="messages.txt" target="_blank" class="btn btn-outline-secondary btn-sm py-0 px-2 font-monospace" style="font-size: 0.75rem;">
                    View Raw Log
                </a>
            </div>
        <?php endif; ?>

        <!-- Controls Toolbar -->
        <div class="card bg-dark border-secondary border-opacity-25 p-3 rounded-3 mb-4">
            <div class="row g-3 align-items-center justify-content-between">
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-text bg-black bg-opacity-25 border-secondary border-opacity-25 text-secondary">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="text" id="messageSearchInput" class="form-control bg-dark text-white border-secondary border-opacity-25" placeholder="Search by sender, email, subject, or message...">
                    </div>
                </div>
                <div class="col-md-7 d-flex justify-content-md-end gap-2 flex-wrap">
                    <a href="contact.php" class="btn btn-outline-light btn-sm rounded-pill px-3">
                        <i class="fa-solid fa-paper-plane me-1"></i> New Contact Form Test
                    </a>
                    <a href="view-messages.php" class="btn btn-primary btn-sm rounded-pill px-3">
                        <i class="fa-solid fa-rotate-right me-1"></i> Refresh Inbox
                    </a>
                </div>
            </div>
        </div>

        <?php if (empty($messages)): ?>
            <!-- Empty State -->
            <div class="card bg-dark text-white border-secondary border-opacity-25 p-5 text-center rounded-3 shadow-sm my-4">
                <div class="mb-3">
                    <i class="fa-regular fa-envelope-open display-3 text-secondary opacity-50"></i>
                </div>
                <h4 class="fw-bold mb-2">No Messages Received Yet</h4>
                <p class="text-secondary small mx-auto col-md-6 mb-4">
                    When someone submits your contact form on <code>contact.php</code>, their inquiry will be automatically displayed here.
                </p>
                <div>
                    <a href="contact.php" class="btn btn-primary btn-sm rounded-pill px-4 py-2">
                        <i class="fa-solid fa-paper-plane me-1"></i> Send a Test Message
                    </a>
                </div>
            </div>
        <?php else: ?>
            <!-- Messages Table -->
            <div class="table-responsive shadow-sm rounded-3 border border-secondary border-opacity-25">
                <table class="table table-dark table-hover align-middle mb-0" id="messagesTable">
                    <thead class="table-secondary text-dark text-uppercase small">
                        <tr>
                            <th scope="col" style="width: 50px;">#</th>
                            <th scope="col" style="width: 200px;">Sender</th>
                            <th scope="col" style="width: 170px;">Subject</th>
                            <th scope="col">Message Content</th>
                            <th scope="col" style="width: 160px;">Received At</th>
                            <th scope="col" style="width: 120px;">Source</th>
                            <th scope="col" style="width: 90px;" class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($messages as $msg): ?>
                            <tr class="message-row">
                                <td class="fw-bold text-secondary font-monospace">
                                    #<?php echo htmlspecialchars($msg['id']); ?>
                                </td>
                                <td>
                                    <div class="fw-bold text-white sender-name">
                                        <?php echo htmlspecialchars($msg['fullname']); ?>
                                    </div>
                                    <small class="text-primary d-block sender-email">
                                        <a href="mailto:<?php echo htmlspecialchars($msg['email']); ?>" class="text-decoration-none text-primary">
                                            <?php echo htmlspecialchars($msg['email']); ?>
                                        </a>
                                    </small>
                                </td>
                                <td>
                                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50 message-subject text-wrap text-start">
                                        <?php echo htmlspecialchars($msg['subject'] ?? 'General Inquiry'); ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="text-light message-body" style="white-space: pre-wrap; font-size: 0.92rem; max-width: 460px;">
                                        <?php echo nl2br(htmlspecialchars($msg['message'])); ?>
                                    </div>
                                    <div class="mt-1">
                                        <small class="text-secondary font-monospace" style="font-size: 0.75rem;">
                                            <i class="fa-solid fa-network-wired me-1"></i>IP: <?php echo htmlspecialchars($msg['ip_address'] ?? '127.0.0.1'); ?>
                                        </small>
                                    </div>
                                </td>
                                <td class="small text-secondary">
                                    <i class="fa-regular fa-clock me-1 text-primary"></i>
                                    <?php 
                                        $timestamp = !empty($msg['created_at']) ? strtotime($msg['created_at']) : null;
                                        echo $timestamp ? date('M d, Y', $timestamp) . '<br><span class="text-secondary opacity-75">' . date('h:i A', $timestamp) . '</span>' : 'N/A';
                                    ?>
                                </td>
                                <td>
                                    <?php if (($msg['source'] ?? '') === 'MySQL Database'): ?>
                                        <span class="badge bg-success-subtle text-success border border-success border-opacity-25 rounded-pill">
                                            <i class="fa-solid fa-database me-1"></i> MySQL
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-info-subtle text-info border border-info border-opacity-25 rounded-pill">
                                            <i class="fa-solid fa-file-lines me-1"></i> Backup
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <a href="mailto:<?php echo htmlspecialchars($msg['email']); ?>?subject=Re:%20<?php echo urlencode($msg['subject'] ?? 'Inquiry'); ?>" 
                                       class="btn btn-outline-primary btn-sm rounded-pill" 
                                       title="Reply via Email">
                                        <i class="fa-solid fa-reply"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Client-side Quick Search Filter Script -->
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const searchInput = document.getElementById('messageSearchInput');
                    const rows = document.querySelectorAll('.message-row');

                    if (searchInput) {
                        searchInput.addEventListener('input', function () {
                            const query = this.value.toLowerCase().trim();

                            rows.forEach(function (row) {
                                const text = row.innerText.toLowerCase();
                                if (text.includes(query)) {
                                    row.style.display = '';
                                } else {
                                    row.style.display = 'none';
                                }
                            });
                        });
                    }
                });
            </script>
        <?php endif; ?>

    </div>
</section>

<?php include 'includes/footer.php'; ?>
