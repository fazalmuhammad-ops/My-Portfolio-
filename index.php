<?php
// Set custom page title
$pageTitle = "Home | A.A. Fazal Muhammad - DIT Portfolio";
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section py-5 py-lg-6">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <!-- Left Column: Introduction & Call-to-Action -->
            <div class="col-lg-7 text-center text-lg-start">
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-white bg-opacity-10 border border-white border-opacity-20 mb-3">
                    <span class="badge bg-primary rounded-pill px-2 py-1">USJ</span>
                    <span class="small text-light fw-medium">Department of ICT &bull; FHSS</span>
                </div>

                <h1 class="hero-title mb-3">
                    Hello, I'm <br>
                    <span class="hero-gradient-text">A.A. Fazal Muhammad</span>
                </h1>

                <p class="hero-subtitle mb-4">
                    Diploma in Information Technology Student
                </p>

                <p class="text-light text-opacity-75 lead fs-6 mb-4 col-xl-10">
                    Welcome to my academic and practical portfolio. I specialize in building responsive web applications, designing robust local area computer networks, and managing relational databases.
                </p>

                <!-- Action Buttons -->
                <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3 mb-4">
                    <a href="projects.php" class="btn btn-primary btn-lg px-4 py-2 rounded-pill d-inline-flex align-items-center gap-2">
                        <span>View My Projects</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="contact.php" class="btn btn-outline-light btn-lg px-4 py-2 rounded-pill d-inline-flex align-items-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i>
                        <span>Contact Me</span>
                    </a>
                </div>

                <!-- Quick Highlights -->
                <div class="row g-3 pt-3 border-top border-white border-opacity-10 text-start">
                    <div class="col-3">
                        <h4 class="fw-bold text-white mb-0">USJ</h4>
                        <small class="text-white text-opacity-60" style="font-size: 0.78rem;">Sri Jayewardenepura</small>
                    </div>
                    <div class="col-3">
                        <h4 class="fw-bold text-white mb-0">DIT</h4>
                        <small class="text-white text-opacity-60" style="font-size: 0.78rem;">Information Tech</small>
                    </div>
                    <div class="col-3">
                        <h4 class="fw-bold text-white mb-0 text-warning">BitHack</h4>
                        <small class="text-white text-opacity-60" style="font-size: 0.78rem;">Runner-Up '26</small>
                    </div>
                    <div class="col-3">
                        <h4 class="fw-bold text-white mb-0">2</h4>
                        <small class="text-white text-opacity-60" style="font-size: 0.78rem;">Projects</small>
                    </div>
                </div>
            </div>

            <!-- Right Column: Profile Image -->
            <div class="col-lg-5 text-center">
                <div class="profile-wrapper">
                    <div class="profile-ring"></div>
                    <div class="profile-image-inner">
                        <img src="images/profile.jpg" alt="A.A. Fazal Muhammad" onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=Fazal+Muhammad&background=0f172a&color=38bdf8&size=512';">
                    </div>
                    <!-- Status Badge -->
                    <div class="status-floating-badge">
                        <span class="d-inline-block rounded-circle bg-success me-1" style="width: 8px; height: 8px;"></span>
                        <span>Open to Opportunities</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Recent Achievement Spotlight -->
<div class="container position-relative" style="margin-top: -30px; margin-bottom: 25px; z-index: 10;">
    <div class="achievement-spotlight-card p-3 p-md-4 rounded-4 shadow-sm border d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
        <div class="d-flex align-items-center gap-3">
            <div class="achievement-trophy-icon">
                <i class="fa-solid fa-trophy"></i>
            </div>
            <div>
                <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                    <span class="badge bg-warning text-dark fw-bold px-2 py-1 rounded-pill">
                        <i class="fa-solid fa-medal me-1"></i> Runner-Up Award
                    </span>
                    <span class="fw-bold text-dark">BitHack 2026 &bull; EUSL Trincomalee Campus</span>
                </div>
                <p class="text-secondary small mb-0">
                    Awarded Runner-Up for engineering <strong>"Core Rider"</strong> &mdash; an innovative smart micro-mobility & campus ride-pooling mobile application.
                </p>
            </div>
        </div>
        <div class="text-md-end text-start flex-shrink-0 d-flex gap-2">
            <a href="projects.php#core-rider" class="btn btn-sm btn-primary rounded-pill px-3">
                <span>View "Core Rider"</span>
                <i class="fa-solid fa-arrow-right ms-1"></i>
            </a>
            <a href="about.php" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                <span>Awards</span>
            </a>
        </div>
    </div>
</div>

<!-- 3-Column Features Section -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <!-- Section Title -->
        <div class="text-center mb-5">
            <span class="section-badge">Core Competencies</span>
            <h2 class="section-title">Areas of Expertise</h2>
            <p class="text-muted col-md-7 mx-auto">
                My academic curriculum and personal projects are centered around foundational technologies that drive modern IT infrastructure and web solutions.
            </p>
        </div>

        <!-- 3 Feature Cards Grid -->
        <div class="row g-4">
            <!-- Feature 1: Web Development -->
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon-box icon-blue">
                        <i class="fa-solid fa-code"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Web Development</h4>
                    <p class="text-secondary mb-4">
                        Designing responsive, user-friendly frontend interfaces using modern HTML5, CSS3, JavaScript, and Bootstrap 5, combined with secure PHP backends.
                    </p>
                    <ul class="list-unstyled text-secondary small d-flex flex-column gap-2 mb-4">
                        <li><i class="fa-solid fa-circle-check text-primary me-2"></i>Semantic HTML5 & Modern CSS3</li>
                        <li><i class="fa-solid fa-circle-check text-primary me-2"></i>Interactive JavaScript (ES6+)</li>
                        <li><i class="fa-solid fa-circle-check text-primary me-2"></i>Bootstrap 5 Responsive Grid</li>
                        <li><i class="fa-solid fa-circle-check text-primary me-2"></i>PHP Server-Side Processing</li>
                    </ul>
                    <a href="projects.php?filter=web-dev" class="text-decoration-none fw-semibold text-primary small d-inline-flex align-items-center gap-1">
                        <span>Explore Web Projects</span>
                        <i class="fa-solid fa-arrow-right fa-xs"></i>
                    </a>
                </div>
            </div>

            <!-- Feature 2: Computer Networking -->
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon-box icon-emerald">
                        <i class="fa-solid fa-network-wired"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Computer Networking</h4>
                    <p class="text-secondary mb-4">
                        Designing, configuring, and troubleshooting Local Area Networks (LAN), subnets, routing protocols, and enterprise infrastructure simulations.
                    </p>
                    <ul class="list-unstyled text-secondary small d-flex flex-column gap-2 mb-4">
                        <li><i class="fa-solid fa-circle-check text-success me-2"></i>IPv4 & IPv6 Subnetting (VLSM)</li>
                        <li><i class="fa-solid fa-circle-check text-success me-2"></i>Cisco Packet Tracer Simulation</li>
                        <li><i class="fa-solid fa-circle-check text-success me-2"></i>Switching, VLANs & Trunking</li>
                        <li><i class="fa-solid fa-circle-check text-success me-2"></i>Basic Network Security & Firewalls</li>
                    </ul>
                    <a href="projects.php?filter=networking" class="text-decoration-none fw-semibold text-success small d-inline-flex align-items-center gap-1">
                        <span>Explore Networking Projects</span>
                        <i class="fa-solid fa-arrow-right fa-xs"></i>
                    </a>
                </div>
            </div>

            <!-- Feature 3: Database Management -->
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon-box icon-indigo">
                        <i class="fa-solid fa-database"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Database Management</h4>
                    <p class="text-secondary mb-4">
                        Creating structured relational databases, performing normalization up to 3NF, formulating complex SQL queries, and integrating with web applications.
                    </p>
                    <ul class="list-unstyled text-secondary small d-flex flex-column gap-2 mb-4">
                        <li><i class="fa-solid fa-circle-check text-primary me-2"></i>MySQL & MariaDB Management</li>
                        <li><i class="fa-solid fa-circle-check text-primary me-2"></i>ER Diagram Modeling & Schema Design</li>
                        <li><i class="fa-solid fa-circle-check text-primary me-2"></i>Data Normalization (1NF, 2NF, 3NF)</li>
                        <li><i class="fa-solid fa-circle-check text-primary me-2"></i>CRUD Operations & PHP PDO/MySQLi</li>
                    </ul>
                    <a href="projects.php" class="text-decoration-none fw-semibold text-primary small d-inline-flex align-items-center gap-1">
                        <span>Explore Database Solutions</span>
                        <i class="fa-solid fa-arrow-right fa-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Banner -->
<section class="py-5 bg-light border-top border-bottom border-light-subtle">
    <div class="container">
        <div class="bg-dark text-white rounded-4 p-4 p-md-5 position-relative overflow-hidden shadow">
            <div class="row align-items-center g-4 position-relative" style="z-index: 1;">
                <div class="col-lg-8 text-center text-lg-start">
                    <h3 class="fw-bold mb-2">Interested in collaborating or reviewing my coursework?</h3>
                    <p class="text-white text-opacity-75 mb-0">
                        Feel free to check out my detailed background or get in touch through the contact form.
                    </p>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-flex flex-wrap justify-content-center justify-content-lg-end gap-2">
                        <a href="about.php" class="btn btn-outline-light rounded-pill px-4">About Me</a>
                        <a href="contact.php" class="btn btn-primary rounded-pill px-4">Send a Message</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
