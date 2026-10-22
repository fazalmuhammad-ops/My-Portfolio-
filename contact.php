<?php
// Set custom page title
$pageTitle = "Contact Me | A.A. Fazal Muhammad";
include 'includes/header.php';

// Check for status query parameters
$status = isset($_GET['status']) ? trim($_GET['status']) : '';
$errorMessage = isset($_GET['msg']) ? trim($_GET['msg']) : '';
?>

<!-- Page Banner -->
<section class="bg-dark text-white py-5 border-bottom border-secondary border-opacity-25">
    <div class="container py-2 text-center">
        <span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25 rounded-pill px-3 py-1 mb-2 fw-semibold">
            Get In Touch
        </span>
        <h1 class="fw-bold display-5 mb-2">Contact Me</h1>
        <p class="text-secondary lead fs-6 mx-auto col-md-8 mb-0">
            Have questions regarding my university coursework, projects, or prospective internship opportunities? Leave a message below.
        </p>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-5">
    <div class="container py-3">

        <!-- Display Alerts Based on URL Status Parameters -->
        <div class="row justify-content-center mb-4">
            <div class="col-lg-10">
                <?php if ($status === 'success'): ?>
                    <div class="alert alert-success alert-dismissible fade show shadow-sm status-alert-box d-flex align-items-center justify-content-between flex-wrap gap-3 p-3 rounded-3" role="alert">
                        <div class="d-flex align-items-center gap-3">
                            <i class="fa-solid fa-circle-check fs-3 text-success"></i>
                            <div>
                                <strong class="d-block">Message Received Successfully!</strong>
                                <span>Thank you! Your message has been safely recorded and stored.</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <a href="view-messages.php" class="btn btn-sm btn-success text-white px-3 rounded-pill fw-semibold shadow-sm">
                                <i class="fa-solid fa-inbox me-1"></i> View Inbox
                            </a>
                            <button type="button" class="btn-close position-static" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php elseif ($status === 'error'): ?>
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm status-alert-box d-flex align-items-center gap-3 p-3 rounded-3" role="alert">
                        <i class="fa-solid fa-triangle-exclamation fs-3 text-danger"></i>
                        <div>
                            <strong class="d-block">Submission Failed!</strong>
                            <span>
                                <?php 
                                    if (!empty($errorMessage)) {
                                        echo htmlspecialchars($errorMessage);
                                    } else {
                                        echo "Please ensure all required fields are filled out correctly with a valid email address.";
                                    }
                                ?>
                            </span>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row g-5 justify-content-center">
            <!-- Left Column: Contact Information Card -->
            <div class="col-lg-4">
                <div class="contact-info-panel d-flex flex-column justify-content-between shadow-sm">
                    <div>
                        <span class="badge bg-primary px-3 py-1 rounded-pill mb-3">Reach Out</span>
                        <h3 class="fw-bold text-white mb-3">Contact Information</h3>
                        <p class="text-secondary small mb-4">
                            You can reach out through the official contact form or connect via university and social channels.
                        </p>

                        <div class="d-flex flex-column gap-3 mb-4">
                            <div class="d-flex align-items-start gap-3">
                                <div class="info-icon bg-white bg-opacity-10 text-primary border border-white border-opacity-10">
                                    <i class="fa-solid fa-building-columns"></i>
                                </div>
                                <div>
                                    <small class="text-secondary d-block">Department & Campus</small>
                                    <span class="fw-semibold text-white small">Dept. of ICT, FHSS, University of Sri Jayewardenepura</span>
                                </div>
                            </div>

                            <div class="d-flex align-items-start gap-3">
                                <div class="info-icon bg-white bg-opacity-10 text-primary border border-white border-opacity-10">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div>
                                    <small class="text-secondary d-block">Academic Email</small>
                                    <a href="mailto:fazalaamuhammad@gmail.com" class="fw-semibold text-white small text-decoration-none">
                                        fazalaamuhammad@gmail.com
                                    </a>
                                </div>
                            </div>

                            <div class="d-flex align-items-start gap-3">
                                <div class="info-icon bg-white bg-opacity-10 text-primary border border-white border-opacity-10">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div>
                                    <small class="text-secondary d-block">Phone / WhatsApp</small>
                                    <span class="fw-semibold text-white small">+94 75 149 2616</span>
                                </div>
                            </div>

                            <div class="d-flex align-items-start gap-3">
                                <div class="info-icon bg-white bg-opacity-10 text-primary border border-white border-opacity-10">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div>
                                    <small class="text-secondary d-block">Location</small>
                                    <span class="fw-semibold text-white small">Gangodawila, Nugegoda, Sri Lanka</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Presence & Inbox Shortcut -->
                    <div>
                        <div class="pt-3 border-top border-white border-opacity-10 mb-3">
                            <small class="text-secondary d-block mb-2 text-uppercase tracking-wider">Social Channels</small>
                            <div class="d-flex gap-2">
                                <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="social-btn" title="GitHub" aria-label="GitHub">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                                <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="social-btn" title="LinkedIn" aria-label="LinkedIn">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                                <a href="mailto:fazalaamuhammad@gmail.com" class="social-btn" title="Email" aria-label="Email">
                                    <i class="fa-solid fa-envelope"></i>
                                </a>
                            </div>
                        </div>

                        <div class="pt-2">
                            <a href="view-messages.php" class="btn btn-outline-light btn-sm w-100 rounded-pill d-flex align-items-center justify-content-center gap-2 py-2">
                                <i class="fa-solid fa-inbox text-primary"></i>
                                <span>Check Received Messages</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Right Column: Bootstrap Contact Form -->
            <div class="col-lg-6">
                <div class="contact-card">
                    <h3 class="fw-bold mb-2">Send a Message</h3>
                    <p class="text-secondary small mb-4">
                        Fill out the details below. Submitted messages are safely sanitized and stored for local testing.
                    </p>

                    <!-- Form target: process-form.php -->
                    <form action="process-form.php" method="POST" id="portfolioContactForm" novalidate>
                        
                        <!-- Full Name -->
                        <div class="mb-3">
                            <label for="fullname" class="form-label fw-semibold">
                                Full Name <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-secondary border-end-0">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" id="fullname" name="fullname" placeholder="e.g. John Doe" required>
                                <div class="invalid-feedback">
                                    Please enter your full name.
                                </div>
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">
                                Email Address <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-secondary border-end-0">
                                    <i class="fa-solid fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control border-start-0" id="email" name="email" placeholder="name@example.com" required>
                                <div class="invalid-feedback">
                                    Please provide a valid email address.
                                </div>
                            </div>
                        </div>

                        <!-- Subject -->
                        <div class="mb-3">
                            <label for="subject" class="form-label fw-semibold">
                                Subject
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-secondary border-end-0">
                                    <i class="fa-solid fa-tag"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" id="subject" name="subject" placeholder="Project inquiry, Internship, etc.">
                            </div>
                        </div>

                        <!-- Message Field -->
                        <div class="mb-4">
                            <label for="message" class="form-label fw-semibold">
                                Message <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>
                            <div class="invalid-feedback">
                                Please type your message before submitting.
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary py-2 rounded-pill fw-semibold d-inline-flex align-items-center justify-content-center gap-2">
                                <i class="fa-solid fa-paper-plane"></i>
                                <span>Send Message</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</section>

<?php
include 'includes/footer.php';
?>
