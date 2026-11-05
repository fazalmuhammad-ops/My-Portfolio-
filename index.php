<?php
// Set custom page title
$pageTitle = "Home | A.A. Fazal Muhammad - DIT Portfolio";
include 'includes/header.php';
?>

<!-- ======================================================================= -->
<!-- INTERACTIVE PORTFOLIO HERO (Sri Tech-Style Interactive Intro) -->
<!-- ======================================================================= -->
<section class="interactive-hero-section position-relative" id="interactiveHeroSection">
    <!-- Focused White-to-Rose Glow behind Character + Edge Glows -->
    <div class="hero-character-backlight"></div>
    <div class="hero-edge-glow-left"></div>
    <div class="hero-edge-glow-right"></div>

    <!-- 3 Horizontal Interaction Detection Zones (Left, Center, Right) -->
    <div class="hero-interaction-zones" id="interactionZones">
        <div class="hero-zone hero-zone-left" id="zoneLeft" title="Left interaction zone"></div>
        <div class="hero-zone hero-zone-center" id="zoneCenter" title="Center greeting zone"></div>
        <div class="hero-zone hero-zone-right" id="zoneRight" title="Right interaction zone"></div>
    </div>

    <div class="container position-relative py-3" style="z-index: 10;">
        <div class="row align-items-center g-4 g-xl-5">

            <!-- LEFT AREA: Personal Intro + Cursor Instruction -->
            <div class="col-lg-4 col-xl-4 hero-left-note text-center text-lg-start">
                <div class="hero-author-badge mb-3">
                    <span class="badge bg-primary rounded-pill px-2 py-1">USJ &bull; DIT</span>
                    <span>Dept. of ICT, FHSS</span>
                </div>

                <h1 class="fw-bold display-5 text-white mb-2" style="letter-spacing: -0.02em;">
                    I'm <br class="d-none d-lg-block">
                    <span class="hero-gradient-text">A.A. Fazal Muhammad</span>
                </h1>

                <p class="text-white text-opacity-80 fw-medium fs-6 mb-3">
                    Full-Stack Web Developer & Network Systems Designer
                </p>

                <!-- Subtle Supporting Instruction & Animated Cursor Indicator -->
                <div class="d-inline-flex align-items-center gap-2 hero-instruction-box">
                    <span class="animated-cursor-indicator">
                        <i class="fa-solid fa-arrow-pointer"></i>
                    </span>
                    <span class="hero-instruction-text">Move cursor to call me !</span>
                </div>

                <!-- Action CTA Buttons -->
                <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-2 mt-4">
                    <a href="projects.php" class="btn btn-primary rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2 shadow-sm">
                        <span>View Projects</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="contact.php" class="btn btn-outline-light rounded-pill px-3 py-2 d-inline-flex align-items-center gap-2">
                        <i class="fa-solid fa-paper-plane text-primary"></i>
                        <span>Contact Me</span>
                    </a>
                </div>
            </div>

            <!-- CENTER AREA: Dominant Interactive Character + Laptop Workstation -->
            <div class="col-lg-4 col-xl-4 hero-stage-wrapper text-center my-3 my-lg-0">
                <div class="character-workstation mx-auto" id="characterWorkstation">

                    <!-- Interactive Video Hero Card -->
                    <div class="video-hero-card" id="videoHeroCard" title="Move cursor left, right, or center to interact!">
                        <video id="heroVideo" 
                               src="images/hero.mp4?v=<?php echo file_exists('images/hero.mp4') ? filemtime('images/hero.mp4') : time(); ?>" 
                               poster="images/profile.jpg"
                               playsinline 
                               muted 
                               preload="auto" 
                               class="hero-character-video"></video>
                        
                        <!-- Subtle glass rim overlay & corner cyber accents -->
                        <div class="video-glass-rim"></div>
                        <div class="video-corner-accent top-left"></div>
                        <div class="video-corner-accent top-right"></div>

                        <!-- Live Status Pill on bottom of video -->
                        <div class="video-status-pill">
                            <span class="video-status-dot"></span>
                            <span id="videoStatusText">Coding & Modeling</span>
                        </div>
                    </div>

                    <!-- Workstation Desk Reflection -->
                    <div class="workstation-desk-shadow"></div>
                </div>
            </div>

            <!-- RIGHT AREA: Contextual Reaction Message Card -->
            <div class="col-lg-4 col-xl-4 hero-reaction-bubble text-center text-lg-start">
                <div class="reaction-card mx-auto ms-lg-0" id="reactionCard">
                    <div class="reaction-tag" id="reactionTag">
                        <span class="reaction-pulse-dot"></span>
                        <span>Live Coding Environment</span>
                    </div>
                    <h3 class="reaction-text" id="reactionText">
                        Full-Stack Engineering
                    </h3>
                    <p class="reaction-subtext" id="reactionDesc">
                        Hover cursor to the left, right, or center to trigger real-time character responses.
                    </p>

                    <a href="#expeditionsSection" class="portfolio-cue-pill text-decoration-none">
                        <span>Check out the portfolio</span>
                        <i class="fa-solid fa-arrow-down-long"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- BOTTOM: Exploration Cue Indicator -->
    <div class="hero-scroll-cue">
        <a href="#expeditionsSection" class="hero-scroll-link">
            <div class="scroll-mouse-icon">
                <div class="scroll-wheel-dot"></div>
            </div>
            <span>Scroll to explore</span>
        </a>
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

<!-- ======================================================================= -->
<!-- SECTION 1: THE ENGINEERING EXPEDITIONS ("SIGNATURE WORKS") -->
<!-- ======================================================================= -->
<section class="expeditions-showcase-section" id="expeditionsSection">
    <!-- Atmospheric Ambient Glows & Canvas Particles -->
    <canvas id="fireflyCanvas" class="firefly-canvas"></canvas>
    <div class="ambient-glow-left"></div>
    <div class="ambient-glow-right"></div>

    <div class="container position-relative" style="z-index: 10;">
        <!-- Header -->
        <div class="text-center mb-4">
            <span class="badge bg-warning bg-opacity-25 text-warning border border-warning border-opacity-40 rounded-pill px-3 py-1 mb-2 fw-semibold" id="expeditionsBadge">
                <i class="fa-solid fa-code me-1 text-warning"></i> Signature Works
            </span>
            <h2 class="fw-bold display-5 text-white mb-2" id="expeditionsTitle">
                The Engineering Expeditions
            </h2>
            <p class="text-white text-opacity-75 col-md-8 mx-auto fs-6 mb-0" id="expeditionsSubtitle">
                Traverse 3D panoramic portals showcasing my flagship mobile systems, modern web platforms, and university infrastructure simulations.
            </p>
        </div>

        <!-- 3D Trail Viewport Container -->
        <div class="trail-viewport">
            <!-- 3D Winding Trail Vector Path -->
            <svg class="trail-svg-path" viewBox="0 0 1000 500" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M 50 420 C 300 450, 200 280, 500 250 C 800 220, 700 80, 950 50" 
                      stroke="url(#trailGoldEmeraldGrad)" stroke-width="5" class="trail-glowing-line" />
                <defs>
                    <linearGradient id="trailGoldEmeraldGrad" x1="0%" y1="100%" x2="100%" y2="0%">
                        <stop offset="0%" stop-color="#34d399" stop-opacity="0.8" />
                        <stop offset="50%" stop-color="#facc15" stop-opacity="0.95" />
                        <stop offset="100%" stop-color="#065f46" stop-opacity="0.4" />
                    </linearGradient>
                </defs>
            </svg>

            <!-- Navigation Buttons -->
            <button class="trail-nav-btn prev-btn" id="trailPrevBtn" aria-label="Previous Expedition">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button class="trail-nav-btn next-btn" id="trailNextBtn" aria-label="Next Expedition">
                <i class="fa-solid fa-chevron-right"></i>
            </button>

            <!-- 3D Panoramic Destination Portal Cards Stage -->
            <div id="portalCardsStage" class="w-100 h-100 d-flex align-items-center justify-content-center">
                <!-- Dynamically populated by journeys-3d.js -->
            </div>

            <!-- Reflective Watery Mirror Floor (Sigiriya Water Gardens tribute) -->
            <div class="water-mirror-floor">
                <div class="water-reflection-glow"></div>
                <div class="water-shimmer-layer"></div>
            </div>
        </div>

        <!-- Dynamic Bottom Status Dock (Below Viewport) -->
        <div class="dynamic-bottom-dock">
            <div class="dock-card mx-auto col-lg-10 col-xl-9">
                <div class="row align-items-center g-3">
                    <div class="col-md-5">
                        <div class="dock-title-label" id="dockTitleLabel">Mobile App Engineering</div>
                        <h4 class="dock-package-name" id="dockPackageName">Core Rider (Smart Mobility)</h4>
                    </div>
                    <div class="col-sm-6 col-md-3 text-md-center">
                        <span class="dock-duration-badge" id="dockDuration">
                            <i class="fa-solid fa-award me-1 text-warning"></i> BitHack 2026 Award
                        </span>
                    </div>
                    <div class="col-sm-6 col-md-4 text-md-end d-flex align-items-center justify-content-md-end justify-content-between gap-3">
                        <div>
                            <div class="dock-price-val" id="dockPrice">BitHack '26 Runner-Up</div>
                            <div class="dock-price-sub" id="dockPriceSub">Flutter &bull; Firebase &bull; Node.js</div>
                        </div>
                        <button type="button" class="dock-action-btn" id="dockActionBtn">
                            <span>View Project Details</span>
                            <i class="fa-solid fa-arrow-right-long ms-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================================================================= -->
<!-- SECTION 2: WHY CHOOSE FAZAL ("CORE ENGINEERING PILLARS") - 3D ORBITAL SYSTEM -->
<!-- ======================================================================= -->
<section class="orbital-showcase-section" id="orbitalSection">
    <!-- Huge Faint Outlined Typography Watermark -->
    <div class="orbital-watermark-text" id="orbitalWatermark">INNOVATION</div>

    <div class="container position-relative" style="z-index: 5;">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <span class="badge bg-warning bg-opacity-25 text-warning border border-warning border-opacity-40 rounded-pill px-3 py-1 mb-2 fw-semibold" id="orbitalBadge">
                <i class="fa-solid fa-compass me-1 text-warning"></i> Why Choose Fazal
            </span>
            <h2 class="fw-bold display-5 text-white mb-2" id="orbitalTitle">
                Core Engineering Pillars
            </h2>
            <p class="text-white text-opacity-75 col-md-7 mx-auto fs-6 mb-0" id="orbitalSubtitle">
                A floating 3D orbital experience representing the technical disciplines, university rigor, and problem-solving passion driving my work.
            </p>
        </div>

        <!-- 3D Parallax Tilt Stage -->
        <div class="orbital-parallax-stage" id="orbitalParallaxStage">
            <!-- Central Illuminated 3D Developer Emblem & Heritage Compass -->
            <div class="heritage-compass-emblem">
                <div class="compass-inner-core">
                    <div class="compass-dial-needle"></div>
                    <i class="fa-solid fa-code position-relative" style="z-index: 2;"></i>
                </div>
            </div>

            <!-- Two Glowing Orbital Rings -->
            <div class="orbital-ring orbital-ring-1"></div>
            <div class="orbital-ring orbital-ring-2"></div>

            <!-- 4 Orbital Benefit Cards (Dynamically populated by journeys-3d.js) -->
        </div>

        <!-- Vertical Progress Indicator Dots on Right Side -->
        <div class="orbital-progress-nav" id="orbitalProgressNav">
            <!-- Dynamically populated by journeys-3d.js -->
        </div>
    </div>
</section>

<!-- ======================================================================= -->
<!-- 3D AREAS OF EXPERTISE (Holographic Competencies Showcase) -->
<!-- ======================================================================= -->
<section class="expertise-3d-section" id="expertiseSection">
    <!-- 3D Perspective Matrix Grid Floor & Ambient Orbs -->
    <div class="expertise-grid-floor"></div>
    <div class="expertise-orb orb-blue"></div>
    <div class="expertise-orb orb-emerald"></div>
    <div class="expertise-orb orb-indigo"></div>

    <div class="container position-relative" style="z-index: 5;">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <span class="expertise-badge-pill mb-3">
                <i class="fa-solid fa-cube text-primary"></i> 3D Core Competencies
            </span>
            <h2 class="fw-bold display-5 text-white mb-2" style="letter-spacing: -0.02em;">
                Areas of Expertise
            </h2>
            <p class="text-white text-opacity-75 col-md-8 mx-auto fs-6 mb-0">
                Foundational disciplines, rigorous university curriculum, and practical engineering skills powering modern web platforms, campus network simulations, and relational databases.
            </p>
        </div>

        <!-- 3 Floating 3D Cards Grid -->
        <div class="row g-4 justify-content-center">

            <!-- Card 1: Web Development -->
            <div class="col-lg-4 col-md-6">
                <div class="card-3d-wrap card-theme-blue">
                    <div class="card-3d-inner">
                        <!-- Holographic glare & cyber corners -->
                        <div class="card-3d-glare"></div>
                        <div class="cyber-corner top-left"></div>
                        <div class="cyber-corner top-right"></div>
                        <div class="cyber-corner bottom-left"></div>
                        <div class="cyber-corner bottom-right"></div>

                        <!-- Top: Icon & Telemetry -->
                        <div class="d-flex align-items-center justify-content-between mb-4 layer-z-icon">
                            <div class="icon-box-3d">
                                <i class="fa-solid fa-code"></i>
                            </div>
                            <span class="telemetry-badge">
                                <span class="telemetry-pulse-dot"></span> Full-Stack
                            </span>
                        </div>

                        <!-- Header & Description -->
                        <div class="layer-z-header">
                            <h3 class="fw-bold text-white h4 mb-2">Web Development</h3>
                            <p class="text-secondary small mb-3 leading-relaxed">
                                Architecting high-performance, responsive web interfaces with semantic HTML5, modern CSS3, vanilla JavaScript, and secure PHP server-side backends.
                            </p>
                        </div>

                        <!-- Skill Micro-Pills -->
                        <div class="skill-checklist-3d layer-z-content">
                            <div class="skill-item-pill">
                                <i class="fa-solid fa-circle-check text-primary"></i>
                                <span>Semantic HTML5 & Modern CSS3</span>
                            </div>
                            <div class="skill-item-pill">
                                <i class="fa-solid fa-circle-check text-primary"></i>
                                <span>Interactive JavaScript (ES6+)</span>
                            </div>
                            <div class="skill-item-pill">
                                <i class="fa-solid fa-circle-check text-primary"></i>
                                <span>Bootstrap 5 Responsive Grid</span>
                            </div>
                            <div class="skill-item-pill">
                                <i class="fa-solid fa-circle-check text-primary"></i>
                                <span>PHP 8.2 & Modular Architecture</span>
                            </div>
                        </div>

                        <!-- Action Link Button -->
                        <div class="layer-z-btn pt-2 border-top border-secondary border-opacity-10">
                            <a href="projects.php?filter=web-dev" class="btn-action-3d">
                                <span>Explore Web Projects</span>
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Computer Networking -->
            <div class="col-lg-4 col-md-6">
                <div class="card-3d-wrap card-theme-emerald">
                    <div class="card-3d-inner">
                        <!-- Holographic glare & cyber corners -->
                        <div class="card-3d-glare"></div>
                        <div class="cyber-corner top-left"></div>
                        <div class="cyber-corner top-right"></div>
                        <div class="cyber-corner bottom-left"></div>
                        <div class="cyber-corner bottom-right"></div>

                        <!-- Top: Icon & Telemetry -->
                        <div class="d-flex align-items-center justify-content-between mb-4 layer-z-icon">
                            <div class="icon-box-3d">
                                <i class="fa-solid fa-network-wired"></i>
                            </div>
                            <span class="telemetry-badge">
                                <span class="telemetry-pulse-dot"></span> Cisco Sim
                            </span>
                        </div>

                        <!-- Header & Description -->
                        <div class="layer-z-header">
                            <h3 class="fw-bold text-white h4 mb-2">Computer Networking</h3>
                            <p class="text-secondary small mb-3 leading-relaxed">
                                Designing and simulating high-availability campus LAN topologies, VLAN segmentation, dynamic routing protocols, and firewall ACL security.
                            </p>
                        </div>

                        <!-- Skill Micro-Pills -->
                        <div class="skill-checklist-3d layer-z-content">
                            <div class="skill-item-pill">
                                <i class="fa-solid fa-circle-check text-success"></i>
                                <span>IPv4 & IPv6 Subnetting (VLSM)</span>
                            </div>
                            <div class="skill-item-pill">
                                <i class="fa-solid fa-circle-check text-success"></i>
                                <span>Cisco Packet Tracer Lab Sim</span>
                            </div>
                            <div class="skill-item-pill">
                                <i class="fa-solid fa-circle-check text-success"></i>
                                <span>VLANs, Trunking & Inter-VLAN</span>
                            </div>
                            <div class="skill-item-pill">
                                <i class="fa-solid fa-circle-check text-success"></i>
                                <span>OSPF Routing & ACL Firewalls</span>
                            </div>
                        </div>

                        <!-- Action Link Button -->
                        <div class="layer-z-btn pt-2 border-top border-secondary border-opacity-10">
                            <a href="projects.php?filter=networking" class="btn-action-3d">
                                <span>Explore Network Lab</span>
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Database Management -->
            <div class="col-lg-4 col-md-6">
                <div class="card-3d-wrap card-theme-indigo">
                    <div class="card-3d-inner">
                        <!-- Holographic glare & cyber corners -->
                        <div class="card-3d-glare"></div>
                        <div class="cyber-corner top-left"></div>
                        <div class="cyber-corner top-right"></div>
                        <div class="cyber-corner bottom-left"></div>
                        <div class="cyber-corner bottom-right"></div>

                        <!-- Top: Icon & Telemetry -->
                        <div class="d-flex align-items-center justify-content-between mb-4 layer-z-icon">
                            <div class="icon-box-3d">
                                <i class="fa-solid fa-database"></i>
                            </div>
                            <span class="telemetry-badge">
                                <span class="telemetry-pulse-dot"></span> Relational
                            </span>
                        </div>

                        <!-- Header & Description -->
                        <div class="layer-z-header">
                            <h3 class="fw-bold text-white h4 mb-2">Database Management</h3>
                            <p class="text-secondary small mb-3 leading-relaxed">
                                Structuring relational database models, executing 3NF normalization, formulating complex SQL transactions, and optimizing backend data pipelines.
                            </p>
                        </div>

                        <!-- Skill Micro-Pills -->
                        <div class="skill-checklist-3d layer-z-content">
                            <div class="skill-item-pill">
                                <i class="fa-solid fa-circle-check text-info"></i>
                                <span>MySQL & MariaDB Management</span>
                            </div>
                            <div class="skill-item-pill">
                                <i class="fa-solid fa-circle-check text-info"></i>
                                <span>ER Diagram Modeling & Schema</span>
                            </div>
                            <div class="skill-item-pill">
                                <i class="fa-solid fa-circle-check text-info"></i>
                                <span>Normalization (1NF, 2NF, 3NF)</span>
                            </div>
                            <div class="skill-item-pill">
                                <i class="fa-solid fa-circle-check text-info"></i>
                                <span>CRUD Operations & PHP PDO/MySQLi</span>
                            </div>
                        </div>

                        <!-- Action Link Button -->
                        <div class="layer-z-btn pt-2 border-top border-secondary border-opacity-10">
                            <a href="projects.php" class="btn-action-3d">
                                <span>Explore Database Solutions</span>
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
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
include 'includes/project-modals.php';
include 'includes/footer.php';
?>
