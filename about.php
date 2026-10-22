<?php
// Set custom page title
$pageTitle = "About Me | A.A. Fazal Muhammad - DIT Student";
include 'includes/header.php';
?>

<!-- Page Title Banner -->
<section class="bg-dark text-white py-5 border-bottom border-secondary border-opacity-25">
    <div class="container py-2 text-center">
        <span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25 rounded-pill px-3 py-1 mb-2 fw-semibold">
            Academic Profile
        </span>
        <h1 class="fw-bold display-5 mb-2">About Me</h1>
        <p class="text-secondary lead fs-6 mx-auto col-md-8 mb-0">
            Learn more about my academic background, technical skills, and journey in Information Technology.
        </p>
    </div>
</section>

<!-- About Details Section -->
<section class="py-5">
    <div class="container py-3">
        <div class="row g-5">
            <!-- Left Column: Biography & University Details -->
            <div class="col-lg-6">
                <div class="pe-lg-3">
                    <span class="section-badge">Who I Am</span>
                    <h2 class="fw-bold mb-3">A.A. Fazal Muhammad</h2>
                    
                    <!-- Exact Bio Requirement -->
                    <div class="p-3 bg-primary-subtle border-start border-4 border-primary rounded mb-4">
                        <p class="mb-0 fw-semibold text-primary-emphasis">
                            <i class="fa-solid fa-graduation-cap me-2"></i>
                            DIT Student at Department of ICT, Faculty of Humanities and Social Sciences, University of Sri Jayewardenepura.
                        </p>
                    </div>

                    <p class="text-secondary leading-relaxed mb-3">
                        I am an enthusiastic Information Technology student dedicated to learning foundational computer science principles and applying them to practical, real-world problems. My academic curriculum at the University of Sri Jayewardenepura has provided me with hands-on exposure to full-stack web technologies, networking topologies, and database architecture.
                    </p>

                    <p class="text-secondary leading-relaxed mb-4">
                        Whether designing intuitive web pages, architecting VLANs and subnets, or drafting normalized database schemas, I prioritize clean documentation, maintainable code, and efficiency.
                    </p>

                    <!-- Academic Info Card -->
                    <div class="bio-card p-4 mb-4">
                        <h5 class="fw-bold mb-3 text-dark d-flex align-items-center gap-2">
                            <i class="fa-solid fa-university text-primary"></i> Academic Details
                        </h5>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-school"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">University</small>
                                <span class="fw-semibold">University of Sri Jayewardenepura</span>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-landmark"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Faculty & Department</small>
                                <span class="fw-semibold">Faculty of Humanities & Social Sciences &bull; Dept. of ICT</span>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-certificate"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Programme</small>
                                <span class="fw-semibold">Diploma in Information Technology (DIT)</span>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Campus Location</small>
                                <span class="fw-semibold">Gangodawila, Nugegoda, Sri Lanka</span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Link -->
                    <div class="d-flex flex-wrap gap-3">
                        <a href="projects.php" class="btn btn-primary rounded-pill px-4">
                            <i class="fa-solid fa-laptop-code me-2"></i>View My Projects
                        </a>
                        <a href="contact.php" class="btn btn-outline-secondary rounded-pill px-4">
                            <i class="fa-solid fa-envelope me-2"></i>Contact Me
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column: Technical Skills with Bootstrap Progress Bars -->
            <div class="col-lg-6">
                <div class="bio-card p-4 p-md-5">
                    <span class="section-badge">Skill Set</span>
                    <h3 class="fw-bold mb-2">Technical Proficiency</h3>
                    <p class="text-secondary small mb-4">
                        Estimated proficiency based on coursework, lab assessments, and hands-on projects completed during my DIT studies.
                    </p>

                    <!-- Skill 1: HTML/CSS -->
                    <div class="skill-wrapper">
                        <div class="skill-header">
                            <span class="d-flex align-items-center gap-2">
                                <i class="fa-brands fa-html5 text-danger"></i>
                                <span>HTML5 & CSS3 / Bootstrap 5</span>
                            </span>
                            <span class="text-primary fw-bold">90%</span>
                        </div>
                        <div class="progress" role="progressbar" aria-label="HTML/CSS Proficiency" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-skill-html" style="width: 90%;"></div>
                        </div>
                    </div>

                    <!-- Skill 2: JavaScript -->
                    <div class="skill-wrapper">
                        <div class="skill-header">
                            <span class="d-flex align-items-center gap-2">
                                <i class="fa-brands fa-js text-warning"></i>
                                <span>JavaScript (DOM & ES6+)</span>
                            </span>
                            <span class="text-primary fw-bold">80%</span>
                        </div>
                        <div class="progress" role="progressbar" aria-label="JavaScript Proficiency" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-skill-js" style="width: 80%;"></div>
                        </div>
                    </div>

                    <!-- Skill 3: PHP -->
                    <div class="skill-wrapper">
                        <div class="skill-header">
                            <span class="d-flex align-items-center gap-2">
                                <i class="fa-brands fa-php text-primary"></i>
                                <span>PHP (Server-Side Logic & Form Processing)</span>
                            </span>
                            <span class="text-primary fw-bold">75%</span>
                        </div>
                        <div class="progress" role="progressbar" aria-label="PHP Proficiency" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-skill-php" style="width: 75%;"></div>
                        </div>
                    </div>

                    <!-- Skill 4: Networking -->
                    <div class="skill-wrapper">
                        <div class="skill-header">
                            <span class="d-flex align-items-center gap-2">
                                <i class="fa-solid fa-network-wired text-info"></i>
                                <span>Computer Networking (TCP/IP, Subnetting, Routing)</span>
                            </span>
                            <span class="text-primary fw-bold">85%</span>
                        </div>
                        <div class="progress" role="progressbar" aria-label="Networking Proficiency" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-skill-net" style="width: 85%;"></div>
                        </div>
                    </div>

                    <!-- Skill 5: Database Management -->
                    <div class="skill-wrapper mb-4">
                        <div class="skill-header">
                            <span class="d-flex align-items-center gap-2">
                                <i class="fa-solid fa-database text-success"></i>
                                <span>Database Management (MySQL, SQL Queries, 3NF)</span>
                            </span>
                            <span class="text-primary fw-bold">80%</span>
                        </div>
                        <div class="progress" role="progressbar" aria-label="Database Management Proficiency" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-skill-db" style="width: 80%;"></div>
                        </div>
                    </div>

                    <!-- Familiar Tools & Software Badges -->
                    <div class="pt-3 border-top">
                        <h6 class="fw-bold text-dark mb-3">Tools & Environments:</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                                <i class="fa-solid fa-laptop-code text-primary me-1"></i> VS Code
                            </span>
                            <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                                <i class="fa-solid fa-server text-success me-1"></i> Cisco Packet Tracer
                            </span>
                            <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                                <i class="fa-brands fa-git-alt text-danger me-1"></i> Git & GitHub
                            </span>
                            <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                                <i class="fa-solid fa-database text-warning me-1"></i> phpMyAdmin / MySQL
                            </span>
                            <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                                <i class="fa-brands fa-bootstrap text-purple me-1"></i> Bootstrap 5
                            </span>
                            <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                                <i class="fa-solid fa-network-wired text-info me-1"></i> Wireshark
                            </span>
                            <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                                <i class="fa-brands fa-flutter text-info me-1"></i> Flutter
                            </span>
                            <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                                <i class="fa-solid fa-fire text-danger me-1"></i> Firebase
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Honors & Awards Section -->
<section class="py-5 bg-white border-top">
    <div class="container py-2">
        <div class="text-center mb-5">
            <span class="section-badge"><i class="fa-solid fa-trophy me-1 text-warning"></i> Recognition</span>
            <h2 class="section-title">Honors & Awards</h2>
            <p class="text-secondary col-md-7 mx-auto">
                Competitive hackathons and academic recognitions demonstrating problem-solving abilities, rapid engineering, and collaborative innovation.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="award-card p-4 p-md-5 border-start border-4 border-warning shadow-sm">
                    <div class="row align-items-center g-4">
                        <div class="col-md-3 text-center">
                            <div class="mx-auto mb-3" style="width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, #fef08a 0%, #facc15 100%); display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 20px rgba(234, 179, 8, 0.35);">
                                <i class="fa-solid fa-trophy fa-2x text-dark"></i>
                            </div>
                            <span class="badge bg-warning text-dark fw-bold px-3 py-1 rounded-pill fs-6">
                                Runner-Up
                            </span>
                            <small class="text-muted d-block mt-1 fw-semibold">BitHack 2026</small>
                        </div>
                        <div class="col-md-9">
                            <div class="d-flex align-items-center gap-2 flex-wrap mb-2">
                                <span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25 rounded-pill small">Inter-Campus Hackathon</span>
                                <span class="badge bg-secondary-subtle text-secondary rounded-pill small">EUSL Trincomalee Campus</span>
                            </div>
                            <h3 class="fw-bold text-dark mb-2">BitHack 2026 &mdash; Runner-Up Distinction</h3>
                            <p class="text-primary fw-semibold mb-2">
                                <i class="fa-solid fa-award me-1"></i> Awarded for developing "Core Rider" (Smart Mobility Application)
                            </p>
                            <p class="text-secondary small leading-relaxed mb-4">
                                Competed at <strong>BitHack 2026</strong>, organized by <strong>Eastern University, Sri Lanka (EUSL) Trincomalee Campus</strong>. Conceived and prototyped <strong>"Core Rider"</strong>, an innovative mobile application tailored for on-demand campus micro-mobility, peer ride-pooling, real-time GPS telemetry, and passenger safety.
                            </p>
                            <div class="d-flex flex-wrap gap-2 align-items-center">
                                <a href="projects.php#core-rider" class="btn btn-sm btn-primary rounded-pill px-4">
                                    <i class="fa-solid fa-mobile-screen-button me-1"></i> View "Core Rider" Project
                                </a>
                                <a href="projects.php" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                    <i class="fa-solid fa-list-check me-1"></i> Browse Projects
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
