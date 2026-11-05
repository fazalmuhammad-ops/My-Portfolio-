/**
 * Interactive Portfolio Hero Video Controller (Sri Tech-Style Interactive Hero)
 * Powered by: HTML5 High-Performance Video Engine & 3-Zone Cursor Tracker
 * 
 * Timeline Segments (8-second video sequence):
 * - WORKING (0.0s - 1.9s): Typing / Working on laptop
 * - LEFT (2.0s - 3.6s): Notices something & looks left
 * - RIGHT (3.7s - 5.2s): Looks right
 * - CENTER (5.3s - 8.0s): Notices visitor, removes headset, waves hello, points down
 */

(function () {
    'use strict';

    const TIMELINES = {
        working: { start: 0.0, end: 1.9, loop: true },
        left:    { start: 2.0, end: 3.6, hold: 2800 },
        right:   { start: 3.7, end: 5.2, hold: 2800 },
        center:  { start: 5.3, end: 7.95, hold: 7200 }
    };

    const MESSAGES = {
        working: {
            tag: 'Live Coding Environment',
            title: 'Full-Stack Engineering',
            desc: 'Building responsive web platforms, networking architectures, and modern systems.'
        },
        left: {
            tag: 'Left Interaction Zone',
            title: 'Anyone here on the left?',
            desc: 'Observing campus networking topology and user interfaces on the left monitor.'
        },
        right: {
            tag: 'Right Interaction Zone',
            title: 'Anyone here on the right?',
            desc: 'Scanning real-time database queries and application telemetry on the right.'
        },
        center: [
            {
                tag: 'Main Greeting',
                title: "Hey, it's you!",
                desc: 'Delighted to connect with you. Thanks for visiting my academic portfolio.'
            },
            {
                tag: 'Welcome Visitor',
                title: 'Hiiii!',
                desc: 'Explore my university projects, BitHack award achievements, and technical skills.'
            },
            {
                tag: 'Explore Below',
                title: 'Check out the portfolio',
                desc: 'Scroll down to traverse the 3D Signature Expeditions and core pillars.'
            }
        ]
    };

    let currentState = 'working';
    let holdTimer = null;
    let centerMessageInterval = null;
    let centerMessageIndex = 0;

    // DOM Elements
    let heroSection = null;
    let video = null;
    let videoStatusText = null;
    let reactionTag = null;
    let reactionText = null;
    let reactionDesc = null;

    /**
     * Switch state and seek/play corresponding video segment
     */
    function applyState(newState) {
        if (!heroSection || !video) return;

        currentState = newState;

        // Update CSS classes
        heroSection.classList.remove('state-working', 'state-left', 'state-right', 'state-center');
        heroSection.classList.add(`state-${newState}`);

        // Update status pill text
        if (videoStatusText) {
            const labels = {
                working: 'Coding & Modeling',
                left: 'Looking Left',
                right: 'Looking Right',
                center: 'Greeting Visitor'
            };
            videoStatusText.textContent = labels[newState] || 'Active';
        }

        // Clear existing message interval
        if (centerMessageInterval) {
            clearInterval(centerMessageInterval);
            centerMessageInterval = null;
        }

        // Seek video to target segment
        const segment = TIMELINES[newState] || TIMELINES.working;
        video.currentTime = segment.start;
        const playPromise = video.play();
        if (playPromise !== undefined) {
            playPromise.catch(() => {
                // Autoplay policy handled safely
            });
        }

        // Update Reaction Text
        if (newState === 'center') {
            centerMessageIndex = 0;
            displayCenterMessage(0);

            centerMessageInterval = setInterval(() => {
                centerMessageIndex = (centerMessageIndex + 1) % MESSAGES.center.length;
                displayCenterMessage(centerMessageIndex);
            }, 2300);

        } else {
            const data = MESSAGES[newState] || MESSAGES.working;
            updateReactionBox(data.tag, data.title, data.desc);
        }
    }

    function displayCenterMessage(index) {
        const item = MESSAGES.center[index];
        if (item) {
            updateReactionBox(item.tag, item.title, item.desc);
        }
    }

    function updateReactionBox(tag, title, desc) {
        if (reactionTag) reactionTag.textContent = tag;
        if (reactionText) {
            reactionText.style.opacity = '0';
            setTimeout(() => {
                reactionText.textContent = title;
                reactionText.style.opacity = '1';
            }, 120);
        }
        if (reactionDesc) reactionDesc.textContent = desc;
    }

    /**
     * Trigger a zone reaction with automatic hold timer before returning to normal working state
     */
    function triggerZoneReaction(zone) {
        if (holdTimer) {
            clearTimeout(holdTimer);
            holdTimer = null;
        }

        applyState(zone);

        const segment = TIMELINES[zone];
        if (segment && segment.hold) {
            holdTimer = setTimeout(() => {
                applyState('working');
            }, segment.hold);
        }
    }

    /**
     * Video Time Update Watcher - Loops segments smoothly
     */
    function setupVideoLoop() {
        if (!video) return;

        video.addEventListener('timeupdate', () => {
            const segment = TIMELINES[currentState];
            if (!segment) return;

            if (currentState === 'working') {
                // Loop the working segment
                if (video.currentTime >= segment.end) {
                    video.currentTime = segment.start;
                }
            } else {
                // Pause at end of reaction segment
                if (video.currentTime >= segment.end) {
                    video.pause();
                }
            }
        });

        // Ensure video is muted for policy compliance
        video.muted = true;
        video.playsInline = true;
    }

    /**
     * 3D Mouse Parallax Tilt on the Video Card
     */
    function setupMouseParallax() {
        const stage = document.getElementById('interactiveHeroSection');
        const card = document.getElementById('videoHeroCard');
        if (!stage || !card) return;

        let targetRotX = 0;
        let targetRotY = 0;
        let currentRotX = 0;
        let currentRotY = 0;

        stage.addEventListener('mousemove', (e) => {
            if (window.innerWidth <= 991.98) return;
            const rect = stage.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;

            targetRotY = x * 16;
            targetRotX = -y * 12;
        });

        stage.addEventListener('mouseleave', () => {
            targetRotX = 0;
            targetRotY = 0;
        });

        function renderParallax() {
            currentRotX += (targetRotX - currentRotX) * 0.08;
            currentRotY += (targetRotY - currentRotY) * 0.08;

            if (currentState === 'working') {
                card.style.transform = `perspective(1000px) rotateX(${currentRotX.toFixed(2)}deg) rotateY(${currentRotY.toFixed(2)}deg) scale(0.98)`;
            }

            requestAnimationFrame(renderParallax);
        }

        renderParallax();
    }

    /**
     * Setup 3 Horizontal Interaction Zones
     */
    function initInteractiveHero() {
        heroSection = document.getElementById('interactiveHeroSection');
        video = document.getElementById('heroVideo');
        videoStatusText = document.getElementById('videoStatusText');

        reactionTag = document.getElementById('reactionTag');
        reactionText = document.getElementById('reactionText');
        reactionDesc = document.getElementById('reactionDesc');

        if (!heroSection || !video) return;

        setupVideoLoop();
        setupMouseParallax();

        const zoneLeft = document.getElementById('zoneLeft');
        const zoneCenter = document.getElementById('zoneCenter');
        const zoneRight = document.getElementById('zoneRight');

        const isMobile = window.innerWidth <= 991.98;

        if (isMobile) {
            // On mobile, focus on the welcoming center greeting
            applyState('center');
            return;
        }

        // Start in normal working state
        applyState('working');

        // Zone Event Listeners
        if (zoneLeft) {
            zoneLeft.addEventListener('mouseenter', () => {
                triggerZoneReaction('left');
            });
        }

        if (zoneRight) {
            zoneRight.addEventListener('mouseenter', () => {
                triggerZoneReaction('right');
            });
        }

        if (zoneCenter) {
            zoneCenter.addEventListener('mouseenter', () => {
                triggerZoneReaction('center');
            });
        }

        // Click on video toggles greeting
        const card = document.getElementById('videoHeroCard');
        if (card) {
            card.addEventListener('click', () => {
                triggerZoneReaction('center');
            });
        }

        // Resize check
        window.addEventListener('resize', () => {
            const nowMobile = window.innerWidth <= 991.98;
            if (nowMobile && currentState !== 'center') {
                applyState('center');
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initInteractiveHero);
    } else {
        initInteractiveHero();
    }

})();
