<?php
// Set custom page title
$pageTitle = "Home | A.A. Fazal Muhammad - DIT Portfolio";
include 'includes/header.php';
?>

<!-- ======================================================================= -->
<!-- INTERACTIVE SRI TECH-STYLE CHARACTER HERO (Adapted for Fazal Muhammad) -->
<!-- ======================================================================= -->
<section id="hero-section" class="relative w-full min-h-screen flex flex-col justify-between hero-radial-bg overflow-hidden no-select">
    
    <!-- Outer ambient vignette for subtle high-end light-maroon framing -->
    <div class="pointer-events-none absolute inset-0 shadow-[inset_0_0_120px_rgba(74,21,35,0.08)] md:shadow-[inset_0_0_180px_rgba(74,21,35,0.14)] z-0"></div>

    <!-- Hero Content Stage (Desktop 3 Interaction Zones + Character Core) -->
    <main class="relative z-10 flex-1 flex flex-col items-center justify-center w-full px-4 md:px-8 py-4">
      
      <!-- Center Bright Glow focused directly behind character -->
      <div class="pointer-events-none absolute w-[420px] h-[420px] md:w-[680px] md:h-[680px] center-glow rounded-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 z-0"></div>

      <!-- DESKTOP 3-ZONE INTERACTIVE OVERLAYS (Invisible tracking zones) -->
      <div id="desktop-zones" class="hidden md:grid absolute inset-0 grid-cols-12 z-20 pointer-events-auto">
        <!-- LEFT ZONE (0 - 35%): Cols 1 to 4 -->
        <div id="zone-left" class="col-span-4 h-full cursor-pointer relative group" title="Left interaction zone">
          <div class="absolute inset-0 bg-maroon-900/0 hover:bg-maroon-900/[0.015] transition-colors duration-500"></div>
        </div>

        <!-- CENTER ZONE (35% - 65%): Cols 5 to 8 -->
        <div id="zone-center" class="col-span-4 h-full cursor-pointer relative group" title="Greeting interaction zone">
          <div class="absolute inset-0 bg-maroon-900/0 hover:bg-maroon-900/[0.015] transition-colors duration-500"></div>
        </div>

        <!-- RIGHT ZONE (65% - 100%): Cols 9 to 12 -->
        <div id="zone-right" class="col-span-4 h-full cursor-pointer relative group" title="Right interaction zone">
          <div class="absolute inset-0 bg-maroon-900/0 hover:bg-maroon-900/[0.015] transition-colors duration-500"></div>
        </div>
      </div>

      <!-- LEFT SIDE NOTE (I'm Fazal Muhammad / Web Developer / Move cursor...) -->
      <div class="relative md:absolute top-auto md:top-1/3 left-4 md:left-12 lg:left-20 z-30 flex flex-col items-center md:items-start text-center md:text-left mb-6 md:mb-0 pointer-events-none">
        <span class="inline-block px-3 py-1 mb-2 text-[11px] tracking-widest font-semibold uppercase rounded-full bg-maroon-100/80 text-maroon-900 border border-maroon-200/60 shadow-xs backdrop-blur-xs">
          Interactive Portfolio &bull; USJ DIT
        </span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-stone-900 leading-tight">
          I'm Fazal Muhammad
        </h1>
        <p class="text-base sm:text-lg lg:text-xl font-medium text-stone-600 mt-1">
          Web Developer & Systems Designer
        </p>

        <!-- Subtle interactive callout with animated cursor indicator -->
        <div class="mt-4 flex items-center gap-2 text-stone-500 text-xs sm:text-sm font-medium tracking-wide">
          <span class="relative flex items-center justify-center w-6 h-6">
            <!-- Animated SVG cursor icon -->
            <svg class="w-4 h-4 text-maroon-700 animate-cursor-pulse" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M3 3l7.07 16.97 2.51-7.39 7.39-2.51L3 3z"/>
              <path d="M13 13l6 6"/>
            </svg>
          </span>
          <span class="text-stone-600">Move cursor to call me !</span>
        </div>

        <!-- Quick Action CTA Buttons -->
        <div class="mt-5 flex items-center gap-3 pointer-events-auto">
          <a href="projects.php" class="px-5 py-2 text-xs sm:text-sm font-semibold rounded-full bg-stone-900 text-white hover:bg-stone-800 shadow-md transition-all text-decoration-none">
            View Projects &rarr;
          </a>
          <a href="contact.php" class="px-4 py-2 text-xs sm:text-sm font-semibold rounded-full bg-white/80 hover:bg-white text-stone-800 border border-stone-300 shadow-sm transition-all text-decoration-none">
            Contact Me
          </a>
        </div>
      </div>

      <!-- FLOATING CONTEXTUAL DIALOG PILL (Center Stage / Dynamic Reaction) -->
      <div id="speech-pill-container" class="relative z-30 mb-2 md:mb-4 transition-all duration-500 ease-out transform opacity-0 translate-y-2 pointer-events-none">
        <div class="animate-float px-5 py-2 rounded-full bg-white/95 backdrop-blur-md shadow-md border border-stone-200/60 text-stone-800 text-xs sm:text-sm font-medium tracking-wide flex items-center gap-2">
          <span id="speech-indicator-dot" class="w-2 h-2 rounded-full bg-maroon-600"></span>
          <span id="speech-pill-text">Hey, it's you!</span>
        </div>
      </div>

      <!-- DOMINANT CHARACTER & LAPTOP STAGE -->
      <div class="relative z-20 w-full max-w-[340px] sm:max-w-[420px] md:max-w-[500px] lg:max-w-[560px] h-[360px] sm:h-[440px] md:h-[500px] flex items-end justify-center">
        
        <!-- Interactive Animated SVG Character (Smooth vector interpolation with RAF) -->
        <svg id="character-canvas" class="w-full h-full max-h-full drop-shadow-xl overflow-visible" viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <!-- Desk & Shadow Gradients -->
            <linearGradient id="deskGrad" x1="0%" y1="0%" x2="100%" y2="0%">
              <stop offset="0%" stop-color="#e3cbd2" />
              <stop offset="50%" stop-color="#edd8de" />
              <stop offset="100%" stop-color="#dac0c8" />
            </linearGradient>
            <linearGradient id="laptopBodyGrad" x1="0%" y1="0%" x2="0%" y2="100%">
              <stop offset="0%" stop-color="#404044" />
              <stop offset="100%" stop-color="#212124" />
            </linearGradient>
            <linearGradient id="screenGrad" x1="0%" y1="0%" x2="100%" y2="100%">
              <stop offset="0%" stop-color="#141824" />
              <stop offset="50%" stop-color="#1e2438" />
              <stop offset="100%" stop-color="#0f131d" />
            </linearGradient>
            <radialGradient id="screenGlow" cx="50%" cy="50%" r="50%">
              <stop offset="0%" stop-color="#60a5fa" stop-opacity="0.35" />
              <stop offset="100%" stop-color="#60a5fa" stop-opacity="0" />
            </radialGradient>
            <linearGradient id="shirtGrad" x1="0%" y1="0%" x2="100%" y2="100%">
              <stop offset="0%" stop-color="#1e293b" />
              <stop offset="100%" stop-color="#0f172a" />
            </linearGradient>
            <filter id="softShadow" x="-20%" y="-20%" width="140%" height="140%">
              <feDropShadow dx="0" dy="12" stdDeviation="16" flood-color="#4a1523" flood-opacity="0.18" />
            </filter>

            <!-- ClipPath for Fazal Muhammad's Real Portrait Head -->
            <clipPath id="fazalHeadClip">
              <ellipse cx="250" cy="245" rx="55" ry="68" />
            </clipPath>
          </defs>

          <!-- Ambient Occlusion Shadow Under Desk -->
          <ellipse cx="250" cy="468" rx="200" ry="24" fill="#3a1c24" fill-opacity="0.12" />

          <!-- CHARACTER TORSO / BODY (Working posture in black suit and tie) -->
          <g id="char-body">
            <path d="M150 430 C150 360 180 320 250 320 C320 320 350 360 350 430 L350 470 L150 470 Z" fill="url(#shirtGrad)" />
            <!-- White Shirt Collar -->
            <path d="M225 320 L250 350 L275 320 C265 328 235 328 225 320 Z" fill="#ffffff" />
            <!-- Black Necktie -->
            <polygon points="247,345 253,345 256,415 250,430 244,415" fill="#0b0f19" />
          </g>

          <!-- HEAD GROUP (Turns Left, Center, Right smoothly via JS RAF transforms) -->
          <g id="char-head-group" transform="translate(0, 0)">
            <!-- Neck -->
            <path d="M232 300 L268 300 L264 330 L236 330 Z" fill="#c08569" />
            
            <!-- Silhouette Base -->
            <ellipse id="face-base" cx="250" cy="245" rx="55" ry="68" fill="#1e293b" />
            
            <!-- Fazal Muhammad's Real Portrait Photo Embedded & Clipped to Head -->
            <image href="images/profile.jpg?v=<?php echo file_exists('images/profile.jpg') ? filemtime('images/profile.jpg') : time(); ?>" 
                   x="175" y="160" width="150" height="170" 
                   clip-path="url(#fazalHeadClip)" 
                   preserveAspectRatio="xMidYMid slice" />
            
            <!-- Sleek edge contour ring -->
            <ellipse cx="250" cy="245" rx="55" ry="68" fill="none" stroke="#6a1f33" stroke-width="2" opacity="0.35" />

            <!-- HEADSET (Worn on head initially; animates to neck during greeting sequence) -->
            <g id="char-headset" transform="translate(0, 0)">
              <!-- Headband -->
              <path id="headset-band" d="M190 240 C185 145 315 145 310 240" stroke="#2c2d33" stroke-width="6" stroke-linecap="round" fill="none" />
              <!-- Left Earpad -->
              <rect x="182" y="230" width="12" height="28" rx="6" fill="#1b1c20" />
              <rect x="185" y="234" width="6" height="20" rx="3" fill="#dc8ea1" />
              <!-- Right Earpad -->
              <rect x="306" y="230" width="12" height="28" rx="6" fill="#1b1c20" />
              <rect x="309" y="234" width="6" height="20" rx="3" fill="#dc8ea1" />
              <!-- Headset Boom Mic -->
              <path id="headset-mic" d="M188 248 C185 270 205 278 220 278" stroke="#1f2024" stroke-width="2.5" stroke-linecap="round" fill="none" />
              <circle cx="222" cy="278" r="3" fill="#dc8ea1" />
            </g>
          </g>

          <!-- ARMS & HANDS (Interpolated for Typing, Waving Hello, and Pointing Downward) -->
          <!-- Left Arm / Typing Baseline -->
          <g id="arm-left">
            <path id="left-arm-path" d="M170 380 Q195 410 220 425" stroke="#1e293b" stroke-width="26" stroke-linecap="round" fill="none" />
            <circle cx="225" cy="425" r="9" fill="#e0a98b" />
          </g>

          <!-- Right Arm & Hand (Waving & Pointing Downward Sequence) -->
          <g id="arm-right">
            <path id="right-arm-path" d="M330 380 Q305 410 280 425" stroke="#1e293b" stroke-width="26" stroke-linecap="round" fill="none" />
            <g id="right-hand" transform="translate(275, 422)">
              <circle cx="0" cy="0" r="9" fill="#e0a98b" />
            </g>
          </g>

          <!-- LAPTOP & DESK FOREGROUND (Fully visible, dominant, zero cropping) -->
          <g id="foreground-station" filter="url(#softShadow)">
            <!-- Desk Surface -->
            <path d="M50 460 L450 460 C465 460 480 468 470 478 L30 478 C20 468 35 460 50 460 Z" fill="url(#deskGrad)" />
            <path d="M30 478 L470 478 L465 484 L35 484 Z" fill="#b88f9c" />

            <!-- Laptop Open Base -->
            <path d="M175 450 L325 450 L345 464 L155 464 Z" fill="url(#laptopBodyGrad)" />
            <polygon points="188,452 312,452 322,460 178,460" fill="#2d2d31" />
            <rect x="235" y="460" width="30" height="2" rx="1" fill="#505056" />

            <!-- Laptop Screen Display (Tilted upward facing character) -->
            <path d="M185 365 L315 365 L324 450 L176 450 Z" fill="#1b1c20" rx="4" />
            <polygon points="190,371 310,371 319,446 181,446" fill="url(#screenGrad)" />
            <polygon points="190,371 310,371 319,446 181,446" fill="url(#screenGlow)" />

            <!-- Code Lines on Laptop Screen -->
            <line x1="196" y1="382" x2="225" y2="382" stroke="#f43f5e" stroke-width="2" stroke-linecap="round" />
            <line x1="230" y1="382" x2="260" y2="382" stroke="#60a5fa" stroke-width="2" stroke-linecap="round" />
            <line x1="202" y1="390" x2="245" y2="390" stroke="#a78bfa" stroke-width="1.8" stroke-linecap="round" />
            <line x1="202" y1="397" x2="275" y2="397" stroke="#34d399" stroke-width="1.8" stroke-linecap="round" />
            <line x1="208" y1="404" x2="250" y2="404" stroke="#fbbf24" stroke-width="1.8" stroke-linecap="round" />
            <line x1="202" y1="411" x2="235" y2="411" stroke="#38bdf8" stroke-width="1.8" stroke-linecap="round" />
            <line x1="196" y1="418" x2="215" y2="418" stroke="#f43f5e" stroke-width="2" stroke-linecap="round" />

            <!-- Brand Logo Silhouette on Screen Back -->
            <circle cx="250" cy="406" r="1.5" fill="#ffffff" opacity="0.5" />
          </g>
        </svg>

      </div>

      <!-- PORTFOLIO DOWNWARD ANCHOR HINT -->
      <div class="mt-6 md:mt-2 flex flex-col items-center justify-center pointer-events-auto">
        <a href="#expeditionsSection" class="group flex flex-col items-center gap-1.5 text-stone-500 hover:text-maroon-800 transition-colors duration-200 text-decoration-none">
          <span class="text-xs font-semibold tracking-wider uppercase">Explore My Work</span>
          <svg class="w-4 h-4 animate-subtle-bounce text-stone-400 group-hover:text-maroon-700 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
          </svg>
        </a>
      </div>

    </main>

    <!-- Bottom Status Banner -->
    <div class="relative z-20 w-full px-6 md:px-12 py-3 flex flex-col sm:flex-row items-center justify-between text-xs text-stone-500 border-t border-maroon-200/40 backdrop-blur-xs">
      <div>Available for Select Full-Stack & Systems Projects</div>
      <div class="mt-2 sm:mt-0 font-medium text-stone-600">USJ DIT &bull; Sri Lanka &bull; Worldwide Collaboration</div>
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
