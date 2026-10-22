<?php
// Set page title
$pageTitle = "Messages Inbox | A.A. Fazal Muhammad";
require_once __DIR__ . '/includes/db.php';
include 'includes/header.php';

// Fetch all messages from database ordered by latest first
$messages = [];
$fetchError = '';

if (isset($conn) && ($conn instanceof mysqli) && !$conn->connect_error) {
    $result = $conn->query("SELECT * FROM messages ORDER BY id DESC");
    if ($result) {
        $messages = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $fetchError = "Error loading messages from database: " . $conn->error;
    }
} else {
    $fetchError = "Unable to connect to database.";
}
?>

<!-- Banner Section -->
<section class="bg-dark text-white py-5 border-bottom border-secondary border-opacity-25">
    <div class="container py-2 text-center">
        <span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25 rounded-pill px-3 py-1 mb-2 fw-semibold">
            Admin Inbox
        </span>
        <h1 class="fw-bold display-6 mb-2">Received Messages</h1>
        <p class="text-secondary fs-6 mx-auto col-md-8 mb-0">
            All contact inquiries submitted through the portfolio contact form and stored in MySQL (portfolio_db).
        </p>
    </div>
</section>

<!-- Messages Content Section -->
<section class="py-5 flex-grow-1">
    <div class="container">

        <?php if (!empty($fetchError)): ?>
            <div class="alert alert-danger d-flex align-items-center gap-2 mb-4" role="alert">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <div><?php echo htmlspecialchars($fetchError); ?></div>
            </div>
        <?php endif; ?>

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h4 class="fw-bold mb-0 text-white">All Inquiries</h4>
                <small class="text-secondary">Total: <?php echo count($messages); ?> message(s)</small>
            </div>
            <div class="d-flex gap-2">
                <a href="contact.php" class="btn btn-outline-light btn-sm">
                    <i class="fa-solid fa-arrow-left me-1"></i> Go to Contact Form
                </a>
                <a href="view-messages.php" class="btn btn-primary btn-sm">
                    <i class="fa-solid fa-rotate-right me-1"></i> Refresh
                </a>
            </div>
        </div>

        <?php if (empty($messages)): ?>
            <div class="card bg-dark text-white border-secondary border-opacity-25 p-5 text-center rounded-3">
                <div class="mb-3">
                    <i class="fa-regular fa-envelope-open display-4 text-secondary"></i>
                </div>
                <h5 class="fw-semibold">No messages found yet</h5>
                <p class="text-secondary small mb-3">When someone submits your contact form, their message will appear here.</p>
                <div>
                    <a href="contact.php" class="btn btn-primary btn-sm px-3">Send a Test Message</a>
                </div>
            </div>
        <?php else: ?>
            <div class="table-responsive shadow-sm rounded-3 border border-secondary border-opacity-25">
                <table class="table table-dark table-hover align-middle mb-0">
                    <thead class="table-secondary text-dark text-uppercase small">
                        <tr>
                            <th scope="col" style="width: 60px;">#</th>
                            <th scope="col" style="width: 180px;">Sender</th>
                            <th scope="col" style="width: 200px;">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col" style="width: 160px;">Received At</th>
                            <th scope="col" style="width: 110px;">IP Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($messages as $msg): ?>
                            <tr>
                                <td class="fw-bold text-secondary">
                                    #<?php echo htmlspecialchars($msg['id']); ?>
                                </td>
                                <td>
                                    <div class="fw-semibold text-white">
                                        <?php echo htmlspecialchars($msg['fullname']); ?>
                                    </div>
                                    <small class="text-primary d-block">
                                        <a href="mailto:<?php echo htmlspecialchars($msg['email']); ?>" class="text-decoration-none text-primary">
                                            <?php echo htmlspecialchars($msg['email']); ?>
                                        </a>
                                    </small>
                                </td>
                                <td>
                                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50">
                                        <?php echo htmlspecialchars($msg['subject'] ?? 'General Inquiry'); ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="text-light" style="white-space: pre-wrap; font-size: 0.92rem;">
                                        <?php echo nl2br(htmlspecialchars($msg['message'])); ?>
                                    </div>
                                </td>
                                <td class="small text-secondary">
                                    <i class="fa-regular fa-clock me-1"></i>
                                    <?php 
                                        $timestamp = !empty($msg['created_at']) ? strtotime($msg['created_at']) : null;
                                        echo $timestamp ? date('M d, Y h:i A', $timestamp) : 'N/A';
                                    ?>
                                </td>
                                <td class="small text-secondary font-monospace">
                                    <?php echo htmlspecialchars($msg['ip_address'] ?? '127.0.0.1'); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

    </div>
</section>

<?php include 'includes/footer.php'; ?>

