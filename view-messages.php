<?php
// Set page title
$pageTitle = "Admin Messages Inbox | A.A. Fazal Muhammad";
require_once __DIR__ . '/includes/db.php';
include 'includes/header.php';

// Helper function to calculate relative human-readable time
function timeAgo($datetime) {
    if (empty($datetime)) return 'N/A';
    $timestamp = strtotime($datetime);
    if (!$timestamp) return htmlspecialchars($datetime);
    
    $diff = time() - $timestamp;
    if ($diff < 60) {
        return 'Just now';
    } elseif ($diff < 3600) {
        $mins = floor($diff / 60);
        return $mins . ' min' . ($mins > 1 ? 's' : '') . ' ago';
    } elseif ($diff < 86400) {
        $hours = floor($diff / 3600);
        return $hours . ' hr' . ($hours > 1 ? 's' : '') . ' ago';
    } elseif ($diff < 172800) {
        return 'Yesterday at ' . date('h:i A', $timestamp);
    } elseif ($diff < 604800) {
        $days = floor($diff / 86400);
        return $days . ' days ago';
    } else {
        return date('M d, Y', $timestamp);
    }
}

// Helper to extract initials for avatar
function getInitials($name) {
    $words = preg_split('/\s+/', trim($name));
    if (empty($words) || empty($words[0])) return '?';
    if (count($words) === 1) {
        return strtoupper(substr($words[0], 0, 2));
    }
    return strtoupper(substr($words[0], 0, 1) . substr($words[count($words) - 1], 0, 1));
}

// Helper to assign a deterministic pleasant avatar gradient
function getAvatarGradient($name) {
    $gradients = [
        'linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%)', // Blue
        'linear-gradient(135deg, #10b981 0%, #047857 100%)', // Emerald
        'linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%)', // Purple
        'linear-gradient(135deg, #f59e0b 0%, #d97706 100%)', // Amber
        'linear-gradient(135deg, #ec4899 0%, #be185d 100%)', // Pink
        'linear-gradient(135deg, #06b6d4 0%, #0e7490 100%)', // Cyan
        'linear-gradient(135deg, #6366f1 0%, #4338ca 100%)'  // Indigo
    ];
    $hash = abs(crc32($name));
    return $gradients[$hash % count($gradients)];
}

// Helper to parse backup messages from messages.txt
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

// 1. If MySQL is connected, auto-sync offline entries and fetch live records
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

// 2. Fallback to backup messages if database is offline or empty
if ($dataSource === 'none' && $backupRecordsCount > 0) {
    $messages = $backupMessages;
    $dataSource = 'backup';
}

// Calculate metrics
$totalCount = count($messages);
$todayDate = date('Y-m-d');
$todayCount = 0;
$mysqlCount = 0;
$backupCount = 0;

foreach ($messages as $msg) {
    if (!empty($msg['created_at']) && strpos($msg['created_at'], $todayDate) === 0) {
        $todayCount++;
    }
    if (($msg['source'] ?? '') === 'MySQL Database') {
        $mysqlCount++;
    } else {
        $backupCount++;
    }
}
?>

<!-- Scoped Inbox Stylesheet -->
<style>
    .inbox-page-wrapper {
        background: radial-gradient(circle at 10% 20%, rgba(37, 99, 235, 0.08) 0%, transparent 40%),
                    radial-gradient(circle at 90% 80%, rgba(99, 102, 241, 0.06) 0%, transparent 40%),
                    #0b1120;
        color: #e2e8f0;
        min-height: calc(100vh - 160px);
    }
    .inbox-glass-card {
        background: rgba(15, 23, 42, 0.75);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 1rem;
        transition: all 0.25s ease;
    }
    .inbox-glass-card:hover {
        border-color: rgba(37, 99, 235, 0.35);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3), 0 8px 10px -6px rgba(0, 0, 0, 0.2);
    }
    .inbox-stat-tile {
        background: rgba(30, 41, 59, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: 0.85rem;
        padding: 1.1rem 1.25rem;
        transition: transform 0.2s ease, border-color 0.2s ease;
    }
    .inbox-stat-tile:hover {
        transform: translateY(-2px);
        border-color: rgba(37, 99, 235, 0.4);
    }
    .avatar-circle {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.95rem;
        color: #ffffff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
        flex-shrink: 0;
    }
    .btn-pill-filter {
        border-radius: 50rem;
        padding: 0.4rem 1rem;
        font-size: 0.82rem;
        font-weight: 500;
        color: #94a3b8;
        background: rgba(15, 23, 42, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.2s ease;
    }
    .btn-pill-filter:hover,
    .btn-pill-filter.active {
        color: #ffffff;
        background: #2563eb;
        border-color: #2563eb;
        box-shadow: 0 0 12px rgba(37, 99, 235, 0.4);
    }
    .view-switch-btn {
        background: rgba(15, 23, 42, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #94a3b8;
        padding: 0.4rem 0.85rem;
        font-size: 0.82rem;
        transition: all 0.2s ease;
    }
    .view-switch-btn.active {
        background: #1e293b;
        color: #38bdf8;
        border-color: rgba(56, 189, 248, 0.4);
    }
    .message-card {
        border-left: 4px solid #3b82f6;
        cursor: pointer;
    }
    .message-card.source-mysql {
        border-left-color: #10b981;
    }
    .message-card.source-backup {
        border-left-color: #06b6d4;
    }
    .message-snippet-box {
        background: rgba(0, 0, 0, 0.25);
        border-radius: 0.5rem;
        border: 1px dashed rgba(255, 255, 255, 0.08);
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
        line-height: 1.55;
        color: #cbd5e1;
    }
    .inbox-table thead th {
        background-color: #111827 !important;
        color: #94a3b8 !important;
        border-bottom: 2px solid rgba(255, 255, 255, 0.08) !important;
        font-weight: 600;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
        padding: 0.85rem 1rem;
    }
    .inbox-table tbody tr {
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        transition: background-color 0.15s ease;
    }
    .inbox-table tbody tr:hover {
        background-color: rgba(30, 41, 59, 0.5) !important;
    }
    .inbox-table td {
        padding: 1rem;
        vertical-align: middle;
        color: #e2e8f0;
    }
    .badge-soft-success {
        background: rgba(16, 185, 129, 0.15);
        color: #34d399;
        border: 1px solid rgba(16, 185, 129, 0.3);
    }
    .badge-soft-info {
        background: rgba(6, 182, 212, 0.15);
        color: #38bdf8;
        border: 1px solid rgba(6, 182, 212, 0.3);
    }
    .badge-soft-primary {
        background: rgba(37, 99, 235, 0.15);
        color: #60a5fa;
        border: 1px solid rgba(37, 99, 235, 0.3);
    }
    .badge-soft-warning {
        background: rgba(245, 158, 11, 0.15);
        color: #fbbf24;
        border: 1px solid rgba(245, 158, 11, 0.3);
    }
    .copy-btn-feedback {
        font-size: 0.75rem;
        padding: 0.2rem 0.5rem;
        border-radius: 4px;
        transition: all 0.2s ease;
    }
    .modal-dark-reader .modal-content {
        background: #0f172a;
        color: #e2e8f0;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 1rem;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
    }
    .modal-dark-reader .modal-header {
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        padding: 1.25rem 1.5rem;
    }
    .modal-dark-reader .modal-footer {
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        padding: 1rem 1.5rem;
    }
    .reader-message-box {
        background: rgba(0, 0, 0, 0.35);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-left: 4px solid #3b82f6;
        border-radius: 0.65rem;
        padding: 1.25rem;
        font-size: 0.95rem;
        line-height: 1.65;
        white-space: pre-wrap;
        word-break: break-word;
    }
    .pulse-dot {
        display: inline-block;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        margin-right: 6px;
        animation: pulse-ring 2s infinite;
    }
    .pulse-green { background-color: #10b981; }
    .pulse-amber { background-color: #f59e0b; }
    @keyframes pulse-ring {
        0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
        70% { box-shadow: 0 0 0 6px rgba(16, 185, 129, 0); }
        100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
    }
    #inboxToast {
        position: fixed;
        bottom: 24px;
        right: 24px;
        z-index: 1090;
        min-width: 260px;
    }
</style>

<div class="inbox-page-wrapper py-4 flex-grow-1">
    <div class="container">

        <!-- Top Header Banner -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4 pt-2">
            <div>
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="badge badge-soft-primary px-3 py-1 rounded-pill fw-semibold">
                        <i class="fa-solid fa-shield-halved me-1"></i> Admin Portal
                    </span>
                    <span class="badge bg-secondary-subtle text-secondary border border-secondary border-opacity-25 px-2 py-1 rounded-pill small">
                        v2.4 Live
                    </span>
                </div>
                <h1 class="fw-bold h2 text-white mb-1">Messages & Inquiries Inbox</h1>
                <p class="text-secondary small mb-0">
                    Client contact requests, project inquiries, and feedback delivered through your portfolio.
                </p>
            </div>

            <!-- Header Action Buttons -->
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <a href="contact.php" class="btn btn-outline-light btn-sm rounded-pill px-3 py-2 d-inline-flex align-items-center gap-2">
                    <i class="fa-solid fa-paper-plane text-primary"></i>
                    <span>Send Test Message</span>
                </a>
                <a href="view-messages.php" class="btn btn-primary btn-sm rounded-pill px-3 py-2 d-inline-flex align-items-center gap-2 shadow-sm" title="Refresh messages">
                    <i class="fa-solid fa-rotate-right"></i>
                    <span>Refresh</span>
                </a>
            </div>
        </div>

        <!-- 4-Stat Overview Metrics Bar -->
        <div class="row g-3 mb-4">
            <!-- Metric 1: Total Messages -->
            <div class="col-6 col-lg-3">
                <div class="inbox-stat-tile">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-secondary small fw-medium">Total Received</span>
                        <div class="p-2 rounded-3 bg-primary bg-opacity-10 text-primary">
                            <i class="fa-solid fa-inbox"></i>
                        </div>
                    </div>
                    <div class="h3 fw-bold text-white mb-0" id="statTotalCount"><?php echo $totalCount; ?></div>
                    <small class="text-secondary" style="font-size: 0.75rem;">Lifetime inquiries</small>
                </div>
            </div>

            <!-- Metric 2: Today's Inquiries -->
            <div class="col-6 col-lg-3">
                <div class="inbox-stat-tile">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-secondary small fw-medium">Received Today</span>
                        <div class="p-2 rounded-3 bg-warning bg-opacity-10 text-warning">
                            <i class="fa-solid fa-bolt"></i>
                        </div>
                    </div>
                    <div class="h3 fw-bold text-white mb-0"><?php echo $todayCount; ?></div>
                    <small class="text-secondary" style="font-size: 0.75rem;"><?php echo date('M d, Y'); ?></small>
                </div>
            </div>

            <!-- Metric 3: Active Engine -->
            <div class="col-6 col-lg-3">
                <div class="inbox-stat-tile">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-secondary small fw-medium">Active Storage</span>
                        <div class="p-2 rounded-3 <?php echo !empty($dbConnected) ? 'bg-success bg-opacity-10 text-success' : 'bg-info bg-opacity-10 text-info'; ?>">
                            <i class="fa-solid <?php echo !empty($dbConnected) ? 'fa-database' : 'fa-file-shield'; ?>"></i>
                        </div>
                    </div>
                    <div class="fw-bold text-white mb-0 text-truncate" style="font-size: 1.05rem;">
                        <?php if (!empty($dbConnected)): ?>
                            <span class="pulse-dot pulse-green"></span>MySQL Live
                        <?php else: ?>
                            <span class="pulse-dot pulse-amber"></span>Local Backup
                        <?php endif; ?>
                    </div>
                    <small class="text-secondary" style="font-size: 0.75rem;">
                        <?php echo !empty($dbConnected) ? 'portfolio_db connected' : 'Fail-safe log active'; ?>
                    </small>
                </div>
            </div>

            <!-- Metric 4: Email Relay Status -->
            <div class="col-6 col-lg-3">
                <div class="inbox-stat-tile">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-secondary small fw-medium">Email Forwarding</span>
                        <div class="p-2 rounded-3 bg-info bg-opacity-10 text-info">
                            <i class="fa-solid fa-envelope-circle-check"></i>
                        </div>
                    </div>
                    <div class="fw-bold text-white mb-0 text-truncate" style="font-size: 0.92rem;">
                        fazalaamuhammad
                    </div>
                    <small class="text-success" style="font-size: 0.75rem;">
                        <i class="fa-solid fa-circle-check me-1"></i>Gmail Relay Active
                    </small>
                </div>
            </div>
        </div>

        <!-- System Storage Informational Notice (if in backup mode) -->
        <?php if (empty($dbConnected)): ?>
            <div class="alert alert-dark border-warning border-opacity-50 bg-opacity-50 d-flex align-items-start gap-3 p-3 rounded-3 mb-4 shadow-sm" role="alert">
                <i class="fa-solid fa-triangle-exclamation text-warning fs-4 mt-1"></i>
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <strong class="text-warning">Local Backup Mode Active</strong>
                        <a href="messages.txt" target="_blank" class="btn btn-outline-warning btn-sm py-1 px-3 rounded-pill font-monospace" style="font-size: 0.75rem;">
                            <i class="fa-solid fa-file-lines me-1"></i> View Raw messages.txt
                        </a>
                    </div>
                    <p class="text-secondary small mb-1 mt-1">
                        MySQL service is currently not connected (<code><?php echo htmlspecialchars($dbConnectionError ?: 'Connection refused'); ?></code>).
                        Messages are securely loaded from your local text backup. 
                        To enable relational SQL storage, simply start <strong>MySQL</strong> in your <strong>XAMPP Control Panel</strong>.
                    </p>
                </div>
            </div>
        <?php endif; ?>

        <!-- Search, Filter & View Mode Controls Toolbar -->
        <div class="inbox-glass-card p-3 mb-4">
            <div class="row g-3 align-items-center justify-content-between">
                <!-- Search Input with Debounce & Clear Button -->
                <div class="col-lg-5 col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-black bg-opacity-30 border-secondary border-opacity-25 text-secondary">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="text" 
                               id="inboxSearchInput" 
                               class="form-control bg-black bg-opacity-25 text-white border-secondary border-opacity-25 shadow-none" 
                               placeholder="Search sender, email, subject, keyword..." 
                               autocomplete="off">
                        <button class="btn btn-outline-secondary border-secondary border-opacity-25 text-secondary d-none" 
                                type="button" 
                                id="clearSearchBtn" 
                                title="Clear search">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>

                <!-- Source & View Mode Filters -->
                <div class="col-lg-7 col-md-6 d-flex flex-wrap align-items-center justify-content-md-end gap-2">
                    <!-- Filter Pills -->
                    <div class="btn-group" role="group" aria-label="Message Filters">
                        <button type="button" class="btn btn-pill-filter active" data-filter="all">
                            All <span class="badge bg-white bg-opacity-20 text-white ms-1"><?php echo $totalCount; ?></span>
                        </button>
                        <?php if ($mysqlCount > 0): ?>
                            <button type="button" class="btn btn-pill-filter" data-filter="mysql">
                                <i class="fa-solid fa-database me-1 text-success"></i> MySQL <span class="badge bg-white bg-opacity-20 ms-1"><?php echo $mysqlCount; ?></span>
                            </button>
                        <?php endif; ?>
                        <?php if ($backupCount > 0): ?>
                            <button type="button" class="btn btn-pill-filter" data-filter="backup">
                                <i class="fa-solid fa-file-lines me-1 text-info"></i> Backup <span class="badge bg-white bg-opacity-20 ms-1"><?php echo $backupCount; ?></span>
                            </button>
                        <?php endif; ?>
                    </div>

                    <!-- Layout Switcher: Cards vs Table -->
                    <div class="btn-group rounded-pill overflow-hidden border border-secondary border-opacity-25" role="group" aria-label="Layout View">
                        <button type="button" class="btn view-switch-btn active" id="viewCardsBtn" title="Card Stream View (Recommended for Mobile & Desktop)">
                            <i class="fa-solid fa-table-cells-large me-1"></i> Cards
                        </button>
                        <button type="button" class="btn view-switch-btn" id="viewTableBtn" title="Dense Tabular View">
                            <i class="fa-solid fa-table-list me-1"></i> Table
                        </button>
                    </div>
                </div>
            </div>

            <!-- Live Filter Stats Indicator -->
            <div class="d-flex align-items-center justify-content-between mt-2 pt-2 border-top border-secondary border-opacity-10 small text-secondary">
                <span id="resultsCountText">Showing <?php echo $totalCount; ?> of <?php echo $totalCount; ?> messages</span>
                <span id="activeFilterBadge" class="badge bg-secondary bg-opacity-25 text-light fw-normal">Filter: All</span>
            </div>
        </div>

        <?php if (empty($messages)): ?>
            <!-- Total Empty State -->
            <div class="inbox-glass-card p-5 text-center my-4">
                <div class="mb-3">
                    <div class="avatar-circle mx-auto mb-2" style="width: 70px; height: 70px; font-size: 1.8rem; background: rgba(37, 99, 235, 0.15); color: #3b82f6; border: 1px dashed rgba(37, 99, 235, 0.4);">
                        <i class="fa-regular fa-envelope-open"></i>
                    </div>
                </div>
                <h3 class="fw-bold text-white mb-2">Inbox is Currently Empty</h3>
                <p class="text-secondary mx-auto col-md-6 mb-4">
                    No inquiries have been recorded yet. When prospective clients, collaborators, or university recruiters submit the contact form on your portfolio, their submissions will appear here instantly.
                </p>
                <div>
                    <a href="contact.php" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold shadow-sm">
                        <i class="fa-solid fa-paper-plane me-2"></i> Submit a Test Inquiry
                    </a>
                </div>
            </div>
        <?php else: ?>

            <!-- No Matches Found Container (Hidden by default, shown by JS when search yields 0 matches) -->
            <div id="noMatchContainer" class="inbox-glass-card p-5 text-center my-4 d-none">
                <div class="mb-3 text-secondary">
                    <i class="fa-solid fa-magnifying-glass display-5 opacity-50"></i>
                </div>
                <h4 class="fw-bold text-white mb-2">No Matching Messages Found</h4>
                <p class="text-secondary small mx-auto col-md-6 mb-3">
                    No received messages match your current filter or query: "<span id="noMatchQuery" class="text-white fw-semibold"></span>".
                </p>
                <button type="button" class="btn btn-outline-primary btn-sm rounded-pill px-4 py-2" id="resetSearchBtn">
                    <i class="fa-solid fa-rotate-left me-1"></i> Clear Search & Show All
                </button>
            </div>

            <!-- ========================================================
                 VIEW MODE 1: RESPONSIVE CARD STREAM (DEFAULT)
                 ======================================================== -->
            <div id="cardStreamContainer" class="row g-3">
                <?php foreach ($messages as $msg): 
                    $sourceType = ($msg['source'] ?? '') === 'MySQL Database' ? 'mysql' : 'backup';
                    $initials = getInitials($msg['fullname'] ?? 'Sender');
                    $avatarBg = getAvatarGradient($msg['fullname'] ?? 'Sender');
                    $relTime = timeAgo($msg['created_at'] ?? '');
                    $fullTime = !empty($msg['created_at']) ? date('M d, Y \a\t h:i A', strtotime($msg['created_at'])) : 'N/A';
                    $msgText = $msg['message'] ?? '';
                    $cleanSubject = !empty($msg['subject']) ? $msg['subject'] : 'General Inquiry';
                ?>
                    <div class="col-12 col-lg-6 message-item" 
                         data-source="<?php echo $sourceType; ?>"
                         data-name="<?php echo htmlspecialchars(strtolower($msg['fullname'])); ?>"
                         data-email="<?php echo htmlspecialchars(strtolower($msg['email'])); ?>"
                         data-subject="<?php echo htmlspecialchars(strtolower($cleanSubject)); ?>"
                         data-message="<?php echo htmlspecialchars(strtolower($msgText)); ?>"
                         data-date="<?php echo htmlspecialchars(strtolower($msg['created_at'] ?? '')); ?>">

                        <div class="inbox-glass-card message-card source-<?php echo $sourceType; ?> p-3 p-md-4 h-100 d-flex flex-column justify-content-between"
                             onclick="openMessageReader(<?php echo htmlspecialchars(json_encode([
                                 'id' => $msg['id'],
                                 'name' => $msg['fullname'],
                                 'email' => $msg['email'],
                                 'subject' => $cleanSubject,
                                 'message' => $msgText,
                                 'created_at' => $fullTime,
                                 'relative_time' => $relTime,
                                 'ip' => $msg['ip_address'] ?? '127.0.0.1',
                                 'source' => $msg['source'] ?? 'Local Backup'
                             ])); ?>)">

                            <!-- Card Header -->
                            <div>
                                <div class="d-flex align-items-start justify-content-between gap-2 mb-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <!-- Avatar -->
                                        <div class="avatar-circle" style="background: <?php echo $avatarBg; ?>;">
                                            <?php echo htmlspecialchars($initials); ?>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-white sender-title d-flex align-items-center gap-2">
                                                <span><?php echo htmlspecialchars($msg['fullname']); ?></span>
                                                <span class="badge bg-secondary-subtle text-secondary font-monospace" style="font-size: 0.65rem;">
                                                    #<?php echo htmlspecialchars($msg['id']); ?>
                                                </span>
                                            </div>
                                            <!-- Email with 1-Click Copy -->
                                            <div class="d-flex align-items-center gap-2 mt-1">
                                                <a href="mailto:<?php echo htmlspecialchars($msg['email']); ?>" 
                                                   class="text-primary text-decoration-none small text-truncate d-inline-block"
                                                   style="max-width: 200px;"
                                                   onclick="event.stopPropagation();">
                                                    <?php echo htmlspecialchars($msg['email']); ?>
                                                </a>
                                                <button type="button" 
                                                        class="btn btn-outline-secondary border-0 p-0 text-secondary copy-btn"
                                                        title="Copy email address"
                                                        onclick="copyToClipboard('<?php echo htmlspecialchars($msg['email']); ?>', 'Email copied!', event)">
                                                    <i class="fa-regular fa-copy fa-xs"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Source Badge -->
                                    <div>
                                        <?php if ($sourceType === 'mysql'): ?>
                                            <span class="badge badge-soft-success rounded-pill px-2 py-1 small">
                                                <i class="fa-solid fa-database me-1"></i> MySQL
                                            </span>
                                        <?php else: ?>
                                            <span class="badge badge-soft-info rounded-pill px-2 py-1 small">
                                                <i class="fa-solid fa-file-lines me-1"></i> Backup
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Subject line -->
                                <div class="mb-2">
                                    <span class="badge bg-black bg-opacity-40 text-light border border-secondary border-opacity-25 px-2 py-1 fw-medium text-wrap text-start">
                                        <i class="fa-solid fa-tag text-primary me-1"></i>
                                        <?php echo htmlspecialchars($cleanSubject); ?>
                                    </span>
                                </div>

                                <!-- Snippet Box -->
                                <div class="message-snippet-box mb-3">
                                    <?php 
                                        $displaySnippet = mb_strlen($msgText) > 160 ? mb_substr($msgText, 0, 160) . '...' : $msgText;
                                        echo nl2br(htmlspecialchars($displaySnippet));
                                    ?>
                                </div>
                            </div>

                            <!-- Card Footer Controls -->
                            <div class="d-flex align-items-center justify-content-between pt-2 border-top border-secondary border-opacity-10 flex-wrap gap-2">
                                <div class="small text-secondary d-flex align-items-center gap-2">
                                    <span title="<?php echo htmlspecialchars($fullTime); ?>">
                                        <i class="fa-regular fa-clock me-1 text-primary"></i><?php echo htmlspecialchars($relTime); ?>
                                    </span>
                                    <span class="d-none d-sm-inline">&bull;</span>
                                    <span class="font-monospace text-secondary opacity-75 d-none d-sm-inline" style="font-size: 0.72rem;">
                                        IP: <?php echo htmlspecialchars($msg['ip_address'] ?? '127.0.0.1'); ?>
                                    </span>
                                </div>

                                <div class="d-flex align-items-center gap-1" onclick="event.stopPropagation();">
                                    <!-- Copy Message Button -->
                                    <button type="button" 
                                            class="btn btn-outline-secondary btn-sm rounded-pill px-2 py-1"
                                            title="Copy message text"
                                            onclick="copyToClipboard(<?php echo htmlspecialchars(json_encode($msgText)); ?>, 'Message text copied!', event)">
                                        <i class="fa-regular fa-clone"></i>
                                    </button>

                                    <!-- Quick Reply via Mailto -->
                                    <a href="mailto:<?php echo htmlspecialchars($msg['email']); ?>?subject=Re:%20<?php echo urlencode($cleanSubject); ?>" 
                                       class="btn btn-outline-primary btn-sm rounded-pill px-3 py-1" 
                                       title="Reply via Email Client">
                                        <i class="fa-solid fa-reply me-1"></i> Reply
                                    </a>

                                    <!-- View Full Message Trigger -->
                                    <button type="button" 
                                            class="btn btn-primary btn-sm rounded-pill px-3 py-1"
                                            onclick="openMessageReader(<?php echo htmlspecialchars(json_encode([
                                                'id' => $msg['id'],
                                                'name' => $msg['fullname'],
                                                'email' => $msg['email'],
                                                'subject' => $cleanSubject,
                                                'message' => $msgText,
                                                'created_at' => $fullTime,
                                                'relative_time' => $relTime,
                                                'ip' => $msg['ip_address'] ?? '127.0.0.1',
                                                'source' => $msg['source'] ?? 'Local Backup'
                                            ])); ?>)">
                                        <i class="fa-solid fa-expand me-1"></i> Details
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- ========================================================
                 VIEW MODE 2: TABULAR DESKTOP VIEW (TOGGLEABLE)
                 ======================================================== -->
            <div id="tableStreamContainer" class="inbox-glass-card overflow-hidden shadow-sm d-none">
                <div class="table-responsive mb-0">
                    <table class="table table-dark align-middle mb-0 inbox-table">
                        <thead>
                            <tr>
                                <th style="width: 60px;">ID</th>
                                <th style="width: 240px;">SENDER</th>
                                <th style="width: 180px;">SUBJECT</th>
                                <th>MESSAGE PREVIEW</th>
                                <th style="width: 160px;">DATE & TIME</th>
                                <th style="width: 110px;">SOURCE</th>
                                <th style="width: 120px;" class="text-end">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($messages as $msg): 
                                $sourceType = ($msg['source'] ?? '') === 'MySQL Database' ? 'mysql' : 'backup';
                                $initials = getInitials($msg['fullname'] ?? 'Sender');
                                $avatarBg = getAvatarGradient($msg['fullname'] ?? 'Sender');
                                $relTime = timeAgo($msg['created_at'] ?? '');
                                $fullTime = !empty($msg['created_at']) ? date('M d, Y \a\t h:i A', strtotime($msg['created_at'])) : 'N/A';
                                $msgText = $msg['message'] ?? '';
                                $cleanSubject = !empty($msg['subject']) ? $msg['subject'] : 'General Inquiry';
                            ?>
                                <tr class="message-item table-message-row"
                                    data-source="<?php echo $sourceType; ?>"
                                    data-name="<?php echo htmlspecialchars(strtolower($msg['fullname'])); ?>"
                                    data-email="<?php echo htmlspecialchars(strtolower($msg['email'])); ?>"
                                    data-subject="<?php echo htmlspecialchars(strtolower($cleanSubject)); ?>"
                                    data-message="<?php echo htmlspecialchars(strtolower($msgText)); ?>"
                                    data-date="<?php echo htmlspecialchars(strtolower($msg['created_at'] ?? '')); ?>"
                                    style="cursor: pointer;"
                                    onclick="openMessageReader(<?php echo htmlspecialchars(json_encode([
                                        'id' => $msg['id'],
                                        'name' => $msg['fullname'],
                                        'email' => $msg['email'],
                                        'subject' => $cleanSubject,
                                        'message' => $msgText,
                                        'created_at' => $fullTime,
                                        'relative_time' => $relTime,
                                        'ip' => $msg['ip_address'] ?? '127.0.0.1',
                                        'source' => $msg['source'] ?? 'Local Backup'
                                    ])); ?>)">
                                    
                                    <td class="font-monospace text-secondary fw-semibold">
                                        #<?php echo htmlspecialchars($msg['id']); ?>
                                    </td>
                                    
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-circle" style="width: 34px; height: 34px; font-size: 0.8rem; background: <?php echo $avatarBg; ?>;">
                                                <?php echo htmlspecialchars($initials); ?>
                                            </div>
                                            <div class="overflow-hidden">
                                                <div class="fw-bold text-white text-truncate" style="max-width: 170px;">
                                                    <?php echo htmlspecialchars($msg['fullname']); ?>
                                                </div>
                                                <div class="small d-flex align-items-center gap-1">
                                                    <span class="text-primary text-truncate" style="max-width: 150px;">
                                                        <?php echo htmlspecialchars($msg['email']); ?>
                                                    </span>
                                                    <button type="button" 
                                                            class="btn btn-link p-0 text-secondary border-0" 
                                                            title="Copy email"
                                                            onclick="copyToClipboard('<?php echo htmlspecialchars($msg['email']); ?>', 'Email copied!', event)">
                                                        <i class="fa-regular fa-copy fa-xs"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <span class="badge bg-black bg-opacity-40 text-light border border-secondary border-opacity-25 px-2 py-1 text-wrap text-start">
                                            <?php echo htmlspecialchars($cleanSubject); ?>
                                        </span>
                                    </td>

                                    <td>
                                        <div class="text-light small" style="max-width: 380px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            <?php echo htmlspecialchars(mb_substr($msgText, 0, 90)); ?>
                                        </div>
                                        <div class="font-monospace text-secondary" style="font-size: 0.7rem;">
                                            IP: <?php echo htmlspecialchars($msg['ip_address'] ?? '127.0.0.1'); ?>
                                        </div>
                                    </td>

                                    <td class="small text-secondary">
                                        <div><i class="fa-regular fa-clock me-1 text-primary"></i><?php echo htmlspecialchars($relTime); ?></div>
                                        <span class="opacity-75" style="font-size: 0.72rem;"><?php echo htmlspecialchars($fullTime); ?></span>
                                    </td>

                                    <td>
                                        <?php if ($sourceType === 'mysql'): ?>
                                            <span class="badge badge-soft-success rounded-pill px-2 py-1 small">
                                                <i class="fa-solid fa-database me-1"></i> MySQL
                                            </span>
                                        <?php else: ?>
                                            <span class="badge badge-soft-info rounded-pill px-2 py-1 small">
                                                <i class="fa-solid fa-file-lines me-1"></i> Backup
                                            </span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-end" onclick="event.stopPropagation();">
                                        <div class="btn-group">
                                            <button type="button" 
                                                    class="btn btn-outline-secondary btn-sm rounded-start-pill px-2"
                                                    title="Copy message text"
                                                    onclick="copyToClipboard(<?php echo htmlspecialchars(json_encode($msgText)); ?>, 'Message text copied!', event)">
                                                <i class="fa-regular fa-clone"></i>
                                            </button>
                                            <a href="mailto:<?php echo htmlspecialchars($msg['email']); ?>?subject=Re:%20<?php echo urlencode($cleanSubject); ?>" 
                                               class="btn btn-outline-primary btn-sm rounded-end-pill px-2"
                                               title="Reply to sender">
                                                <i class="fa-solid fa-reply"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php endif; ?>

    </div>
</div>

<!-- ========================================================
     MODAL: FULL MESSAGE DETAIL READER
     ======================================================== -->
<div class="modal fade modal-dark-reader" id="messageReaderModal" tabindex="-1" aria-labelledby="messageReaderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div id="modalAvatar" class="avatar-circle"></div>
                    <div>
                        <h5 class="modal-title fw-bold text-white mb-0" id="modalSenderName">Sender Details</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="text-primary small" id="modalSenderEmail">email@example.com</span>
                            <button type="button" class="btn btn-link p-0 text-secondary border-0" id="modalCopyEmailBtn" title="Copy email">
                                <i class="fa-regular fa-copy fa-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4">
                <!-- Meta Info Strip -->
                <div class="row g-2 mb-3 p-3 bg-black bg-opacity-30 rounded-3 small">
                    <div class="col-sm-6 col-md-3">
                        <span class="text-secondary d-block">Received Time</span>
                        <strong class="text-white" id="modalReceivedTime">N/A</strong>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <span class="text-secondary d-block">Relative</span>
                        <span class="badge badge-soft-primary" id="modalRelativeTime">Just now</span>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <span class="text-secondary d-block">Client IP</span>
                        <span class="font-monospace text-light" id="modalIp">127.0.0.1</span>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <span class="text-secondary d-block">Storage Source</span>
                        <span id="modalSourceBadge"></span>
                    </div>
                </div>

                <!-- Subject line -->
                <div class="mb-3">
                    <span class="text-secondary small d-block mb-1">Subject:</span>
                    <h6 class="fw-bold text-white p-2 bg-secondary bg-opacity-10 rounded border border-secondary border-opacity-25" id="modalSubject">
                        Subject Text
                    </h6>
                </div>

                <!-- Message Box -->
                <div class="mb-2">
                    <span class="text-secondary small d-block mb-1">Message Body:</span>
                    <div class="reader-message-box" id="modalMessageContent">
                        Full message content will appear here.
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer d-flex justify-content-between flex-wrap gap-2">
                <div class="small text-secondary">
                    <i class="fa-solid fa-envelope-circle-check text-info me-1"></i> Dispatched to <code>fazalaamuhammad@gmail.com</code>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill px-3 py-2" id="modalCopyMsgBtn">
                        <i class="fa-regular fa-clone me-1"></i> Copy Message
                    </button>
                    <a href="#" class="btn btn-primary btn-sm rounded-pill px-4 py-2" id="modalReplyBtn">
                        <i class="fa-solid fa-reply me-1"></i> Reply via Email
                    </a>
                    <button type="button" class="btn btn-outline-light btn-sm rounded-pill px-3 py-2" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ========================================================
     FLOATING TOAST FOR INSTANT CLIPBOARD FEEDBACK
     ======================================================== -->
<div id="inboxToast" class="toast align-items-center text-white bg-dark border border-primary border-opacity-50 shadow-lg rounded-3" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body d-flex align-items-center gap-2 py-2 px-3 small">
            <i class="fa-solid fa-circle-check text-primary fs-6"></i>
            <span id="toastMessage">Copied to clipboard!</span>
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>

<!-- ========================================================
     CLIENT-SIDE INTERACTIVE ENGINE (SEARCH, FILTER, VIEWS)
     ======================================================== -->
<script>
    // Global function to trigger Bootstrap Message Reader Modal
    let activeModalMessageText = '';
    let activeModalSenderEmail = '';

    function openMessageReader(data) {
        if (!data) return;
        
        activeModalMessageText = data.message || '';
        activeModalSenderEmail = data.email || '';

        // Populate modal fields
        document.getElementById('modalSenderName').textContent = data.name || 'Unknown Sender';
        document.getElementById('modalSenderEmail').textContent = data.email || '';
        document.getElementById('modalSubject').textContent = data.subject || 'General Inquiry';
        document.getElementById('modalMessageContent').textContent = data.message || '';
        document.getElementById('modalReceivedTime').textContent = data.created_at || 'N/A';
        document.getElementById('modalRelativeTime').textContent = data.relative_time || '';
        document.getElementById('modalIp').textContent = data.ip || '127.0.0.1';

        // Set avatar
        const avatarEl = document.getElementById('modalAvatar');
        if (avatarEl) {
            const initials = (data.name || '?').split(' ').map(w => w[0]).filter(Boolean).slice(0, 2).join('').toUpperCase();
            avatarEl.textContent = initials || '?';
            avatarEl.style.background = 'linear-gradient(135deg, #2563eb 0%, #4f46e5 100%)';
        }

        // Set source badge
        const badgeEl = document.getElementById('modalSourceBadge');
        if (badgeEl) {
            if ((data.source || '').toLowerCase().includes('mysql')) {
                badgeEl.innerHTML = '<span class="badge badge-soft-success rounded-pill px-2 py-1"><i class="fa-solid fa-database me-1"></i> MySQL Live</span>';
            } else {
                badgeEl.innerHTML = '<span class="badge badge-soft-info rounded-pill px-2 py-1"><i class="fa-solid fa-file-lines me-1"></i> Backup File</span>';
            }
        }

        // Set reply link
        const replyBtn = document.getElementById('modalReplyBtn');
        if (replyBtn) {
            replyBtn.href = 'mailto:' + encodeURIComponent(data.email || '') + 
                            '?subject=' + encodeURIComponent('Re: ' + (data.subject || 'Inquiry'));
        }

        // Open modal
        const modalElement = document.getElementById('messageReaderModal');
        if (modalElement && typeof bootstrap !== 'undefined') {
            const modalInstance = bootstrap.Modal.getOrCreateInstance(modalElement);
            modalInstance.show();
        }
    }

    // Copy to clipboard helper with toast
    function copyToClipboard(text, successMsg, evt) {
        if (evt) {
            evt.stopPropagation();
            evt.preventDefault();
        }
        if (!text) return;

        navigator.clipboard.writeText(text).then(() => {
            showToast(successMsg || 'Copied to clipboard!');
        }).catch(() => {
            // Fallback for older browsers
            const textarea = document.createElement('textarea');
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
            showToast(successMsg || 'Copied to clipboard!');
        });
    }

    function showToast(msg) {
        const toastEl = document.getElementById('inboxToast');
        const toastMsgEl = document.getElementById('toastMessage');
        if (toastEl && toastMsgEl && typeof bootstrap !== 'undefined') {
            toastMsgEl.textContent = msg;
            const toast = bootstrap.Toast.getOrCreateInstance(toastEl, { delay: 2200 });
            toast.show();
        }
    }

    // Modal Copy Listeners
    document.addEventListener('DOMContentLoaded', function () {
        const modalCopyEmailBtn = document.getElementById('modalCopyEmailBtn');
        if (modalCopyEmailBtn) {
            modalCopyEmailBtn.addEventListener('click', function (e) {
                copyToClipboard(activeModalSenderEmail, 'Sender email copied!', e);
            });
        }

        const modalCopyMsgBtn = document.getElementById('modalCopyMsgBtn');
        if (modalCopyMsgBtn) {
            modalCopyMsgBtn.addEventListener('click', function (e) {
                copyToClipboard(activeModalMessageText, 'Message text copied!', e);
            });
        }

        // Search & Filter Engine
        const searchInput = document.getElementById('inboxSearchInput');
        const clearSearchBtn = document.getElementById('clearSearchBtn');
        const resetSearchBtn = document.getElementById('resetSearchBtn');
        const filterPills = document.querySelectorAll('.btn-pill-filter');
        const resultsCountText = document.getElementById('resultsCountText');
        const activeFilterBadge = document.getElementById('activeFilterBadge');
        const noMatchContainer = document.getElementById('noMatchContainer');
        const noMatchQuery = document.getElementById('noMatchQuery');
        const messageItems = document.querySelectorAll('.message-item');
        const totalItemsCount = messageItems.length > 0 ? (messageItems.length / (document.getElementById('tableStreamContainer') ? 2 : 1)) : 0;

        let currentFilter = 'all';
        let currentSearchQuery = '';

        function applyFilters() {
            let visibleCount = 0;
            const query = currentSearchQuery.toLowerCase().trim();

            // Toggle clear search button visibility
            if (clearSearchBtn) {
                if (query.length > 0) {
                    clearSearchBtn.classList.remove('d-none');
                } else {
                    clearSearchBtn.classList.add('d-none');
                }
            }

            // Iterate over items
            messageItems.forEach(item => {
                const source = item.getAttribute('data-source') || '';
                const name = item.getAttribute('data-name') || '';
                const email = item.getAttribute('data-email') || '';
                const subject = item.getAttribute('data-subject') || '';
                const message = item.getAttribute('data-message') || '';
                const date = item.getAttribute('data-date') || '';

                // Source check
                let matchesSource = true;
                if (currentFilter === 'mysql' && source !== 'mysql') matchesSource = false;
                if (currentFilter === 'backup' && source !== 'backup') matchesSource = false;

                // Search query check
                let matchesQuery = true;
                if (query.length > 0) {
                    const fullHaystack = `${name} ${email} ${subject} ${message} ${date}`;
                    if (!fullHaystack.includes(query)) {
                        matchesQuery = false;
                    }
                }

                if (matchesSource && matchesQuery) {
                    item.style.display = '';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Adjust count if both card and table elements exist in DOM
            const actualVisible = Math.ceil(visibleCount / 2);

            // Update stats text
            if (resultsCountText) {
                resultsCountText.textContent = `Showing ${actualVisible} of ${totalItemsCount} messages`;
            }

            // Handle No Matches UI
            if (noMatchContainer) {
                if (actualVisible === 0 && totalItemsCount > 0) {
                    noMatchContainer.classList.remove('d-none');
                    if (noMatchQuery) {
                        noMatchQuery.textContent = query || currentFilter;
                    }
                } else {
                    noMatchContainer.classList.add('d-none');
                }
            }
        }

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                currentSearchQuery = this.value;
                applyFilters();
            });
        }

        if (clearSearchBtn) {
            clearSearchBtn.addEventListener('click', function () {
                searchInput.value = '';
                currentSearchQuery = '';
                searchInput.focus();
                applyFilters();
            });
        }

        if (resetSearchBtn) {
            resetSearchBtn.addEventListener('click', function () {
                if (searchInput) searchInput.value = '';
                currentSearchQuery = '';
                currentFilter = 'all';
                filterPills.forEach(p => p.classList.remove('active'));
                const allPill = document.querySelector('.btn-pill-filter[data-filter="all"]');
                if (allPill) allPill.classList.add('active');
                if (activeFilterBadge) activeFilterBadge.textContent = 'Filter: All';
                applyFilters();
            });
        }

        // Filter Pills Click Handler
        filterPills.forEach(pill => {
            pill.addEventListener('click', function () {
                filterPills.forEach(p => p.classList.remove('active'));
                this.classList.add('active');
                currentFilter = this.getAttribute('data-filter') || 'all';

                if (activeFilterBadge) {
                    const label = this.textContent.trim().replace(/\s+\d+$/, '');
                    activeFilterBadge.textContent = 'Filter: ' + label;
                }

                applyFilters();
            });
        });

        // Layout View Switcher (Cards vs Table)
        const viewCardsBtn = document.getElementById('viewCardsBtn');
        const viewTableBtn = document.getElementById('viewTableBtn');
        const cardStreamContainer = document.getElementById('cardStreamContainer');
        const tableStreamContainer = document.getElementById('tableStreamContainer');

        function switchLayout(mode) {
            if (mode === 'table') {
                if (cardStreamContainer) cardStreamContainer.classList.add('d-none');
                if (tableStreamContainer) tableStreamContainer.classList.remove('d-none');
                if (viewTableBtn) viewTableBtn.classList.add('active');
                if (viewCardsBtn) viewCardsBtn.classList.remove('active');
                localStorage.setItem('inbox_view_mode', 'table');
            } else {
                if (tableStreamContainer) tableStreamContainer.classList.add('d-none');
                if (cardStreamContainer) cardStreamContainer.classList.remove('d-none');
                if (viewCardsBtn) viewCardsBtn.classList.add('active');
                if (viewTableBtn) viewTableBtn.classList.remove('active');
                localStorage.setItem('inbox_view_mode', 'cards');
            }
        }

        if (viewCardsBtn) {
            viewCardsBtn.addEventListener('click', function () {
                switchLayout('cards');
            });
        }

        if (viewTableBtn) {
            viewTableBtn.addEventListener('click', function () {
                switchLayout('table');
            });
        }

        // Restore saved layout mode or default to cards
        const savedViewMode = localStorage.getItem('inbox_view_mode');
        if (savedViewMode === 'table') {
            switchLayout('table');
        } else {
            switchLayout('cards');
        }
    });
</script>

<?php include 'includes/footer.php'; ?>
