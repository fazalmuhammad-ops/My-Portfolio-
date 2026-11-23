<?php
// Set custom page title
$pageTitle = "3D Contact Hub | A.A. Fazal Muhammad";
include 'includes/header.php';

// Check for status query parameters
$status = isset($_GET['status']) ? trim($_GET['status']) : '';
$errorMessage = isset($_GET['msg']) ? trim($_GET['msg']) : '';
?>

<!-- ======================================================================= -->
<!-- 3D CONTACT HUB & INTERACTIVE COMMUNICATION TERMINAL STAGE -->
<!-- ======================================================================= -->
<div class="contact-3d-stage">

    <!-- Ambient Glowing 3D Orbs -->
    <div class="contact-orb orb-cyan"></div>
    <div class="contact-orb orb-indigo"></div>
    <div class="contact-orb orb-emerald"></div>

    <!-- 3D Perspective Matrix Grid Floor -->
    <div class="contact-grid-floor"></div>

    <!-- 3D Hero Banner Container -->
    <section class="contact-3d-banner text-center">
        <div class="container position-relative" style="z-index: 10;">
            <div class="contact-badge-orbital">
                <span class="contact-pulse-dot"></span>
                <span>3D Communication Hub &bull; Direct Connect</span>
            </div>

            <h1 class="contact-3d-title">Let's Build Something Extraordinary</h1>
            <p class="contact-3d-lead">
                Have questions regarding my university coursework, projects, or prospective software engineering opportunities? Transmit a message directly through the 3D terminal below.
            </p>

            <!-- Quick Status Metrics Row -->
            <div class="contact-metrics-row">
                <div class="contact-metric-pill">
                    <i class="fa-solid fa-bolt text-warning"></i>
                    <span>Fast Response (within 24 hrs)</span>
                </div>
                <div class="contact-metric-pill">
                    <i class="fa-solid fa-envelope-circle-check text-success"></i>
                    <span>Direct Gmail Dispatch</span>
                </div>
                <div class="contact-metric-pill">
                    <i class="fa-solid fa-location-dot text-info"></i>
                    <span>Trincomalee &bull; USJ &bull; Remote</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main 3D Contact Content Container -->
    <div class="container position-relative" style="z-index: 10;">

        <!-- Display Alerts Based on URL Status Parameters -->
        <div class="row justify-content-center mb-4">
            <div class="col-lg-11 col-xl-10">
                <?php if ($status === 'success'): ?>
                    <div class="alert alert-success alert-dismissible fade show status-alert-3d d-flex align-items-center justify-content-between flex-wrap gap-3 p-3 rounded-3" role="alert">
                        <div class="d-flex align-items-center gap-3">
                            <i class="fa-solid fa-circle-check fs-3 text-success"></i>
                            <div>
                                <strong class="d-block text-white">Message Transmitted Successfully!</strong>
                                <span class="text-secondary small">Thank you<?php echo !empty($_GET['name']) ? ', <strong>' . htmlspecialchars($_GET['name']) . '</strong>' : ''; ?>! Your message has been safely recorded and dispatched to <strong>fazalaamuhammad@gmail.com</strong>.</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <a href="mailto:fazalaamuhammad@gmail.com" class="btn btn-sm btn-outline-success px-3 rounded-pill fw-semibold shadow-sm">
                                <i class="fa-solid fa-envelope me-1"></i> Open Gmail
                            </a>
                            <a href="view-messages.php" class="btn btn-sm btn-success text-white px-3 rounded-pill fw-semibold shadow-sm">
                                <i class="fa-solid fa-inbox me-1"></i> View Inbox
                            </a>
                            <button type="button" class="btn-close btn-close-white position-static" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php elseif ($status === 'error'): ?>
                    <div class="alert alert-danger alert-dismissible fade show status-alert-3d d-flex align-items-center gap-3 p-3 rounded-3" role="alert">
                        <i class="fa-solid fa-triangle-exclamation fs-3 text-danger"></i>
                        <div>
                            <strong class="d-block text-white">Submission Failed!</strong>
                            <span class="text-secondary small">
                                <?php 
                                    if (!empty($errorMessage)) {
                                        echo htmlspecialchars($errorMessage);
                                    } else {
                                        echo "Please ensure all required fields are filled out correctly with a valid email address.";
                                    }
                                ?>
                            </span>
                        </div>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- 3D Interactive Dual Cards Row -->
        <div class="row g-4 g-xl-5 justify-content-center">

            <!-- Left Column: 3D Contact Information Station -->
            <div class="col-lg-5 col-xl-4">
                <div class="contact-3d-wrap">
                    <div class="contact-3d-inner">
                        <div class="contact-3d-glare"></div>

                        <div class="contact-info-3d">
                            <div>
                                <span class="contact-badge-pop">
                                    <i class="fa-solid fa-satellite-dish me-1"></i> Direct Connect
                                </span>
                                <h3 class="contact-info-title">Contact Channels</h3>
                                <p class="contact-info-desc">
                                    Reach out via the official interactive terminal or connect through academic and social networks.
                                </p>

                                <!-- 3D Interactive Nodes -->
                                <div class="info-nodes-container">
                                    
                                    <!-- Node 1: Academic Hub -->
                                    <div class="info-node-3d">
                                        <div class="info-node-icon">
                                            <i class="fa-solid fa-building-columns"></i>
                                        </div>
                                        <div>
                                            <span class="info-node-label">Universities & Campuses</span>
                                            <span class="info-node-val">
                                                Eastern University (Trincomalee) &bull; USJ (Dept. of ICT)
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Node 2: Email -->
                                    <a href="mailto:fazalaamuhammad@gmail.com" class="info-node-3d">
                                        <div class="info-node-icon">
                                            <i class="fa-solid fa-envelope"></i>
                                        </div>
                                        <div>
                                            <span class="info-node-label">Academic & Personal Email</span>
                                            <span class="info-node-val text-info">
                                                fazalaamuhammad@gmail.com
                                            </span>
                                        </div>
                                    </a>

                                    <!-- Node 3: Phone / WhatsApp -->
                                    <a href="https://wa.me/94751492616" target="_blank" rel="noopener noreferrer" class="info-node-3d">
                                        <div class="info-node-icon">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </div>
                                        <div>
                                            <span class="info-node-label">Phone & WhatsApp</span>
                                            <span class="info-node-val text-success">
                                                +94 75 149 2616
                                            </span>
                                        </div>
                                    </a>

                                    <!-- Node 4: Locations -->
                                    <div class="info-node-3d">
                                        <div class="info-node-icon">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <div>
                                            <span class="info-node-label">Campus Locations</span>
                                            <span class="info-node-val">
                                                Trincomalee / Nugegoda, Sri Lanka
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Social Buttons & Inbox View -->
                            <div>
                                <div class="pt-3 border-top border-white border-opacity-10 mb-3">
                                    <small class="text-secondary d-block mb-2 text-uppercase tracking-wider" style="font-size: 0.72rem;">Social Presence</small>
                                    <div class="social-buttons-3d">
                                        <a href="https://github.com/fazalmuhammad-ops" target="_blank" rel="noopener noreferrer" class="social-btn-3d" title="GitHub">
                                            <i class="fa-brands fa-github"></i>
                                        </a>
                                        <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="social-btn-3d" title="LinkedIn">
                                            <i class="fa-brands fa-linkedin-in"></i>
                                        </a>
                                        <a href="mailto:fazalaamuhammad@gmail.com" class="social-btn-3d" title="Email">
                                            <i class="fa-solid fa-envelope"></i>
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <a href="view-messages.php" class="btn-inbox-3d">
                                        <i class="fa-solid fa-inbox text-primary"></i>
                                        <span>Check Received Messages</span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: 3D Holographic Form Terminal -->
            <div class="col-lg-7 col-xl-7">
                <div class="contact-3d-wrap">
                    <div class="contact-3d-inner">
                        <div class="contact-3d-glare"></div>

                        <div class="contact-form-3d">
                            <h3 class="form-title-3d">Send a Message</h3>
                            <p class="form-subtitle-3d">
                                Fill out the details below. Submitted messages are safely sanitized, recorded into MySQL, and dispatched directly to <strong>fazalaamuhammad@gmail.com</strong>.
                            </p>

                            <!-- Form target: process-form.php -->
                            <form action="process-form.php" method="POST" id="portfolioContactForm" novalidate>
                                
                                <!-- Full Name -->
                                <div class="form-group-3d">
                                    <label for="fullname" class="form-label-3d">
                                        Full Name <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group-3d">
                                        <span class="input-icon-3d">
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        <input type="text" class="input-field-3d" id="fullname" name="fullname" placeholder="e.g. A.A. Fazal Muhammad" required>
                                    </div>
                                    <div class="invalid-feedback text-danger small mt-1">
                                        Please enter your full name.
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="form-group-3d">
                                    <label for="email" class="form-label-3d">
                                        Email Address <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group-3d">
                                        <span class="input-icon-3d">
                                            <i class="fa-solid fa-envelope"></i>
                                        </span>
                                        <input type="email" class="input-field-3d" id="email" name="email" placeholder="name@example.com" required>
                                    </div>
                                    <div class="invalid-feedback text-danger small mt-1">
                                        Please provide a valid email address.
                                    </div>
                                </div>

                                <!-- Subject -->
                                <div class="form-group-3d">
                                    <label for="subject" class="form-label-3d">
                                        Subject
                                    </label>
                                    <div class="input-group-3d">
                                        <span class="input-icon-3d">
                                            <i class="fa-solid fa-tag"></i>
                                        </span>
                                        <input type="text" class="input-field-3d" id="subject" name="subject" placeholder="Project inquiry, Internship, Collaboration, etc.">
                                    </div>
                                </div>

                                <!-- Message Field -->
                                <div class="form-group-3d">
                                    <label for="message" class="form-label-3d">
                                        Message <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group-3d">
                                        <span class="input-icon-3d align-items-start pt-3">
                                            <i class="fa-solid fa-message"></i>
                                        </span>
                                        <textarea class="input-field-3d" id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>
                                    </div>
                                    <div class="invalid-feedback text-danger small mt-1">
                                        Please type your message before transmitting.
                                    </div>
                                </div>

                                <!-- 3D Submit Action Button -->
                                <div class="pt-2">
                                    <button type="submit" class="btn-submit-3d">
                                        <i class="fa-solid fa-paper-plane"></i>
                                        <span>Send Message</span>
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /row -->

    </div>
</div>

<?php
include 'includes/footer.php';
?>
