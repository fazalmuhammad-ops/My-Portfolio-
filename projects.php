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
            <div class="mt-2 text-muted small" id="filterResultCount">Showing all 3 projects</div>
        </div>

        <!-- Project Cards Grid -->
        <div class="row g-4" id="projectsContainer">

            <!-- Project 1: Core Rider (Runner-Up at BitHack 2026) -->
            <div class="col-lg-4 col-md-6 project-item" data-category="mobile-app" id="core-rider">
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

            <!-- Project 2: Lanka Travellers (Modern Tourism & Travel Platform) -->
            <div class="col-lg-4 col-md-6 project-item" data-category="web-dev" id="lanka-travellers">
                <div class="project-card">
                    <div class="project-img-wrapper" style="background: linear-gradient(135deg, #064e3b 0%, #065f46 50%, #0f766e 100%);">
                        <i class="fa-solid fa-plane-departure text-info project-icon-placeholder"></i>
                        <span class="project-badge bg-success">
                            <i class="fa-solid fa-earth-asia me-1"></i> Web Dev
                        </span>
                    </div>
                    <div class="project-card-body">
                        <h5 class="fw-bold mb-1">Lanka Travellers</h5>
                        <small class="text-success fw-semibold d-block mb-2">
                            Modern Tourism & Travel Platform
                        </small>
                        <p class="text-secondary small mb-3 flex-grow-1">
                            A responsive, accessible, and high-performance multi-page travel agency web platform built with semantic HTML5, modern CSS3, and vanilla JavaScript. Features dynamic URL-based package pre-selection, touch-optimized mobile navigation, interactive FAQ accordions, and automated dark mode adaptation.
                        </p>
                        <div class="d-flex flex-wrap gap-1 mb-3">
                            <span class="tech-tag">HTML5</span>
                            <span class="tech-tag">CSS3</span>
                            <span class="tech-tag">Vanilla JS</span>
                            <span class="tech-tag">Dark Mode</span>
                            <span class="tech-tag">Responsive UI</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                            <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalProjectLankaTravellers">
                                <i class="fa-solid fa-circle-info me-1"></i> Details
                            </button>
                            <a href="https://github.com/fazalmuhammad-ops/Traveling-Website" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                <i class="fa-brands fa-github me-1"></i> Source Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 3: My Portfolio (Web Dev) -->
            <div class="col-lg-4 col-md-6 project-item" data-category="web-dev" id="my-portfolio">
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
<?php include 'includes/project-modals.php'; ?>
<?php
include 'includes/footer.php';
?>
