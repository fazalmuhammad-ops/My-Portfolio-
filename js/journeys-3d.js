/**
 * Lanka Travellers & Portfolio: 3D Interactive Signature Experiences
 * Section 1: The Expeditions Showcase ("Signature Journeys")
 * Section 2: Why Lanka Travellers ("Why Travel With Us") - 3D Orbital System
 */

(function () {
    'use strict';

    // =========================================================================
    // 1. DATA REPOSITORIES FOR DUAL MODES
    // =========================================================================
    const SHOWCASE_DATA = {
        // Mode A: Lanka Travellers Luxury Sri Lankan Tours
        tourism: {
            watermark: 'SERENDIPITY',
            section1Badge: 'Signature Journeys',
            section1Title: 'The Expeditions Showcase',
            section1Sub: 'Traverse panoramic 3D destination portals across emerald mist, ancient Sigiriya water gardens, and colonial coastal ramparts.',
            cards: [
                {
                    id: 'sigiriya',
                    badge: 'UNESCO World Heritage',
                    rating: '★ 4.98 (240+ Reviews)',
                    title: 'Sigiriya Lion Rock',
                    desc: 'Ascend King Kashyapa’s 5th-century ancient citadel perched atop an obsidian monolith surrounded by symmetrical water gardens and boulder frescoes.',
                    tags: ['Ancient Citadel', 'Water Gardens', 'Monolithic Fortress'],
                    image: 'https://images.unsplash.com/photo-1588598198321-9735fd52455b?auto=format&fit=crop&w=1000&q=80',
                    fallbackGradient: 'linear-gradient(135deg, #064e3b 0%, #065f46 50%, #047857 100%)',
                    packageLabel: 'Royal Cultural Odyssey',
                    duration: '5 Days / 4 Nights',
                    price: 'From LKR 135,000',
                    priceSub: 'per person &bull; all-inclusive',
                    buttonText: 'Book This Journey',
                    actionType: 'booking'
                },
                {
                    id: 'galle',
                    badge: 'Dutch Colonial Bastion',
                    rating: '★ 4.95 (180+ Reviews)',
                    title: 'Galle Fort & Lighthouse',
                    desc: 'Stroll the cobbled seaside ramparts of the 17th-century ocean fortress, colonial villas, and emerald tides meeting the historic ivory lighthouse.',
                    tags: ['Ocean Ramparts', 'Cobblestone Alleys', 'Maritime Sunset'],
                    image: 'https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?auto=format&fit=crop&w=1000&q=80',
                    fallbackGradient: 'linear-gradient(135deg, #0c4a6e 0%, #0369a1 50%, #0284c7 100%)',
                    packageLabel: 'Southern Coast Heritage',
                    duration: '4 Days / 3 Nights',
                    price: 'From LKR 110,000',
                    priceSub: 'per person &bull; private chauffeur',
                    buttonText: 'Book This Journey',
                    actionType: 'booking'
                },
                {
                    id: 'nine-arches',
                    badge: 'Highland Engineering Marvel',
                    rating: '★ 4.99 (310+ Reviews)',
                    title: 'Nine Arches Bridge & Ella',
                    desc: 'Watch the azure hill-country train glide across the towering brick viaduct engulfed in misty tea estates and highland waterfalls.',
                    tags: ['Misty Highlands', 'Scenic Train Trail', 'Demodara Viaduct'],
                    image: 'https://images.unsplash.com/photo-1546708973-b339540b5162?auto=format&fit=crop&w=1000&q=80',
                    fallbackGradient: 'linear-gradient(135deg, #14532d 0%, #166534 50%, #15803d 100%)',
                    packageLabel: 'Highland Cloud Forest Tour',
                    duration: '6 Days / 5 Nights',
                    price: 'From LKR 155,000',
                    priceSub: 'per person &bull; first-class train seats',
                    buttonText: 'Book This Journey',
                    actionType: 'booking'
                },
                {
                    id: 'kandy',
                    badge: 'Sacred Royal Kingdom',
                    rating: '★ 4.94 (220+ Reviews)',
                    title: 'Temple of the Tooth',
                    desc: 'Experience the venerated sanctuary of Sri Dalada Maligawa beside Kandy Lake, echoing with ceremonial drummers and fragrant lotus blooms.',
                    tags: ['Sacred Relic', 'Kandyan Architecture', 'Royal Lakeside'],
                    image: 'https://images.unsplash.com/photo-1586861635167-e5223aadc9fe?auto=format&fit=crop&w=1000&q=80',
                    fallbackGradient: 'linear-gradient(135deg, #713f12 0%, #854d0e 50%, #a16207 100%)',
                    packageLabel: 'Sacred Kingdom Pilgrimage',
                    duration: '3 Days / 2 Nights',
                    price: 'From LKR 85,000',
                    priceSub: 'per person &bull; cultural pass included',
                    buttonText: 'Book This Journey',
                    actionType: 'booking'
                }
            ],
            // Section 2: Why Lanka Travellers Orbital Benefits
            orbitalSectionBadge: 'Why Lanka Travellers',
            orbitalSectionTitle: 'Why Travel With Us',
            orbitalSectionSub: 'A floating 3D orbital journey demonstrating our commitment to luxury, authentic heritage, and round-the-clock peace of mind.',
            benefits: [
                {
                    icon: 'fa-solid fa-compass',
                    title: 'Certified Native Guides',
                    desc: 'Deep cultural fluency and licensed storytelling experts unveiling hidden legends from Sigiriya to Jaffna.'
                },
                {
                    icon: 'fa-solid fa-receipt',
                    title: 'Transparent LKR Pricing',
                    desc: 'All-inclusive, guaranteed rates with zero hidden foreign surcharges or surprise tourist commissions.'
                },
                {
                    icon: 'fa-solid fa-route',
                    title: 'Tailor-Made Flexibility',
                    desc: 'Customizable itineraries, private luxury hybrid fleets, and hand-selected boutique heritage villas.'
                },
                {
                    icon: 'fa-solid fa-shield-halved',
                    title: '24/7 On-Tour Guardian Support',
                    desc: 'Dedicated round-the-clock concierge and emergency medical/travel dispatch ensuring continuous peace of mind.'
                }
            ]
        },

        // Mode B: Fazal Muhammad's Academic & Engineering Portfolio
        portfolio: {
            watermark: 'INNOVATION',
            section1Badge: 'Signature Creations',
            section1Title: 'The Engineering Expeditions',
            section1Sub: 'A winding 3D showcase through flagship mobile systems, modern web platforms, and university infrastructure simulations.',
            cards: [
                {
                    id: 'core-rider',
                    badge: 'BitHack 2026 Runner-Up',
                    rating: '★ Award Winner Distinction',
                    title: 'Core Rider (Smart Mobility)',
                    desc: 'Real-time on-demand campus micro-mobility and peer ride-pooling platform featuring live Google Maps telemetry and SOS dispatch.',
                    tags: ['Flutter (Dart)', 'Firebase Auth', 'Node.js', 'Google Maps'],
                    image: 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?auto=format&fit=crop&w=1000&q=80',
                    fallbackGradient: 'linear-gradient(135deg, #1e1b4b 0%, #312e81 50%, #4338ca 100%)',
                    packageLabel: 'BitHack 2026 Hackathon Distinction',
                    duration: 'Mobile App Project',
                    price: 'EUSL Trincomalee',
                    priceSub: 'Runner-Up Distinction',
                    buttonText: 'View Project Details',
                    actionType: 'project-modal',
                    targetModal: '#modalProjectCoreRider'
                },
                {
                    id: 'lanka-travellers',
                    badge: 'Modern Tourism Platform',
                    rating: '★ High-Performance Web App',
                    title: 'Lanka Travellers Web Platform',
                    desc: 'Multi-page luxury travel web application featuring dynamic URL-based package selection, dark mode adaptation, and responsive UI.',
                    tags: ['Semantic HTML5', 'Modern CSS3', 'Vanilla JS', 'Dark Mode'],
                    image: 'https://images.unsplash.com/photo-1546708973-b339540b5162?auto=format&fit=crop&w=1000&q=80',
                    fallbackGradient: 'linear-gradient(135deg, #064e3b 0%, #065f46 50%, #0f766e 100%)',
                    packageLabel: 'Flagship Web Development',
                    duration: 'Full-Stack Architecture',
                    price: 'Lanka Travellers',
                    priceSub: 'Production Grade',
                    buttonText: 'Explore System Details',
                    actionType: 'project-modal',
                    targetModal: '#modalProjectLankaTravellers'
                },
                {
                    id: 'portfolio-sys',
                    badge: 'USJ Academic Project',
                    rating: '★ Full-Stack Web App',
                    title: 'USJ Portfolio & Database Engine',
                    desc: 'Modular PHP backend with MySQL persistence, resilient offline logging, XSS protection, and responsive Bootstrap 5 styling.',
                    tags: ['PHP 8.2', 'MySQL / MariaDB', 'Bootstrap 5', 'REST Safe'],
                    image: 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=1000&q=80',
                    fallbackGradient: 'linear-gradient(135deg, #172554 0%, #1e40af 50%, #2563eb 100%)',
                    packageLabel: 'Dept. of ICT &bull; USJ FHSS',
                    duration: 'DIT Year 2026',
                    price: 'Full-Stack PHP',
                    priceSub: 'Live Database Powered',
                    buttonText: 'Explore Architecture',
                    actionType: 'project-modal',
                    targetModal: '#modalProjectPortfolio'
                },
                {
                    id: 'network-infra',
                    badge: 'Cisco Networking',
                    rating: '★ Enterprise Simulation',
                    title: 'Campus Network Infrastructure',
                    desc: 'Enterprise multi-building campus network topology configured with inter-VLAN routing, OSPF, DHCP redundancy, and ACL firewalls.',
                    tags: ['Cisco Packet Tracer', 'VLSM Subnetting', 'VLAN Trunking', 'OSPF'],
                    image: 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=1000&q=80',
                    fallbackGradient: 'linear-gradient(135deg, #064e3b 0%, #047857 50%, #10b981 100%)',
                    packageLabel: 'Computer Networking Laboratory',
                    duration: 'Infrastructure Topology',
                    price: 'Cisco Systems',
                    priceSub: 'High-Availability Routing',
                    buttonText: 'View Network Specs',
                    actionType: 'project-modal',
                    targetModal: '#modalProjectNetwork'
                }
            ],
            // Section 2: Why Collaborate With Fazal
            orbitalSectionBadge: 'Why Work With Fazal',
            orbitalSectionTitle: 'Core Engineering Pillars',
            orbitalSectionSub: 'Key principles and proven capabilities defining my technical craftsmanship, academic consistency, and problem-solving drive.',
            benefits: [
                {
                    icon: 'fa-solid fa-trophy',
                    title: 'Award-Winning Innovation',
                    desc: 'Proven hackathon track record (Runner-Up at BitHack 2026), building rapid, high-impact prototypes that solve real community challenges.'
                },
                {
                    icon: 'fa-solid fa-code',
                    title: 'Full-Stack Technical Craft',
                    desc: 'Proficient in PHP, relational MySQL modeling, modern CSS3 styling, and JavaScript architecture with clean documentation.'
                },
                {
                    icon: 'fa-solid fa-network-wired',
                    title: 'Enterprise Systems & Networks',
                    desc: 'Rigorous understanding of computer networking, VLSM subnetting, VLAN segmentation, and resilient system communications.'
                },
                {
                    icon: 'fa-solid fa-graduation-cap',
                    title: 'USJ Academic Dedication',
                    desc: 'Diploma in Information Technology student at University of Sri Jayewardenepura, driven by continuous learning and adaptability.'
                }
            ]
        }
    };

    let currentMode = 'tourism'; // default: 'tourism' (or switch to 'portfolio')
    let currentCardIndex = 0;
    let currentBenefitIndex = 0;

    // =========================================================================
    // 2. CANVAS FIREFLY & TROPICAL MIST PARTICLE SYSTEM
    // =========================================================================
    function initFireflyCanvas() {
        const canvas = document.getElementById('fireflyCanvas');
        if (!canvas) return;
        const ctx = canvas.getContext('2d');
        if (!ctx) return;

        let width = (canvas.width = canvas.parentElement.offsetWidth);
        let height = (canvas.height = canvas.parentElement.offsetHeight);

        window.addEventListener('resize', () => {
            if (canvas.parentElement) {
                width = canvas.width = canvas.parentElement.offsetWidth;
                height = canvas.height = canvas.parentElement.offsetHeight;
            }
        });

        const particles = [];
        const PARTICLE_COUNT = 45;

        for (let i = 0; i < PARTICLE_COUNT; i++) {
            particles.push({
                x: Math.random() * width,
                y: Math.random() * height,
                radius: Math.random() * 2.2 + 0.8,
                speedX: (Math.random() - 0.5) * 0.45,
                speedY: (Math.random() - 0.5) * 0.35,
                alpha: Math.random() * 0.7 + 0.2,
                alphaSpeed: Math.random() * 0.015 + 0.005,
                isGold: Math.random() > 0.45
            });
        }

        function animate() {
            ctx.clearRect(0, 0, width, height);

            particles.forEach((p) => {
                p.x += p.speedX;
                p.y += p.speedY;
                p.alpha += p.alphaSpeed;

                if (p.alpha > 0.95 || p.alpha < 0.15) {
                    p.alphaSpeed = -p.alphaSpeed;
                }

                if (p.x < 0) p.x = width;
                if (p.x > width) p.x = 0;
                if (p.y < 0) p.y = height;
                if (p.y > height) p.y = 0;

                ctx.save();
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);

                const color = p.isGold
                    ? `rgba(250, 204, 21, ${p.alpha})`
                    : `rgba(52, 211, 153, ${p.alpha * 0.85})`;

                ctx.fillStyle = color;
                ctx.shadowColor = p.isGold ? '#facc15' : '#34d399';
                ctx.shadowBlur = 10;
                ctx.fill();
                ctx.restore();
            });

            requestAnimationFrame(animate);
        }

        animate();
    }

    // =========================================================================
    // 3. SECTION 1: 3D WINDING TRAIL CARDS SHOWCASE
    // =========================================================================
    function renderSection1Cards() {
        const container = document.getElementById('portalCardsStage');
        if (!container) return;

        const data = SHOWCASE_DATA[currentMode];
        container.innerHTML = '';

        data.cards.forEach((item, index) => {
            const cardEl = document.createElement('div');
            cardEl.className = 'portal-card';
            cardEl.setAttribute('data-index', index);

            cardEl.innerHTML = `
                <div class="portal-image-container" style="background: ${item.fallbackGradient};">
                    <img src="${item.image}" alt="${item.title}" class="portal-card-img" 
                         onerror="this.onerror=null; this.style.display='none';">
                    <div class="portal-image-overlay"></div>
                    <span class="portal-badge-pill">${item.badge}</span>
                    <span class="portal-rating-pill">${item.rating}</span>
                </div>
                <div class="portal-card-body">
                    <h3 class="portal-card-title">${item.title}</h3>
                    <p class="portal-card-desc">${item.desc}</p>
                    <div class="portal-meta-tags">
                        ${item.tags.map((t) => `<span class="portal-tag">${t}</span>`).join('')}
                    </div>
                </div>
            `;

            // Clicking any card brings it into focus
            cardEl.addEventListener('click', () => {
                setCardIndex(index);
            });

            container.appendChild(cardEl);
        });

        updateSection1Positions();
    }

    function updateSection1Positions() {
        const cards = document.querySelectorAll('.portal-card');
        const total = cards.length;
        if (total === 0) return;

        cards.forEach((card, i) => {
            card.classList.remove('card-pos-active', 'card-pos-prev', 'card-pos-next', 'card-pos-far');

            const diff = (i - currentCardIndex + total) % total;

            if (diff === 0) {
                card.classList.add('card-pos-active');
            } else if (diff === 1) {
                card.classList.add('card-pos-next');
            } else if (diff === total - 1) {
                card.classList.add('card-pos-prev');
            } else {
                card.classList.add('card-pos-far');
            }
        });

        // Update Dynamic Bottom Status Dock
        updateBottomDock();
    }

    function updateBottomDock() {
        const data = SHOWCASE_DATA[currentMode];
        const activeCard = data.cards[currentCardIndex];
        if (!activeCard) return;

        const dockPackage = document.getElementById('dockPackageName');
        const dockDuration = document.getElementById('dockDuration');
        const dockPrice = document.getElementById('dockPrice');
        const dockPriceSub = document.getElementById('dockPriceSub');
        const dockActionBtn = document.getElementById('dockActionBtn');
        const dockLabel = document.getElementById('dockTitleLabel');

        if (dockLabel) dockLabel.textContent = activeCard.packageLabel;
        if (dockPackage) dockPackage.textContent = activeCard.title;
        if (dockDuration) dockDuration.innerHTML = `<i class="fa-regular fa-clock me-1"></i> ${activeCard.duration}`;
        if (dockPrice) dockPrice.textContent = activeCard.price;
        if (dockPriceSub) dockPriceSub.innerHTML = activeCard.priceSub;

        if (dockActionBtn) {
            dockActionBtn.textContent = activeCard.buttonText;

            // Handle booking modal vs project modal
            if (activeCard.actionType === 'booking') {
                dockActionBtn.setAttribute('data-bs-toggle', 'modal');
                dockActionBtn.setAttribute('data-bs-target', '#modalSignatureBooking');
                dockActionBtn.onclick = () => {
                    populateBookingModal(activeCard);
                };
            } else if (activeCard.actionType === 'project-modal') {
                dockActionBtn.setAttribute('data-bs-toggle', 'modal');
                dockActionBtn.setAttribute('data-bs-target', activeCard.targetModal || '#modalProjectCoreRider');
                dockActionBtn.onclick = null;
            }
        }
    }

    function setCardIndex(newIndex) {
        const total = SHOWCASE_DATA[currentMode].cards.length;
        currentCardIndex = (newIndex + total) % total;
        updateSection1Positions();
    }

    // =========================================================================
    // 4. SECTION 2: 3D ORBITAL SYSTEM & WATERMARK
    // =========================================================================
    function renderSection2Benefits() {
        const stage = document.getElementById('orbitalParallaxStage');
        if (!stage) return;

        const data = SHOWCASE_DATA[currentMode];
        const watermark = document.getElementById('orbitalWatermark');
        if (watermark) watermark.textContent = data.watermark;

        // Keep compass emblem & orbital rings, update orbital cards
        const existingCards = stage.querySelectorAll('.orbital-card');
        existingCards.forEach((c) => c.remove());

        data.benefits.forEach((item, index) => {
            const cardEl = document.createElement('div');
            cardEl.className = 'orbital-card';
            cardEl.setAttribute('data-benefit-index', index);

            cardEl.innerHTML = `
                <div class="orbital-icon-box">
                    <i class="${item.icon}"></i>
                </div>
                <h4 class="orbital-card-title">${item.title}</h4>
                <p class="orbital-card-text">${item.desc}</p>
            `;

            cardEl.addEventListener('click', () => {
                setBenefitIndex(index);
            });

            stage.appendChild(cardEl);
        });

        // Render vertical indicator dots
        renderOrbitalDots();
        updateOrbitalPositions();
    }

    function renderOrbitalDots() {
        const nav = document.getElementById('orbitalProgressNav');
        if (!nav) return;

        const data = SHOWCASE_DATA[currentMode];
        nav.innerHTML = '';

        data.benefits.forEach((item, index) => {
            const btn = document.createElement('button');
            btn.className = `orbital-dot-btn ${index === currentBenefitIndex ? 'active' : ''}`;
            btn.setAttribute('aria-label', item.title);

            btn.innerHTML = `
                <span class="orbital-dot-label">${item.title}</span>
                <span class="orbital-dot-circle"></span>
            `;

            btn.addEventListener('click', () => {
                setBenefitIndex(index);
            });

            nav.appendChild(btn);
        });
    }

    function updateOrbitalPositions() {
        const cards = document.querySelectorAll('.orbital-card');
        const total = cards.length;
        if (total === 0) return;

        cards.forEach((card, i) => {
            card.classList.remove('orbit-pos-0', 'orbit-pos-1', 'orbit-pos-2', 'orbit-pos-3');

            // Compute circular offset
            const offset = (i - currentBenefitIndex + total) % total;
            card.classList.add(`orbit-pos-${offset}`);
        });

        // Update dots active state
        const dots = document.querySelectorAll('.orbital-dot-btn');
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === currentBenefitIndex);
        });
    }

    function setBenefitIndex(index) {
        const total = SHOWCASE_DATA[currentMode].benefits.length;
        currentBenefitIndex = (index + total) % total;
        updateOrbitalPositions();
    }

    // =========================================================================
    // 5. 3D MOUSE PARALLAX TILT ACROSS THE ORBITAL SCENE
    // =========================================================================
    function initOrbitalMouseParallax() {
        const section = document.getElementById('orbitalSection');
        const stage = document.getElementById('orbitalParallaxStage');
        if (!section || !stage) return;

        let targetRotateX = 0;
        let targetRotateY = 0;
        let currentRotateX = 0;
        let currentRotateY = 0;

        section.addEventListener('mousemove', (e) => {
            const rect = section.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - 0.5; // -0.5 to 0.5
            const y = (e.clientY - rect.top) / rect.height - 0.5;

            targetRotateY = x * 22; // max 22 deg tilt
            targetRotateX = -y * 18;
        });

        section.addEventListener('mouseleave', () => {
            targetRotateX = 0;
            targetRotateY = 0;
        });

        function lerpParallax() {
            currentRotateX += (targetRotateX - currentRotateX) * 0.08;
            currentRotateY += (targetRotateY - currentRotateY) * 0.08;

            stage.style.transform = `perspective(1200px) rotateX(${currentRotateX.toFixed(2)}deg) rotateY(${currentRotateY.toFixed(2)}deg)`;
            requestAnimationFrame(lerpParallax);
        }

        lerpParallax();
    }

    // =========================================================================
    // 6. POPULATE BOOKING MODAL WITH ACTIVE TOUR PACKAGE
    // =========================================================================
    function populateBookingModal(card) {
        const titleEl = document.getElementById('modalBookingPackageTitle');
        const priceEl = document.getElementById('modalBookingPrice');
        const durationEl = document.getElementById('modalBookingDuration');
        const packageInput = document.getElementById('modalBookingPackageInput');

        if (titleEl) titleEl.textContent = card.title + ' — ' + card.packageLabel;
        if (priceEl) priceEl.textContent = card.price;
        if (durationEl) durationEl.textContent = card.duration;
        if (packageInput) packageInput.value = `${card.title} (${card.duration} - ${card.price})`;
    }

    // =========================================================================
    // 7. INITIALIZE DUAL MODE SWITCHER
    // =========================================================================
    function initModeSwitcher() {
        const btnTourism = document.getElementById('modeBtnTourism');
        const btnPortfolio = document.getElementById('modeBtnPortfolio');
        const sec1Badge = document.getElementById('expeditionsBadge');
        const sec1Title = document.getElementById('expeditionsTitle');
        const sec1Sub = document.getElementById('expeditionsSubtitle');
        const sec2Badge = document.getElementById('orbitalBadge');
        const sec2Title = document.getElementById('orbitalTitle');
        const sec2Sub = document.getElementById('orbitalSubtitle');

        function switchMode(mode) {
            currentMode = mode;
            currentCardIndex = 0;
            currentBenefitIndex = 0;

            if (btnTourism) btnTourism.classList.toggle('active', mode === 'tourism');
            if (btnPortfolio) btnPortfolio.classList.toggle('active', mode === 'portfolio');

            const data = SHOWCASE_DATA[mode];
            if (sec1Badge) sec1Badge.textContent = data.section1Badge;
            if (sec1Title) sec1Title.textContent = data.section1Title;
            if (sec1Sub) sec1Sub.textContent = data.section1Sub;
            if (sec2Badge) sec2Badge.textContent = data.orbitalSectionBadge;
            if (sec2Title) sec2Title.textContent = data.orbitalSectionTitle;
            if (sec2Sub) sec2Sub.textContent = data.orbitalSectionSub;

            renderSection1Cards();
            renderSection2Benefits();
        }

        if (btnTourism) btnTourism.addEventListener('click', () => switchMode('tourism'));
        if (btnPortfolio) btnPortfolio.addEventListener('click', () => switchMode('portfolio'));
    }

    // =========================================================================
    // 8. BIND CONTROLS (NAV BUTTONS, KEYBOARD, TOUCH)
    // =========================================================================
    function bindControls() {
        const prevBtn = document.getElementById('trailPrevBtn');
        const nextBtn = document.getElementById('trailNextBtn');

        if (prevBtn) prevBtn.addEventListener('click', () => setCardIndex(currentCardIndex - 1));
        if (nextBtn) nextBtn.addEventListener('click', () => setCardIndex(currentCardIndex + 1));

        // Arrow keys when viewport is visible
        window.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') setCardIndex(currentCardIndex - 1);
            if (e.key === 'ArrowRight') setCardIndex(currentCardIndex + 1);
        });

        // Wheel scroll support on Section 1
        const sec1 = document.getElementById('expeditionsSection');
        if (sec1) {
            let lastScrollTime = 0;
            sec1.addEventListener('wheel', (e) => {
                const now = Date.now();
                if (now - lastScrollTime > 600 && Math.abs(e.deltaY) > 25) {
                    if (e.deltaY > 0) {
                        setCardIndex(currentCardIndex + 1);
                    } else {
                        setCardIndex(currentCardIndex - 1);
                    }
                    lastScrollTime = now;
                }
            }, { passive: true });
        }
    }

    // =========================================================================
    // INITIALIZATION ENTRYPOINT
    // =========================================================================
    document.addEventListener('DOMContentLoaded', () => {
        initFireflyCanvas();
        initModeSwitcher();
        renderSection1Cards();
        renderSection2Benefits();
        initOrbitalMouseParallax();
        bindControls();
    });

})();
