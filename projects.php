<?php
// Set custom page title
$pageTitle = "Projects Gallery | A.A. Fazal Muhammad";
include 'includes/header.php';
?>

<!-- Page Banner -->
<section class="bg-dark text-white py-5 border-bottom border-secondary border-opacity-25">
    <div class="container py-2 text-center">
        <span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25 rounded-pill px-3 py-1 mb-2 fw-semibold">
            Portfolio Showcase
        </span>
        <h1 class="fw-bold display-5 mb-2">Projects Gallery</h1>
        <p class="text-secondary lead fs-6 mx-auto col-md-8 mb-0">
            Explore academic, lab, and practical projects across Web Development, Computer Networking, and Database Systems.
        </p>
    </div>
</section>

<!-- Filter & Gallery Section -->
<section class="py-5">
    <div class="container py-3">

        <!-- Filter Buttons Container -->
        <div class="text-center mb-5">
            <div class="filter-btn-group" role="group" aria-label="Project Categories">
                <button type="button" class="filter-btn active" data-filter="all" id="filterAll">
                    <i class="fa-solid fa-list-check me-1"></i> All Projects
                </button>
                <button type="button" class="filter-btn" data-filter="mobile-app" id="filterMobileApp">
                    <i class="fa-solid fa-mobile-screen-button me-1"></i> Mobile Apps
                </button>
                <button type="button" class="filter-btn" data-filter="web-dev" id="filterWebDev">
                    <i class="fa-solid fa-code me-1"></i> Web Dev
                </button>
            </div>
            <div class="mt-2 text-muted small" id="filterResultCount">Showing all 2 projects</div>
        </div>

        <!-- Project Cards Grid -->
        <div class="row g-4 justify-content-center" id="projectsContainer">

            <!-- Project 1: Core Rider (Runner-Up at BitHack 2026) -->
            <div class="col-lg-5 col-md-6 project-item" data-category="mobile-app" id="core-rider">
                <div class="project-card border-warning border-opacity-50">
                    <div class="project-img-wrapper" style="background: linear-gradient(135deg, #1e1b4b 0%, #312e81 40%, #78350f 100%);">
                        <!-- Runner-Up Trophy Badge -->
                        <span class="project-award-badge">
                            <i class="fa-solid fa-trophy"></i>
                            <span>Runner-Up</span>
                        </span>
                        <i class="fa-solid fa-motorcycle text-warning project-icon-placeholder"></i>
                        <span class="project-badge bg-warning text-dark fw-bold">
                            <i class="fa-solid fa-mobile-screen-button me-1"></i> Mobile App
                        </span>
                    </div>
                    <div class="project-card-body">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <h5 class="fw-bold mb-0">Core Rider</h5>
                            <span class="badge bg-warning-subtle text-warning-emphasis border border-warning border-opacity-25 rounded-pill small">BitHack '26</span>
                        </div>
                        <small class="text-primary fw-semibold d-block mb-2">
                            Runner-Up at BitHack 2026 (EUSL TRINCOMALEE CAMPUS)
                        </small>
                        <p class="text-secondary small mb-3 flex-grow-1">
                            An innovative on-demand campus and urban micro-mobility mobile application engineered to tackle commuter transit challenges with real-time GPS telemetry, peer ride-pooling, automated fare estimation, and emergency safety alerts.
                        </p>
                        <div class="d-flex flex-wrap gap-1 mb-3">
                            <span class="tech-tag">Flutter</span>
                            <span class="tech-tag">Firebase</span>
                            <span class="tech-tag">Node.js</span>
                            <span class="tech-tag">Google Maps API</span>
                            <span class="tech-tag">Dart</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                            <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalProjectCoreRider">
                                <i class="fa-solid fa-circle-info me-1"></i> Details
                            </button>
                            <span class="text-warning-emphasis fw-semibold small">
                                <i class="fa-solid fa-award me-1 text-warning"></i>Award Winner
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 2: My Portfolio (Web Dev) -->
            <div class="col-lg-5 col-md-6 project-item" data-category="web-dev" id="my-portfolio">
                <div class="project-card">
                    <div class="project-img-wrapper" style="background: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);">
                        <i class="fa-solid fa-laptop-code text-info project-icon-placeholder"></i>
                        <span class="project-badge bg-primary">
                            <i class="fa-solid fa-code me-1"></i> Web Dev
                        </span>
                    </div>
                    <div class="project-card-body">
                        <h5 class="fw-bold mb-1">My Portfolio</h5>
                        <small class="text-primary fw-semibold d-block mb-2">
                            Department of ICT &bull; University of Sri Jayewardenepura
                        </small>
                        <p class="text-secondary small mb-3 flex-grow-1">
                            A dynamic, responsive personal portfolio website built with modular PHP templates, Bootstrap 5 UI framework, custom CSS, client-side dynamic filtering, and a secure backend contact form system.
                        </p>
                        <div class="d-flex flex-wrap gap-1 mb-3">
                            <span class="tech-tag">HTML5</span>
                            <span class="tech-tag">Bootstrap 5</span>
                            <span class="tech-tag">JavaScript</span>
                            <span class="tech-tag">PHP</span>
                            <span class="tech-tag">CSS3</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                            <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalProjectMyPortfolio">
                                <i class="fa-solid fa-circle-info me-1"></i> Details
                            </button>
                            <a href="index.php" class="btn btn-sm btn-primary rounded-pill px-3">
                                <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> View Live
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /row -->

        <!-- Empty state fallback if filter returns nothing -->
        <div id="noProjectsAlert" class="text-center py-5 d-none">
            <i class="fa-solid fa-folder-open text-muted fa-3x mb-3"></i>
            <h5 class="text-secondary">No projects found in this category</h5>
            <p class="text-muted small">Try selecting another filter above.</p>
        </div>

    </div>
</section>

<!-- Modals for Project Details -->
<!-- Modal Core Rider -->
<div class="modal fade" id="modalProjectCoreRider" tabindex="-1" aria-labelledby="modalProjectCoreRiderLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-dark text-white border-bottom border-warning border-opacity-50">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-warning text-dark fw-bold px-2 py-1 rounded-pill">
                        <i class="fa-solid fa-trophy me-1"></i> Runner-Up
                    </span>
                    <h5 class="modal-title fw-bold mb-0" id="modalProjectCoreRiderLabel">Core Rider — Mobile App</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="p-3 bg-warning-subtle border border-warning border-opacity-50 rounded-3 mb-4 d-flex align-items-center gap-3">
                    <i class="fa-solid fa-award text-warning display-6 flex-shrink-0"></i>
                    <div>
                        <h6 class="fw-bold mb-1 text-dark">BitHack 2026 Runner-Up Achievement</h6>
                        <small class="text-secondary d-block">
                            Awarded <strong>Runner-Up</strong> distinction at <strong>BitHack 2026</strong>, organized by <strong>Eastern University, Sri Lanka (EUSL) Trincomalee Campus</strong>, for architecting and prototyping this innovative micro-mobility solution.
                        </small>
                    </div>
                </div>

                <h6 class="fw-bold text-dark mb-2">Project Overview & Problem Statement:</h6>
                <p class="text-secondary small leading-relaxed mb-4">
                    Commuters and university students frequently face unreliable intra-campus transportation, steep single-passenger fares, and an absence of verified passenger safety. <strong>Core Rider</strong> was conceived and rapidly prototyped during the BitHack 2026 hackathon to solve these challenges through affordable, verified, on-demand ride-pooling and micro-transit sharing.
                </p>

                <h6 class="fw-bold text-dark mb-2">Core Features & Innovations:</h6>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 h-100 border">
                            <span class="fw-semibold text-primary d-block mb-1"><i class="fa-solid fa-map-location-dot me-2"></i>Live Telemetry & GPS</span>
                            <small class="text-secondary">Integrated Google Maps SDK for real-time driver tracking, optimal route mapping, and live estimated time of arrival (ETA).</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 h-100 border">
                            <span class="fw-semibold text-success d-block mb-1"><i class="fa-solid fa-users me-2"></i>Smart Ride-Pooling</span>
                            <small class="text-secondary">Intelligent passenger-driver pairing algorithm connecting commuters travelling along shared campus corridors to cut emissions and trip costs.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 h-100 border">
                            <span class="fw-semibold text-warning-emphasis d-block mb-1"><i class="fa-solid fa-calculator me-2"></i>Automated Fare Matrix</span>
                            <small class="text-secondary">Transparent distance and peak-hour fare calculation model preventing unfair surge costs, integrated with cashless payment logging.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 h-100 border">
                            <span class="fw-semibold text-danger d-block mb-1"><i class="fa-solid fa-shield-halved me-2"></i>Emergency SOS & Safety</span>
                            <small class="text-secondary">One-tap emergency broadcast mechanism dispatching live location telemetry to designated emergency contacts and campus security.</small>
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-dark mb-2">Technology Stack:</h6>
                <div class="d-flex flex-wrap gap-2">
                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill"><i class="fa-brands fa-flutter text-info me-1"></i> Flutter (Dart)</span>
                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill"><i class="fa-solid fa-fire text-danger me-1"></i> Firebase Auth & Cloud Firestore</span>
                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill"><i class="fa-brands fa-node-js text-success me-1"></i> Node.js API Service</span>
                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill"><i class="fa-solid fa-map text-primary me-1"></i> Google Maps Platform</span>
                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill"><i class="fa-solid fa-bolt text-warning me-1"></i> Cloud Functions</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal My Portfolio -->
<div class="modal fade" id="modalProjectMyPortfolio" tabindex="-1" aria-labelledby="modalProjectMyPortfolioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title fw-bold" id="modalProjectMyPortfolioLabel">My Portfolio</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <p><strong>Assignment:</strong> DIT Personal Portfolio Website for University of Sri Jayewardenepura.</p>
                <p class="text-secondary">Built to showcase academic skills across Web Development, Computer Networking, and Database Systems with reusable PHP components and client-side JavaScript filtering.</p>
                <h6 class="fw-bold mb-2">Key Highlights:</h6>
                <ul class="text-secondary small">
                    <li>Reusable PHP header and footer components</li>
                    <li>Bootstrap 5 responsive UI with mobile drawer menu</li>
                    <li>Dynamic JavaScript card filtering with no page reloads</li>
                    <li>PHP sanitized contact submission with MySQL database and local log file</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
