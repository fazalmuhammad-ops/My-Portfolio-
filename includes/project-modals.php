<!-- ======================================================================= -->
<!-- MODALS FOR PROJECT DETAILS (Shared across index.php & projects.php) -->
<!-- ======================================================================= -->

<!-- Modal 1: Core Rider -->
<div class="modal fade" id="modalProjectCoreRider" tabindex="-1" aria-labelledby="modalProjectCoreRiderLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg bg-dark text-white" style="border: 1px solid rgba(250, 204, 21, 0.3) !important; border-radius: 20px; overflow: hidden;">
            <div class="modal-header border-bottom border-warning border-opacity-40 py-3 px-4" style="background: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-warning text-dark fw-bold px-3 py-1 rounded-pill">
                        <i class="fa-solid fa-trophy me-1"></i> BitHack 2026 Runner-Up
                    </span>
                    <h5 class="modal-title fw-bold text-white mb-0" id="modalProjectCoreRiderLabel">Core Rider &mdash; Smart Mobility</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 p-md-5">
                <div class="p-3 bg-warning-subtle border border-warning border-opacity-50 rounded-3 mb-4 d-flex align-items-center gap-3">
                    <i class="fa-solid fa-award text-warning display-6 flex-shrink-0"></i>
                    <div>
                        <h6 class="fw-bold mb-1 text-dark">BitHack 2026 Hackathon Distinction</h6>
                        <small class="text-secondary d-block">
                            Awarded <strong>Runner-Up</strong> at <strong>BitHack 2026</strong>, organized by <strong>Eastern University, Sri Lanka (EUSL) Trincomalee Campus</strong>, for architecting and prototyping this innovative micro-mobility solution.
                        </small>
                    </div>
                </div>

                <h6 class="fw-bold text-white mb-2">Project Overview & Problem Statement:</h6>
                <p class="text-secondary small leading-relaxed mb-4">
                    Commuters and university students frequently face unreliable intra-campus transportation, steep single-passenger fares, and an absence of verified passenger safety. <strong>Core Rider</strong> was conceived and rapidly prototyped during the BitHack 2026 hackathon to solve these challenges through affordable, verified, on-demand ride-pooling and micro-transit sharing.
                </p>

                <h6 class="fw-bold text-white mb-2">Core Features & Innovations:</h6>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="p-3 bg-black bg-opacity-40 rounded-3 h-100 border border-secondary border-opacity-25">
                            <span class="fw-semibold text-primary d-block mb-1"><i class="fa-solid fa-map-location-dot me-2"></i>Live Telemetry & GPS</span>
                            <small class="text-secondary">Integrated Google Maps SDK for real-time driver tracking, optimal route mapping, and live estimated time of arrival (ETA).</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-black bg-opacity-40 rounded-3 h-100 border border-secondary border-opacity-25">
                            <span class="fw-semibold text-success d-block mb-1"><i class="fa-solid fa-users me-2"></i>Smart Ride-Pooling</span>
                            <small class="text-secondary">Intelligent passenger-driver pairing algorithm connecting commuters travelling along shared campus corridors to cut emissions and trip costs.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-black bg-opacity-40 rounded-3 h-100 border border-secondary border-opacity-25">
                            <span class="fw-semibold text-warning d-block mb-1"><i class="fa-solid fa-calculator me-2"></i>Automated Fare Matrix</span>
                            <small class="text-secondary">Transparent distance and peak-hour fare calculation model preventing unfair surge costs, integrated with cashless payment logging.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-black bg-opacity-40 rounded-3 h-100 border border-secondary border-opacity-25">
                            <span class="fw-semibold text-danger d-block mb-1"><i class="fa-solid fa-shield-halved me-2"></i>Emergency SOS & Safety</span>
                            <small class="text-secondary">One-tap emergency broadcast mechanism dispatching live location telemetry to designated emergency contacts and campus security.</small>
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-white mb-2">Technology Stack:</h6>
                <div class="d-flex flex-wrap gap-2">
                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50 px-3 py-2 rounded-pill"><i class="fa-brands fa-flutter text-info me-1"></i> Flutter (Dart)</span>
                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50 px-3 py-2 rounded-pill"><i class="fa-solid fa-fire text-danger me-1"></i> Firebase Auth & Cloud Firestore</span>
                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50 px-3 py-2 rounded-pill"><i class="fa-brands fa-node-js text-success me-1"></i> Node.js API Service</span>
                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50 px-3 py-2 rounded-pill"><i class="fa-solid fa-map text-primary me-1"></i> Google Maps Platform</span>
                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50 px-3 py-2 rounded-pill"><i class="fa-solid fa-bolt text-warning me-1"></i> Cloud Functions</span>
                </div>
            </div>
            <div class="modal-footer border-top border-secondary border-opacity-25">
                <button type="button" class="btn btn-outline-light rounded-pill px-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2: Lanka Travellers -->
<div class="modal fade" id="modalProjectLankaTravellers" tabindex="-1" aria-labelledby="modalProjectLankaTravellersLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg bg-dark text-white" style="border: 1px solid rgba(52, 211, 153, 0.3) !important; border-radius: 20px; overflow: hidden;">
            <div class="modal-header border-bottom border-success border-opacity-40 py-3 px-4" style="background: linear-gradient(135deg, #022c22 0%, #064e3b 100%);">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-success text-white fw-bold px-3 py-1 rounded-pill">
                        <i class="fa-solid fa-earth-asia me-1"></i> Tourism Web Platform
                    </span>
                    <h5 class="modal-title fw-bold text-white mb-0" id="modalProjectLankaTravellersLabel">Lanka Travellers</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 p-md-5">
                <div class="p-3 bg-success-subtle border border-success border-opacity-50 rounded-3 mb-4 d-flex align-items-center gap-3">
                    <i class="fa-solid fa-compass text-success display-6 flex-shrink-0"></i>
                    <div>
                        <h6 class="fw-bold mb-1 text-dark">Modern Tourism & Travel Platform</h6>
                        <small class="text-secondary d-block">
                            A responsive, accessible, and high-performance multi-page travel agency web platform built with semantic HTML5, modern CSS3, and vanilla JavaScript.
                        </small>
                    </div>
                </div>

                <h6 class="fw-bold text-white mb-2">Key Engineering Features:</h6>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="p-3 bg-black bg-opacity-40 rounded-3 h-100 border border-secondary border-opacity-25">
                            <span class="fw-semibold text-success d-block mb-1"><i class="fa-solid fa-link me-2"></i>URL-Based Pre-Selection</span>
                            <small class="text-secondary">Deep link integration carrying package parameters across itinerary exploration directly to contact form fields.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-black bg-opacity-40 rounded-3 h-100 border border-secondary border-opacity-25">
                            <span class="fw-semibold text-warning d-block mb-1"><i class="fa-solid fa-moon me-2"></i>Automated Dark Mode</span>
                            <small class="text-secondary">Detects system OS preference and provides seamless instant manual theme switching without layout recalculation flashes.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-black bg-opacity-40 rounded-3 h-100 border border-secondary border-opacity-25">
                            <span class="fw-semibold text-info d-block mb-1"><i class="fa-solid fa-mobile-screen me-2"></i>Touch-Optimized UX</span>
                            <small class="text-secondary">Mobile fly-out drawer navigation with accessible ARIA landmarks, backdrop blur, and smooth gesture response.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-black bg-opacity-40 rounded-3 h-100 border border-secondary border-opacity-25">
                            <span class="fw-semibold text-primary d-block mb-1"><i class="fa-solid fa-circle-question me-2"></i>Interactive Accordions</span>
                            <small class="text-secondary">Smooth animated FAQ accordion widgets addressing common traveler concerns, packing guidelines, and permits.</small>
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-white mb-2">Technology Stack:</h6>
                <div class="d-flex flex-wrap gap-2">
                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50 px-3 py-2 rounded-pill"><i class="fa-brands fa-html5 text-danger me-1"></i> HTML5 Semantic Markup</span>
                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50 px-3 py-2 rounded-pill"><i class="fa-brands fa-css3-alt text-primary me-1"></i> Modern CSS3 & Variables</span>
                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50 px-3 py-2 rounded-pill"><i class="fa-brands fa-js text-warning me-1"></i> Vanilla JavaScript (ES6+)</span>
                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50 px-3 py-2 rounded-pill"><i class="fa-brands fa-bootstrap text-purple me-1"></i> Bootstrap 5 Grid</span>
                </div>
            </div>
            <div class="modal-footer border-top border-secondary border-opacity-25 d-flex justify-content-between">
                <a href="https://github.com/fazalmuhammad-ops/Traveling-Website" target="_blank" rel="noopener noreferrer" class="btn btn-outline-light rounded-pill px-4">
                    <i class="fa-brands fa-github me-1"></i> GitHub Repository
                </a>
                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 3: USJ Academic Portfolio -->
<div class="modal fade" id="modalProjectPortfolio" tabindex="-1" aria-labelledby="modalProjectPortfolioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg bg-dark text-white" style="border: 1px solid rgba(59, 130, 246, 0.3) !important; border-radius: 20px; overflow: hidden;">
            <div class="modal-header border-bottom border-primary border-opacity-40 py-3 px-4" style="background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary text-white fw-bold px-3 py-1 rounded-pill">
                        <i class="fa-solid fa-code me-1"></i> Full-Stack PHP
                    </span>
                    <h5 class="modal-title fw-bold text-white mb-0" id="modalProjectPortfolioLabel">USJ Academic Portfolio & System</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 p-md-5">
                <div class="p-3 bg-primary-subtle border border-primary border-opacity-50 rounded-3 mb-4 d-flex align-items-center gap-3">
                    <i class="fa-solid fa-graduation-cap text-primary display-6 flex-shrink-0"></i>
                    <div>
                        <h6 class="fw-bold mb-1 text-dark">University of Sri Jayewardenepura &bull; DIT Project</h6>
                        <small class="text-secondary d-block">
                            Full-stack portfolio architecture featuring modular PHP includes, resilient database auto-provisioning, XSS sanitization, and administrative messages management.
                        </small>
                    </div>
                </div>

                <h6 class="fw-bold text-white mb-2">Architectural Highlights:</h6>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="p-3 bg-black bg-opacity-40 rounded-3 h-100 border border-secondary border-opacity-25">
                            <span class="fw-semibold text-primary d-block mb-1"><i class="fa-solid fa-shield-halved me-2"></i>Fault-Tolerant DB Connector</span>
                            <small class="text-secondary">Handles MySQL connection states gracefully without fatal exceptions, auto-provisions portfolio_db and tables when online.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-black bg-opacity-40 rounded-3 h-100 border border-secondary border-opacity-25">
                            <span class="fw-semibold text-success d-block mb-1"><i class="fa-solid fa-inbox me-2"></i>Dual Storage Messages Inbox</span>
                            <small class="text-secondary">Displays live inquiries from MySQL with automatic regex fallback to messages.txt log when MySQL is offline, plus instant client search.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-black bg-opacity-40 rounded-3 h-100 border border-secondary border-opacity-25">
                            <span class="fw-semibold text-warning d-block mb-1"><i class="fa-solid fa-cube me-2"></i>3D Showcase Experience</span>
                            <small class="text-secondary">Custom CSS 3D perspective transforms, Canvas particle fireflies, and interactive 3D orbital physics.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-black bg-opacity-40 rounded-3 h-100 border border-secondary border-opacity-25">
                            <span class="fw-semibold text-info d-block mb-1"><i class="fa-solid fa-lock me-2"></i>Sanitized Form Validation</span>
                            <small class="text-secondary">XSS filtering via htmlspecialchars, email sanitation via filter_var, and prepared statement bindings.</small>
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-white mb-2">Technology Stack:</h6>
                <div class="d-flex flex-wrap gap-2">
                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50 px-3 py-2 rounded-pill"><i class="fa-brands fa-php text-primary me-1"></i> PHP 8.2</span>
                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50 px-3 py-2 rounded-pill"><i class="fa-solid fa-database text-warning me-1"></i> MySQL / MariaDB</span>
                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50 px-3 py-2 rounded-pill"><i class="fa-brands fa-bootstrap text-purple me-1"></i> Bootstrap 5.3</span>
                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50 px-3 py-2 rounded-pill"><i class="fa-brands fa-git-alt text-danger me-1"></i> Git Version Control</span>
                </div>
            </div>
            <div class="modal-footer border-top border-secondary border-opacity-25">
                <button type="button" class="btn btn-outline-light rounded-pill px-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 4: Campus Network Infrastructure -->
<div class="modal fade" id="modalProjectNetwork" tabindex="-1" aria-labelledby="modalProjectNetworkLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg bg-dark text-white" style="border: 1px solid rgba(6, 182, 212, 0.3) !important; border-radius: 20px; overflow: hidden;">
            <div class="modal-header border-bottom border-info border-opacity-40 py-3 px-4" style="background: linear-gradient(135deg, #042f24 0%, #0e7490 100%);">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-info text-dark fw-bold px-3 py-1 rounded-pill">
                        <i class="fa-solid fa-network-wired me-1"></i> Cisco Enterprise
                    </span>
                    <h5 class="modal-title fw-bold text-white mb-0" id="modalProjectNetworkLabel">Campus Network Infrastructure</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 p-md-5">
                <div class="p-3 bg-info-subtle border border-info border-opacity-50 rounded-3 mb-4 d-flex align-items-center gap-3">
                    <i class="fa-solid fa-server text-info display-6 flex-shrink-0"></i>
                    <div>
                        <h6 class="fw-bold mb-1 text-dark">Enterprise Multi-Building Campus Network</h6>
                        <small class="text-secondary d-block">
                            Simulated network topology featuring inter-VLAN routing, dynamic OSPF protocol, redundant DHCP servers, subnetting (VLSM), and security ACLs.
                        </small>
                    </div>
                </div>

                <h6 class="fw-bold text-white mb-2">Network Architecture & Protocols:</h6>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="p-3 bg-black bg-opacity-40 rounded-3 h-100 border border-secondary border-opacity-25">
                            <span class="fw-semibold text-info d-block mb-1"><i class="fa-solid fa-diagram-project me-2"></i>Multi-VLAN Segmentation</span>
                            <small class="text-secondary">Configured isolated VLANs for Admin, Faculty, Student Labs, and Guest Wi-Fi via 802.1Q trunk links.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-black bg-opacity-40 rounded-3 h-100 border border-secondary border-opacity-25">
                            <span class="fw-semibold text-success d-block mb-1"><i class="fa-solid fa-route me-2"></i>OSPF Dynamic Routing</span>
                            <small class="text-secondary">Area 0 multi-router link-state routing providing rapid convergence and automatic path failover.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-black bg-opacity-40 rounded-3 h-100 border border-secondary border-opacity-25">
                            <span class="fw-semibold text-warning d-block mb-1"><i class="fa-solid fa-sitemap me-2"></i>VLSM Subnet Efficiency</span>
                            <small class="text-secondary">Eliminated IPv4 address exhaustion across /24 to /30 subnets with variable length subnet masks.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-black bg-opacity-40 rounded-3 h-100 border border-secondary border-opacity-25">
                            <span class="fw-semibold text-danger d-block mb-1"><i class="fa-solid fa-shield-halved me-2"></i>Access Control Lists (ACLs)</span>
                            <small class="text-secondary">Implemented standard and extended ACLs preventing unauthorized traffic into the administrative core servers.</small>
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-white mb-2">Simulation Tools & Specs:</h6>
                <div class="d-flex flex-wrap gap-2">
                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50 px-3 py-2 rounded-pill"><i class="fa-solid fa-network-wired text-info me-1"></i> Cisco Packet Tracer</span>
                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50 px-3 py-2 rounded-pill"><i class="fa-solid fa-arrows-split-up-and-left text-success me-1"></i> Cisco 2960 Switches</span>
                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50 px-3 py-2 rounded-pill"><i class="fa-solid fa-shuffle text-warning me-1"></i> Cisco 2911 Routers</span>
                    <span class="badge bg-secondary-subtle text-light border border-secondary border-opacity-50 px-3 py-2 rounded-pill"><i class="fa-solid fa-wifi text-primary me-1"></i> WPA2-Enterprise Wi-Fi</span>
                </div>
            </div>
            <div class="modal-footer border-top border-secondary border-opacity-25">
                <button type="button" class="btn btn-outline-light rounded-pill px-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

