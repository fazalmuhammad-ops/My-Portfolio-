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
                        <h4 class="fw-bold text-white mb-0">3</h4>
                        <small class="text-white text-opacity-60" style="font-size: 0.78rem;">Projects</small>
                    </div>
                </div>
            </div>

            <!-- Right Column: Profile Image -->
            <div class="col-lg-5 text-center">
                <div class="profile-wrapper">
                    <div class="profile-ring"></div>
                    <div class="profile-image-inner">
                        <img src="images/profile.jpg?v=<?php echo file_exists('images/profile.jpg') ? filemtime('images/profile.jpg') : '1'; ?>" alt="A.A. Fazal Muhammad" onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=Fazal+Muhammad&background=0f172a&color=38bdf8&size=512';">
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

<!-- ======================================================================= -->
<!-- SECTION 1: THE EXPEDITIONS SHOWCASE ("SIGNATURE JOURNEYS") -->
<!-- ======================================================================= -->
<section class="expeditions-showcase-section" id="expeditionsSection">
    <!-- Atmospheric Ambient Glows & Canvas Particles -->
    <canvas id="fireflyCanvas" class="firefly-canvas"></canvas>
    <div class="ambient-glow-left"></div>
    <div class="ambient-glow-right"></div>

    <div class="container position-relative" style="z-index: 10;">
        <!-- Header & Mode Switcher -->
        <div class="text-center mb-4">
            <div class="d-flex justify-content-center mb-3">
                <div class="experience-mode-bar">
                    <button type="button" class="experience-mode-btn active" id="modeBtnTourism">
                        <i class="fa-solid fa-compass"></i>
                        <span>Lanka Travellers (Luxury Tours)</span>
                    </button>
                    <button type="button" class="experience-mode-btn" id="modeBtnPortfolio">
                        <i class="fa-solid fa-laptop-code"></i>
                        <span>Fazal's Engineering Expeditions</span>
                    </button>
                </div>
            </div>

            <span class="badge bg-warning bg-opacity-25 text-warning border border-warning border-opacity-40 rounded-pill px-3 py-1 mb-2 fw-semibold" id="expeditionsBadge">
                Signature Journeys
            </span>
            <h2 class="fw-bold display-5 text-white mb-2" id="expeditionsTitle">
                The Expeditions Showcase
            </h2>
            <p class="text-white text-opacity-75 col-md-8 mx-auto fs-6 mb-0" id="expeditionsSubtitle">
                Traverse panoramic 3D destination portals across emerald mist, ancient Sigiriya water gardens, and colonial coastal ramparts.
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
                        <div class="dock-title-label" id="dockTitleLabel">Royal Cultural Odyssey</div>
                        <h4 class="dock-package-name" id="dockPackageName">Sigiriya Lion Rock</h4>
                    </div>
                    <div class="col-sm-6 col-md-3 text-md-center">
                        <span class="dock-duration-badge" id="dockDuration">
                            <i class="fa-regular fa-clock me-1"></i> 5 Days / 4 Nights
                        </span>
                    </div>
                    <div class="col-sm-6 col-md-4 text-md-end d-flex align-items-center justify-content-md-end justify-content-between gap-3">
                        <div>
                            <div class="dock-price-val" id="dockPrice">From LKR 135,000</div>
                            <div class="dock-price-sub" id="dockPriceSub">per person &bull; all-inclusive</div>
                        </div>
                        <button type="button" class="dock-action-btn" id="dockActionBtn">
                            Book This Journey
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================================================================= -->
<!-- SECTION 2: WHY LANKA TRAVELLERS ("WHY TRAVEL WITH US") - 3D ORBITAL SYSTEM -->
<!-- ======================================================================= -->
<section class="orbital-showcase-section" id="orbitalSection">
    <!-- Huge Faint Outlined Typography Watermark -->
    <div class="orbital-watermark-text" id="orbitalWatermark">SERENDIPITY</div>

    <div class="container position-relative" style="z-index: 5;">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <span class="badge bg-warning bg-opacity-25 text-warning border border-warning border-opacity-40 rounded-pill px-3 py-1 mb-2 fw-semibold" id="orbitalBadge">
                Why Lanka Travellers
            </span>
            <h2 class="fw-bold display-5 text-white mb-2" id="orbitalTitle">
                Why Travel With Us
            </h2>
            <p class="text-white text-opacity-75 col-md-7 mx-auto fs-6 mb-0" id="orbitalSubtitle">
                A floating 3D orbital journey demonstrating our commitment to luxury, authentic heritage, and round-the-clock peace of mind.
            </p>
        </div>

        <!-- 3D Parallax Tilt Stage -->
        <div class="orbital-parallax-stage" id="orbitalParallaxStage">
            <!-- Central Illuminated 3D Heritage Compass / Golden Emblem -->
            <div class="heritage-compass-emblem">
                <div class="compass-inner-core">
                    <div class="compass-dial-needle"></div>
                    <i class="fa-solid fa-compass position-relative" style="z-index: 2;"></i>
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
<!-- BOOKING / INQUIRY MODAL (End-to-End Functional with process-form.php) -->
<!-- ======================================================================= -->
<div class="modal fade" id="modalSignatureBooking" tabindex="-1" aria-labelledby="modalSignatureBookingLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark text-white border-0 shadow-lg" style="border: 1px solid rgba(250, 204, 21, 0.4) !important; border-radius: 24px; overflow: hidden;">
            <div class="modal-header border-bottom border-secondary border-opacity-25 py-3 px-4" style="background: linear-gradient(135deg, #022c22 0%, #064e3b 100%);">
                <div>
                    <span class="badge bg-warning text-dark fw-bold px-3 py-1 rounded-pill mb-1">
                        <i class="fa-solid fa-gem me-1"></i> Luxury Journey Reservation
                    </span>
                    <h5 class="modal-title fw-bold text-white mb-0" id="modalSignatureBookingLabel">
                        Lanka Travellers &mdash; Reserve Your Experience
                    </h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 p-md-5">
                <!-- Package Summary Banner -->
                <div class="p-3 rounded-3 mb-4 d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3" 
                     style="background: rgba(4, 47, 36, 0.7); border: 1px solid rgba(250, 204, 21, 0.3);">
                    <div>
                        <small class="text-warning text-uppercase fw-bold d-block" style="font-size: 0.72rem; letter-spacing: 0.08em;">Selected Itinerary</small>
                        <h6 class="fw-bold text-white mb-0" id="modalBookingPackageTitle">Sigiriya Lion Rock &mdash; Royal Cultural Odyssey</h6>
                    </div>
                    <div class="text-sm-end">
                        <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-50 px-2 py-1 rounded-pill small" id="modalBookingDuration">5 Days / 4 Nights</span>
                        <div class="fw-bold text-warning fs-5 mt-1" id="modalBookingPrice">From LKR 135,000</div>
                    </div>
                </div>

                <!-- Booking Submission Form -->
                <form action="process-form.php" method="POST" id="signatureBookingForm">
                    <input type="hidden" name="subject" id="modalBookingPackageInput" value="Lanka Travellers Booking">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="bookingName" class="form-label small fw-semibold text-light">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control bg-black bg-opacity-50 text-white border-secondary border-opacity-50" id="bookingName" name="fullname" placeholder="e.g. Alexander Perera" required>
                        </div>
                        <div class="col-md-6">
                            <label for="bookingEmail" class="form-label small fw-semibold text-light">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control bg-black bg-opacity-50 text-white border-secondary border-opacity-50" id="bookingEmail" name="email" placeholder="alexander@example.com" required>
                        </div>
                        <div class="col-md-6">
                            <label for="bookingDate" class="form-label small fw-semibold text-light">Preferred Travel Date</label>
                            <input type="date" class="form-control bg-black bg-opacity-50 text-white border-secondary border-opacity-50" id="bookingDate">
                        </div>
                        <div class="col-md-6">
                            <label for="bookingGuests" class="form-label small fw-semibold text-light">Number of Guests</label>
                            <select class="form-select bg-black bg-opacity-50 text-white border-secondary border-opacity-50" id="bookingGuests">
                                <option value="2 Guests (Private Hybrid SUV)">2 Guests (Private Hybrid SUV)</option>
                                <option value="Solo Traveler (Private Guide)">Solo Traveler (Private Guide)</option>
                                <option value="Family / Small Group (3 - 5 Guests)">Family / Small Group (3 - 5 Guests)</option>
                                <option value="Executive Group (6+ Guests)">Executive Group (6+ Guests)</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="bookingMessage" class="form-label small fw-semibold text-light">Special Requests or Customization Notes <span class="text-danger">*</span></label>
                            <textarea class="form-control bg-black bg-opacity-50 text-white border-secondary border-opacity-50" id="bookingMessage" name="message" rows="3" placeholder="Specify any dietary requirements, luxury boutique hotel preferences, or private helicopter transfers..." required></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top border-secondary border-opacity-25">
                        <button type="button" class="btn btn-outline-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning text-dark fw-bold rounded-pill px-4" style="background: linear-gradient(135deg, #facc15 0%, #eab308 100%);">
                            <i class="fa-solid fa-paper-plane me-1"></i> Submit Reservation Request
                        </button>
                    </div>
                </form>
            </div>
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
