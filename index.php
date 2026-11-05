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

                    <!-- Character Avatar & Headset Rig -->
                    <div class="character-avatar-rig" id="characterAvatarRig">
                        <div class="character-portrait-frame">
                            <img src="images/profile.jpg?v=<?php echo file_exists('images/profile.jpg') ? filemtime('images/profile.jpg') : '1'; ?>" 
                                 alt="A.A. Fazal Muhammad" 
                                 class="character-portrait-img"
                                 id="characterImg">
                        </div>

                        <!-- Developer Headset (drops around neck on center greeting!) -->
                        <div class="developer-headset" id="developerHeadset">
                            <div class="headset-band"></div>
                            <div class="headset-earpiece left"></div>
                            <div class="headset-earpiece right"></div>
                        </div>

                        <!-- Waving Hello Hand & Arm -->
                        <div class="character-wave-arm" id="characterWaveArm">
                            <i class="fa-solid fa-hand wave-hand-icon"></i>
                        </div>
                    </div>

                    <!-- 3D Laptop Workstation with Live Code & Screen Glow -->
                    <div class="laptop-workstation-rig">
                        <!-- Laptop Display / Lid -->
                        <div class="laptop-screen-lid">
                            <div class="laptop-display-content">
                                <div class="terminal-header-dots">
                                    <span class="term-dot red"></span>
                                    <span class="term-dot yellow"></span>
                                    <span class="term-dot green"></span>
                                </div>
                                <div class="terminal-code-body text-start">
                                    <div><span class="term-kw">const</span> dev = <span class="term-str">"Fazal Muhammad"</span>;</div>
                                    <div><span class="term-kw">await</span> dev.<span class="term-fn">renderInteractiveHero</span>();</div>
                                    <div class="term-comment">// BitHack '26 Runner-Up &bull; USJ</div>
                                </div>
                                <div class="screen-bottom-status">
                                    <span>terminal &bull; bash</span>
                                    <span class="text-success">&bull; ONLINE</span>
                                </div>
                            </div>
                            <div class="laptop-screen-glow"></div>
                        </div>

                        <!-- Laptop Keyboard Base (Deck) -->
                        <div class="laptop-base-deck">
                            <div class="keyboard-keys-mesh"></div>
                            <div class="laptop-trackpad"></div>
                        </div>
                    </div>

                    <!-- Desk Shadow Reflection -->
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
include 'includes/project-modals.php';
include 'includes/footer.php';
?>
