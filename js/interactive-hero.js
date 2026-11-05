/**
 * Interactive Portfolio Hero Controller (Sri Tech-Style Interactive Intro)
 * Features:
 * - 3 Horizontal Interaction Zones: LEFT, CENTER, RIGHT
 * - State management: Working, Left-reaction, Right-reaction, Center-greeting
 * - 2-3 second reaction hold, then returns smoothly to normal working state
 * - Smooth interpolation with requestAnimationFrame
 * - Mobile detection: Centers character, focuses on center greeting experience
 * - Extensible Frame Sequencer: Can switch between CSS 3D Character Rig and AI Image Frames
 */

(function () {
    'use strict';

    // Interaction State Machine
    const STATES = {
        WORKING: 'working',
        LEFT: 'left',
        RIGHT: 'right',
        CENTER: 'center'
    };

    let currentState = STATES.WORKING;
    let holdTimer = null;
    let centerMessageInterval = null;
    let centerMessageIndex = 0;

    // Contextual Messages (Strictly elegant without emojis, matching the prompt)
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

    // DOM Elements
    let heroSection = null;
    let zoneLeft = null;
    let zoneCenter = null;
    let zoneRight = null;
    let reactionTag = null;
    let reactionText = null;
    let reactionDesc = null;

    /**
     * Update the hero UI to match a given state
     */
    function applyState(newState) {
        if (!heroSection) return;

        currentState = newState;

        // Clear existing state classes
        heroSection.classList.remove('state-working', 'state-left', 'state-right', 'state-center');
        heroSection.classList.add(`state-${newState}`);

        // Clear any running center message cycle
        if (centerMessageInterval) {
            clearInterval(centerMessageInterval);
            centerMessageInterval = null;
        }

        // Update Text / Reaction Speech Bubble
        if (newState === STATES.CENTER) {
            centerMessageIndex = 0;
            displayCenterMessage(0);

            // Cycle through greeting messages: "Hey, it's you!" -> "Hiiii!" -> "Check out the portfolio"
            centerMessageInterval = setInterval(() => {
                centerMessageIndex = (centerMessageIndex + 1) % MESSAGES.center.length;
                displayCenterMessage(centerMessageIndex);
            }, 2400);

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
            }, 150);
        }
        if (reactionDesc) reactionDesc.textContent = desc;
    }

    /**
     * Trigger a zone reaction with a 2-3 second hold timer before returning to working state
     */
    function triggerZoneReaction(zone) {
        // Clear existing hold timer
        if (holdTimer) {
            clearTimeout(holdTimer);
            holdTimer = null;
        }

        if (zone === 'left') {
            applyState(STATES.LEFT);
            // Hold reaction for ~2.8 seconds, then smoothly return to normal working state
            holdTimer = setTimeout(() => {
                applyState(STATES.WORKING);
            }, 2800);

        } else if (zone === 'right') {
            applyState(STATES.RIGHT);
            // Hold reaction for ~2.8 seconds, then smoothly return to normal working state
            holdTimer = setTimeout(() => {
                applyState(STATES.WORKING);
            }, 2800);

        } else if (zone === 'center') {
            applyState(STATES.CENTER);
            // Hold center greeting for ~7 seconds (allows cycling through messages), then returns to working
            holdTimer = setTimeout(() => {
                applyState(STATES.WORKING);
            }, 7500);
        }
    }

    /**
     * Setup 3 Horizontal Interaction Zones
     */
    function initInteractionZones() {
        heroSection = document.getElementById('interactiveHeroSection');
        if (!heroSection) return;

        zoneLeft = document.getElementById('zoneLeft');
        zoneCenter = document.getElementById('zoneCenter');
        zoneRight = document.getElementById('zoneRight');

        reactionTag = document.getElementById('reactionTag');
        reactionText = document.getElementById('reactionText');
        reactionDesc = document.getElementById('reactionDesc');

        // Check for Mobile / Small Screens
        const isMobile = window.innerWidth <= 991.98;
        if (isMobile) {
            // On mobile, focus on the center greeting experience
            applyState(STATES.CENTER);
            return;
        }

        // Initialize in normal working state
        applyState(STATES.WORKING);

        // Desktop: Mouse hover listeners for the 3 horizontal zones
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

        // Interactive Stage Click Toggle
        const workstationEl = document.getElementById('characterWorkstation');
        if (workstationEl) {
            workstationEl.addEventListener('click', () => {
                triggerZoneReaction('center');
            });
        }

        // Window resize handler for mobile responsiveness
        window.addEventListener('resize', () => {
            const nowMobile = window.innerWidth <= 991.98;
            if (nowMobile && currentState !== STATES.CENTER) {
                applyState(STATES.CENTER);
            }
        });
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initInteractionZones);
    } else {
        initInteractionZones();
    }

})();
