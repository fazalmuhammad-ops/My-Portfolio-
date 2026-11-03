/**
 * A.A. Fazal Muhammad - University & Developer Portfolio
 * 3D Interactive Signature Experiences:
 * Section 1: The Engineering Expeditions ("Signature Works") - 3D Winding Trail
 * Section 2: Why Work With Fazal ("Core Engineering Pillars") - 3D Orbital Universe
 */

(function () {
    'use strict';

    // =========================================================================
    // 1. PORTFOLIO EXPEDITIONS & PILLARS DATA
    // =========================================================================
    const PORTFOLIO_DATA = {
        watermark: 'INNOVATION',
        section1Badge: 'Signature Works',
        section1Title: 'The Engineering Expeditions',
        section1Sub: 'Traverse 3D panoramic portals showcasing my flagship mobile systems, modern web platforms, and enterprise network architectures.',
        
        // 4 Signature Project Portals along the 3D Winding Trail
        projects: [
            {
                id: 'core-rider',
                badge: 'BitHack 2026 Runner-Up',
                badgeClass: 'badge-gold',
                highlight: 'Inter-Campus Hackathon Distinction',
                title: 'Core Rider (Smart Mobility)',
                desc: 'On-demand campus micro-mobility and peer ride-pooling mobile application conceived and prototyped at BitHack 2026 (EUSL Trincomalee Campus). Features live Google Maps telemetry, optimal route mapping, and emergency passenger SOS dispatch.',
                tags: ['Flutter (Dart)', 'Firebase Auth', 'Cloud Firestore', 'Node.js', 'Google Maps SDK'],
                image: 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?auto=format&fit=crop&w=1000&q=80',
                fallbackGradient: 'linear-gradient(135deg, #1e1b4b 0%, #312e81 50%, #4338ca 100%)',
                categoryLabel: 'Mobile App Engineering &bull; Smart Mobility',
                metricBadge: 'BitHack 2026 Award',
                techHighlight: 'Flutter &bull; Firebase &bull; Node.js',
                buttonText: 'View Project Details',
                targetModal: '#modalProjectCoreRider'
            },
            {
                id: 'lanka-travellers',
                badge: 'Flagship Web Platform',
                badgeClass: 'badge-emerald',
                highlight: 'High-Performance Web Architecture',
                title: 'Lanka Travellers Platform',
                desc: 'A responsive, accessible, and high-performance multi-page travel agency web platform built with semantic HTML5, modern CSS3, and vanilla JavaScript. Features dynamic URL-based package pre-selection, touch-optimized mobile navigation, and automated dark mode adaptation.',
                tags: ['Semantic HTML5', 'Modern CSS3', 'Vanilla JS', 'Dark Mode', 'Responsive UI'],
                image: 'https://images.unsplash.com/photo-1546708973-b339540b5162?auto=format&fit=crop&w=1000&q=80',
                fallbackGradient: 'linear-gradient(135deg, #064e3b 0%, #065f46 50%, #0f766e 100%)',
                categoryLabel: 'Modern Web Development &bull; Tourism',
                metricBadge: 'Production Web App',
                techHighlight: 'HTML5 &bull; CSS3 &bull; Vanilla JS',
                buttonText: 'View Project Details',
                targetModal: '#modalProjectLankaTravellers'
            },
            {
                id: 'portfolio-sys',
                badge: 'Full-Stack PHP System',
                badgeClass: 'badge-blue',
                highlight: 'Modular Backend & Live Database',
                title: 'USJ Academic Portfolio',
                desc: 'Full-stack personal portfolio system architected with modular PHP include templates, Bootstrap 5 UI, and a resilient database integration. Includes safe MySQL connection handling with auto-provisioning and local backup file parsing.',
                tags: ['PHP 8.2', 'MySQL / MariaDB', 'Bootstrap 5', 'Form Sanitization', 'Admin Inbox'],
                image: 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=1000&q=80',
                fallbackGradient: 'linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #2563eb 100%)',
                categoryLabel: 'Full-Stack Web &bull; USJ FHSS',
                metricBadge: 'DIT Year 2026',
                techHighlight: 'PHP 8.2 &bull; MySQL &bull; Bootstrap 5',
                buttonText: 'View Architecture',
                targetModal: '#modalProjectPortfolio'
            },
            {
                id: 'network-infra',
                badge: 'Cisco Systems Simulation',
                badgeClass: 'badge-cyan',
                highlight: 'High-Availability Campus Network',
                title: 'Campus Network Infrastructure',
                desc: 'Enterprise multi-building campus network topology architected with inter-VLAN routing, dynamic OSPF, DHCP redundancy, VLSM subnet design, and access-control list (ACL) packet firewalls.',
                tags: ['Cisco Packet Tracer', 'VLSM Subnetting', 'VLAN Trunking', 'OSPF', 'Network Security'],
                image: 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=1000&q=80',
                fallbackGradient: 'linear-gradient(135deg, #042f24 0%, #065f46 50%, #0d9488 100%)',
                categoryLabel: 'Enterprise Networking &bull; Cisco Lab',
                metricBadge: 'Cisco Certified Simulation',
                techHighlight: 'VLSM &bull; VLANs &bull; OSPF &bull; ACLs',
                buttonText: 'View Network Specs',
                targetModal: '#modalProjectNetwork'
            }
        ],

        // 4 Pillars Orbiting in 3D around Developer Emblem
        section2Badge: 'Why Choose Fazal',
        section2Title: 'Core Engineering Pillars',
        section2Sub: 'A floating 3D orbital experience representing the technical disciplines, university rigor, and problem-solving passion driving my work.',
        pillars: [
            {
                icon: 'fa-solid fa-trophy',
                iconColor: 'text-warning',
                title: 'Award-Winning Innovation',
                desc: 'Proven engineering stamina under competitive pressure, earning Runner-Up honors at BitHack 2026 (EUSL Trincomalee Campus) with rapid real-world prototyping.'
            },
            {
                icon: 'fa-solid fa-laptop-code',
                iconColor: 'text-primary',
                title: 'Full-Stack Technical Craft',
                desc: 'Proficient in semantic HTML5/CSS3, responsive Bootstrap 5, modular PHP server-side architectures, and relational MySQL database modeling.'
            },
            {
                icon: 'fa-solid fa-network-wired',
                iconColor: 'text-success',
                title: 'Enterprise Systems & Networks',
                desc: 'Strong university-trained understanding of computer networking, IPv4/IPv6 VLSM subnetting, switching, VLAN trunking, and Cisco routing protocols.'
            },
            {
                icon: 'fa-solid fa-graduation-cap',
                iconColor: 'text-info',
                title: 'USJ Academic Rigor & Drive',
                desc: 'Diploma in Information Technology student at University of Sri Jayewardenepura, driven by continuous learning, clean documentation, and dedication.'
            }
        ]
    };

    let currentProjectIndex = 0;
    let currentPillarIndex = 0;
    let autoRotateInterval = null;
    let isHovering = false;

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
        const PARTICLE_COUNT = 40;

        for (let i = 0; i < PARTICLE_COUNT; i++) {
            particles.push({
                x: Math.random() * width,
                y: Math.random() * height,
                radius: Math.random() * 2 + 0.8,
                speedX: (Math.random() - 0.5) * 0.4,
                speedY: (Math.random() - 0.5) * 0.3,
                alpha: Math.random() * 0.7 + 0.2,
                alphaSpeed: Math.random() * 0.015 + 0.005,
                isGold: Math.random() > 0.4
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
    // 3. SECTION 1: 3D WINDING TRAIL PROJECT CARDS
    // =========================================================================
    function renderSection1Cards() {
        const container = document.getElementById('portalCardsStage');
        if (!container) return;

        container.innerHTML = '';

        PORTFOLIO_DATA.projects.forEach((item, index) => {
            const cardEl = document.createElement('div');
            cardEl.className = 'portal-card';
            cardEl.setAttribute('data-index', index);

            cardEl.innerHTML = `
                <div class="portal-image-container" style="background: ${item.fallbackGradient};">
                    <img src="${item.image}" alt="${item.title}" class="portal-card-img" 
                         onerror="this.onerror=null; this.style.display='none';">
                    <div class="portal-image-overlay"></div>
                    <span class="portal-badge-pill ${item.badgeClass}">${item.badge}</span>
                    <span class="portal-rating-pill">${item.highlight}</span>
                </div>
                <div class="portal-card-body">
                    <h3 class="portal-card-title">${item.title}</h3>
                    <p class="portal-card-desc">${item.desc}</p>
                    <div class="portal-meta-tags">
                        ${item.tags.map((t) => `<span class="portal-tag">${t}</span>`).join('')}
                    </div>
                </div>
            `;

            cardEl.addEventListener('click', () => {
                setProjectIndex(index);
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

            const diff = (i - currentProjectIndex + total) % total;

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

        updateBottomDock();
    }

    function updateBottomDock() {
        const activeItem = PORTFOLIO_DATA.projects[currentProjectIndex];
        if (!activeItem) return;

        const dockPackage = document.getElementById('dockPackageName');
        const dockDuration = document.getElementById('dockDuration');
        const dockPrice = document.getElementById('dockPrice');
        const dockPriceSub = document.getElementById('dockPriceSub');
        const dockActionBtn = document.getElementById('dockActionBtn');
        const dockLabel = document.getElementById('dockTitleLabel');

        if (dockLabel) dockLabel.textContent = activeItem.categoryLabel;
        if (dockPackage) dockPackage.textContent = activeItem.title;
        if (dockDuration) dockDuration.innerHTML = `<i class="fa-solid fa-award me-1 text-warning"></i> ${activeItem.metricBadge}`;
        if (dockPrice) dockPrice.textContent = activeItem.metricBadge;
        if (dockPriceSub) dockPriceSub.innerHTML = activeItem.techHighlight;

        if (dockActionBtn) {
            dockActionBtn.innerHTML = `<span>${activeItem.buttonText}</span> <i class="fa-solid fa-arrow-right-long ms-1"></i>`;
            dockActionBtn.setAttribute('data-bs-toggle', 'modal');
            dockActionBtn.setAttribute('data-bs-target', activeItem.targetModal);
        }
    }

    function setProjectIndex(newIndex) {
        const total = PORTFOLIO_DATA.projects.length;
        currentProjectIndex = (newIndex + total) % total;
        updateSection1Positions();
    }

    // =========================================================================
    // 4. SECTION 2: 3D ORBITAL UNIVERSE AROUND DEVELOPER EMBLEM
    // =========================================================================
    function renderSection2Pillars() {
        const stage = document.getElementById('orbitalParallaxStage');
        if (!stage) return;

        const watermark = document.getElementById('orbitalWatermark');
        if (watermark) watermark.textContent = PORTFOLIO_DATA.watermark;

        const existingCards = stage.querySelectorAll('.orbital-card');
        existingCards.forEach((c) => c.remove());

        PORTFOLIO_DATA.pillars.forEach((item, index) => {
            const cardEl = document.createElement('div');
            cardEl.className = 'orbital-card';
            cardEl.setAttribute('data-pillar-index', index);

            cardEl.innerHTML = `
                <div class="orbital-icon-box">
                    <i class="${item.icon} ${item.iconColor}"></i>
                </div>
                <h4 class="orbital-card-title">${item.title}</h4>
                <p class="orbital-card-text">${item.desc}</p>
            `;

            cardEl.addEventListener('click', () => {
                setPillarIndex(index);
            });

            stage.appendChild(cardEl);
        });

        renderOrbitalDots();
        updateOrbitalPositions();
    }

    function renderOrbitalDots() {
        const nav = document.getElementById('orbitalProgressNav');
        if (!nav) return;

        nav.innerHTML = '';

        PORTFOLIO_DATA.pillars.forEach((item, index) => {
            const btn = document.createElement('button');
            btn.className = `orbital-dot-btn ${index === currentPillarIndex ? 'active' : ''}`;
            btn.setAttribute('aria-label', item.title);

            btn.innerHTML = `
                <span class="orbital-dot-label">${item.title}</span>
                <span class="orbital-dot-circle"></span>
            `;

            btn.addEventListener('click', () => {
                setPillarIndex(index);
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

            const offset = (i - currentPillarIndex + total) % total;
            card.classList.add(`orbit-pos-${offset}`);
        });

        const dots = document.querySelectorAll('.orbital-dot-btn');
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === currentPillarIndex);
        });
    }

    function setPillarIndex(index) {
        const total = PORTFOLIO_DATA.pillars.length;
        currentPillarIndex = (index + total) % total;
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
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;

            targetRotateY = x * 22;
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
    // 6. SCROLL & CONTROLS BINDING
    // =========================================================================
    function bindControls() {
        const prevBtn = document.getElementById('trailPrevBtn');
        const nextBtn = document.getElementById('trailNextBtn');

        if (prevBtn) prevBtn.addEventListener('click', () => setProjectIndex(currentProjectIndex - 1));
        if (nextBtn) nextBtn.addEventListener('click', () => setProjectIndex(currentProjectIndex + 1));

        window.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') setProjectIndex(currentProjectIndex - 1);
            if (e.key === 'ArrowRight') setProjectIndex(currentProjectIndex + 1);
        });

        // Wheel navigation on Section 1
        const sec1 = document.getElementById('expeditionsSection');
        if (sec1) {
            let lastScrollTime = 0;
            sec1.addEventListener('wheel', (e) => {
                const now = Date.now();
                if (now - lastScrollTime > 600 && Math.abs(e.deltaY) > 25) {
                    if (e.deltaY > 0) {
                        setProjectIndex(currentProjectIndex + 1);
                    } else {
                        setProjectIndex(currentProjectIndex - 1);
                    }
                    lastScrollTime = now;
                }
            }, { passive: true });

            sec1.addEventListener('mouseenter', () => { isHovering = true; });
            sec1.addEventListener('mouseleave', () => { isHovering = false; });
        }

        // Auto-rotation every 7 seconds when user is not actively interacting
        autoRotateInterval = setInterval(() => {
            if (!isHovering) {
                setProjectIndex(currentProjectIndex + 1);
                setPillarIndex(currentPillarIndex + 1);
            }
        }, 7000);
    }

    // =========================================================================
    // INITIALIZATION ENTRYPOINT
    // =========================================================================
    document.addEventListener('DOMContentLoaded', () => {
        initFireflyCanvas();
        renderSection1Cards();
        renderSection2Pillars();
        initOrbitalMouseParallax();
        bindControls();
    });

})();
