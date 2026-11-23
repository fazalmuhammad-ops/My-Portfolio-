<?php
// Set custom page title
$pageTitle = "3D Projects Gallery | A.A. Fazal Muhammad";
include 'includes/header.php';
?>

<!-- ======================================================================= -->
<!-- 3D PROJECTS GALLERY & INTERACTIVE HOLOGRAPHIC SHOWCASE STAGE -->
<!-- ======================================================================= -->
<div class="projects-3d-stage">

    <!-- Ambient Glowing 3D Orbs -->
    <div class="projects-orb orb-amber"></div>
    <div class="projects-orb orb-emerald"></div>
    <div class="projects-orb orb-indigo"></div>

    <!-- 3D Perspective Matrix Grid Floor -->
    <div class="projects-grid-floor"></div>

    <!-- 3D Hero Banner Container -->
    <section class="projects-3d-banner text-center">
        <div class="container position-relative" style="z-index: 10;">
            <div class="projects-badge-orbital">
                <span class="orbital-pulse-dot"></span>
                <span>3D Interactive Portfolio Showcase</span>
            </div>

            <h1 class="projects-3d-title">Projects Gallery & 3D Showcase</h1>
            <p class="projects-3d-lead">
                Traverse interactive 3D holographic cards and cinematic viewports showcasing flagship mobile systems, modern web platforms, and academic software engineering.
            </p>

            <!-- Quick Metrics Row -->
            <div class="projects-metrics-row">
                <div class="projects-metric-pill">
                    <i class="fa-solid fa-layer-group"></i>
                    <span>3 Flagship Architectures</span>
                </div>
                <div class="projects-metric-pill">
                    <i class="fa-solid fa-trophy text-warning"></i>
                    <span>1 Inter-Campus Hackathon Award</span>
                </div>
                <div class="projects-metric-pill">
                    <i class="fa-solid fa-cubes-stacked"></i>
                    <span>Full-Stack, Dart, & PHP</span>
                </div>
            </div>

            <!-- Controls: 3D Viewport Mode Switcher & Category Filters -->
            <div class="projects-control-bar">
                <!-- 3D Mode Switcher -->
                <div>
                    <div class="mode-switcher-container">
                        <button type="button" class="mode-btn active" id="btnModeGrid">
                            <i class="fa-solid fa-table-cells-large"></i>
                            <span>3D Holographic Grid</span>
                        </button>
                        <button type="button" class="mode-btn" id="btnModeDeck">
                            <i class="fa-solid fa-circle-nodes"></i>
                            <span>3D Cinematic Deck</span>
                        </button>
                    </div>
                </div>

                <!-- Category Filters (main.js compatible) -->
                <div class="filter-btn-group-3d" role="group" aria-label="Project Categories">
                    <button type="button" class="filter-btn-3d filter-btn active" data-filter="all" id="filterAll">
                        <i class="fa-solid fa-list-check"></i>
                        <span>All Projects</span>
                    </button>
                    <button type="button" class="filter-btn-3d filter-btn" data-filter="mobile-app" id="filterMobileApp">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                        <span>Mobile Apps</span>
                    </button>
                    <button type="button" class="filter-btn-3d filter-btn" data-filter="web-dev" id="filterWebDev">
                        <i class="fa-solid fa-code"></i>
                        <span>Web Dev</span>
                    </button>
                </div>

                <div class="mt-3 text-secondary small" id="filterResultCount">Showing all 3 projects</div>
            </div>
        </div>
    </section>

    <!-- Main Content Stage -->
    <div class="container position-relative" style="z-index: 10;">

        <!-- ========================================== -->
        <!-- VIEW 1: 3D HOLOGRAPHIC GRID CONTAINER -->
        <!-- ========================================== -->
        <div id="gridViewContainer" class="grid-view-container">
            <div class="row g-4" id="projectsContainer">

                <!-- PROJECT 1: Core Rider (BitHack Runner-Up) -->
                <div class="col-lg-4 col-md-6 project-item" data-category="mobile-app" id="core-rider">
                    <div class="card-3d-wrap" data-project-theme="amber">
                        <div class="card-3d-inner">
                            <div class="card-3d-glare"></div>

                            <!-- 3D Visual Header -->
                            <div class="project-3d-visual" style="background: linear-gradient(135deg, #1e1b4b 0%, #312e81 40%, #78350f 100%);">
                                <!-- Floating Award Trophy Badge -->
                                <span class="project-3d-award-badge">
                                    <i class="fa-solid fa-trophy"></i>
                                    <span>Runner-Up</span>
                                </span>

                                <i class="fa-solid fa-motorcycle text-warning project-3d-icon-float"></i>

                                <span class="project-3d-category-badge bg-warning text-dark">
                                    <i class="fa-solid fa-mobile-screen-button me-1"></i> Mobile App
                                </span>
                            </div>

                            <!-- 3D Card Body -->
                            <div class="project-3d-body">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <h5 class="project-3d-title">Core Rider</h5>
                                    <span class="badge bg-warning-subtle text-warning-emphasis border border-warning border-opacity-25 rounded-pill small">BitHack '26</span>
                                </div>
                                <small class="project-3d-subtitle text-warning">
                                    Runner-Up at BitHack 2026 (EUSL TRINCOMALEE CAMPUS)
                                </small>
                                <p class="project-3d-desc">
                                    An innovative on-demand campus and urban micro-mobility mobile application engineered to tackle commuter transit challenges with real-time GPS telemetry, peer ride-pooling, automated fare estimation, and emergency safety alerts.
                                </p>
                                <div class="project-3d-tags">
                                    <span class="tech-pill-3d">Flutter</span>
                                    <span class="tech-pill-3d">Firebase</span>
                                    <span class="tech-pill-3d">Node.js</span>
                                    <span class="tech-pill-3d">Google Maps API</span>
                                    <span class="tech-pill-3d">Dart</span>
                                </div>
                                <div class="project-3d-footer">
                                    <button type="button" class="btn-3d-action btn-3d-primary" data-bs-toggle="modal" data-bs-target="#modalProjectCoreRider">
                                        <i class="fa-solid fa-circle-info"></i>
                                        <span>Details</span>
                                    </button>
                                    <span class="text-warning-emphasis fw-semibold small d-inline-flex align-items-center gap-1">
                                        <i class="fa-solid fa-award text-warning"></i>
                                        <span>Award Winner</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PROJECT 2: Lanka Travellers (Modern Web Platform) -->
                <div class="col-lg-4 col-md-6 project-item" data-category="web-dev" id="lanka-travellers">
                    <div class="card-3d-wrap" data-project-theme="emerald">
                        <div class="card-3d-inner">
                            <div class="card-3d-glare"></div>

                            <!-- 3D Visual Header -->
                            <div class="project-3d-visual" style="background: linear-gradient(135deg, #064e3b 0%, #065f46 50%, #0f766e 100%);">
                                <i class="fa-solid fa-plane-departure text-info project-3d-icon-float"></i>
                                <span class="project-3d-category-badge bg-success text-white">
                                    <i class="fa-solid fa-earth-asia me-1"></i> Web Dev
                                </span>
                            </div>

                            <!-- 3D Card Body -->
                            <div class="project-3d-body">
                                <h5 class="project-3d-title">Lanka Travellers</h5>
                                <small class="project-3d-subtitle text-success">
                                    Modern Tourism & Travel Platform
                                </small>
                                <p class="project-3d-desc">
                                    A responsive, accessible, and high-performance multi-page travel agency web platform built with semantic HTML5, modern CSS3, and vanilla JavaScript. Features dynamic URL-based package pre-selection, touch-optimized mobile navigation, interactive FAQ accordions, and automated dark mode adaptation.
                                </p>
                                <div class="project-3d-tags">
                                    <span class="tech-pill-3d">HTML5</span>
                                    <span class="tech-pill-3d">CSS3</span>
                                    <span class="tech-pill-3d">Vanilla JS</span>
                                    <span class="tech-pill-3d">Dark Mode</span>
                                    <span class="tech-pill-3d">Responsive UI</span>
                                </div>
                                <div class="project-3d-footer">
                                    <button type="button" class="btn-3d-action btn-3d-emerald" data-bs-toggle="modal" data-bs-target="#modalProjectLankaTravellers">
                                        <i class="fa-solid fa-circle-info"></i>
                                        <span>Details</span>
                                    </button>
                                    <a href="https://github.com/fazalmuhammad-ops/Traveling-Website" target="_blank" rel="noopener noreferrer" class="btn-3d-action btn-3d-outline">
                                        <i class="fa-brands fa-github"></i>
                                        <span>Source Code</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PROJECT 3: My Portfolio (Modular PHP System) -->
                <div class="col-lg-4 col-md-6 project-item" data-category="web-dev" id="my-portfolio">
                    <div class="card-3d-wrap" data-project-theme="blue">
                        <div class="card-3d-inner">
                            <div class="card-3d-glare"></div>

                            <!-- 3D Visual Header -->
                            <div class="project-3d-visual" style="background: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);">
                                <i class="fa-solid fa-laptop-code text-info project-3d-icon-float"></i>
                                <span class="project-3d-category-badge bg-primary text-white">
                                    <i class="fa-solid fa-code me-1"></i> Web Dev
                                </span>
                            </div>

                            <!-- 3D Card Body -->
                            <div class="project-3d-body">
                                <h5 class="project-3d-title">My Portfolio</h5>
                                <small class="project-3d-subtitle text-primary">
                                    Department of ICT &bull; University of Sri Jayewardenepura
                                </small>
                                <p class="project-3d-desc">
                                    A dynamic, responsive personal portfolio website built with modular PHP templates, Bootstrap 5 UI framework, custom CSS, client-side dynamic filtering, and a secure backend contact form system.
                                </p>
                                <div class="project-3d-tags">
                                    <span class="tech-pill-3d">HTML5</span>
                                    <span class="tech-pill-3d">Bootstrap 5</span>
                                    <span class="tech-pill-3d">JavaScript</span>
                                    <span class="tech-pill-3d">PHP</span>
                                    <span class="tech-pill-3d">CSS3</span>
                                </div>
                                <div class="project-3d-footer">
                                    <button type="button" class="btn-3d-action btn-3d-primary" data-bs-toggle="modal" data-bs-target="#modalProjectPortfolio">
                                        <i class="fa-solid fa-circle-info"></i>
                                        <span>Details</span>
                                    </button>
                                    <a href="index.php" class="btn-3d-action btn-3d-outline">
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        <span>View Live</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /row -->
        </div>

        <!-- ========================================== -->
        <!-- VIEW 2: 3D CINEMATIC DECK CAROUSEL VIEW -->
        <!-- ========================================== -->
        <div id="deckViewContainer" class="deck-view-container">
            <div class="deck-stage-3d" id="deckStage">
                <!-- Dynamically populated and manipulated by js/projects-3d.js -->
            </div>

            <!-- Deck Controls -->
            <div class="deck-controls">
                <button type="button" class="deck-nav-btn" id="deckBtnPrev" title="Previous 3D Card (Left Arrow)">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <div class="deck-indicators" id="deckIndicators"></div>
                <button type="button" class="deck-nav-btn" id="deckBtnNext" title="Next 3D Card (Right Arrow)">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <!-- Empty state fallback if filter returns nothing -->
        <div id="noProjectsAlert" class="text-center py-5 d-none">
            <i class="fa-solid fa-folder-open text-muted fa-3x mb-3"></i>
            <h5 class="text-secondary">No projects found in this category</h5>
            <p class="text-muted small">Try selecting another filter above.</p>
        </div>

    </div>
</div>

<!-- Modals for Project Details -->
<?php include 'includes/project-modals.php'; ?>
<?php
include 'includes/footer.php';
?>
