/**
 * 3D Contact Hub - Interactive Holographic Communication Terminal Engine
 * A.A. Fazal Muhammad - Academic & Developer Portfolio
 * Features:
 * 1. 3D Mouse Parallax Tilt & Specular Glare Tracking
 * 2. Multi-Layer 3D Depth Layering (preserve-3d)
 * 3. Mobile Device Gyroscope Orientation Tilt
 * 4. Interactive Input Field Depth Elevations
 * 5. Smooth Client-Side Validation Feedback
 */

(function () {
    'use strict';

    function init3DContactEngine() {
        const stage = document.querySelector('.contact-3d-stage');
        if (!stage) return;

        // =====================================================================
        // 1. INTERACTIVE 3D PARALLAX TILT & SPECULAR GLARE
        // =====================================================================
        const cardWraps = document.querySelectorAll('.contact-3d-wrap');

        cardWraps.forEach((wrap) => {
            const inner = wrap.querySelector('.contact-3d-inner');
            const glare = wrap.querySelector('.contact-3d-glare');
            if (!inner) return;

            let targetRotX = 0;
            let targetRotY = 0;
            let currentRotX = 0;
            let currentRotY = 0;
            let isHovering = false;

            wrap.addEventListener('mousemove', (e) => {
                isHovering = true;
                const rect = wrap.getBoundingClientRect();
                const x = (e.clientX - rect.left) / rect.width;
                const y = (e.clientY - rect.top) / rect.height;

                // Max tilt angle
                targetRotY = (x - 0.5) * 22;
                targetRotX = -(y - 0.5) * 18;

                // Move dynamic glare reflection
                if (glare) {
                    const glareX = (x * 100).toFixed(1);
                    const glareY = (y * 100).toFixed(1);
                    glare.style.opacity = '1';
                    glare.style.background = `radial-gradient(circle at ${glareX}% ${glareY}%, rgba(255, 255, 255, 0.28) 0%, transparent 65%)`;
                }
            });

            wrap.addEventListener('mouseleave', () => {
                isHovering = false;
                targetRotX = 0;
                targetRotY = 0;
                if (glare) {
                    glare.style.opacity = '0';
                }
            });

            // Smooth interpolation loop with requestAnimationFrame
            function animateCard() {
                currentRotX += (targetRotX - currentRotX) * 0.12;
                currentRotY += (targetRotY - currentRotY) * 0.12;

                if (isHovering || Math.abs(currentRotX) > 0.05 || Math.abs(currentRotY) > 0.05) {
                    inner.style.transform = `perspective(1200px) rotateX(${currentRotX.toFixed(2)}deg) rotateY(${currentRotY.toFixed(2)}deg) translateZ(10px)`;
                } else {
                    inner.style.transform = `perspective(1200px) rotateX(0deg) rotateY(0deg) translateZ(0px)`;
                }

                requestAnimationFrame(animateCard);
            }

            requestAnimationFrame(animateCard);
        });

        // =====================================================================
        // 2. MOBILE GYROSCOPE ORIENTATION TILT
        // =====================================================================
        if (window.DeviceOrientationEvent && window.innerWidth <= 768) {
            window.addEventListener('deviceorientation', (e) => {
                if (e.gamma !== null && e.beta !== null) {
                    const tiltX = Math.max(-10, Math.min(10, (e.beta - 45) * 0.25));
                    const tiltY = Math.max(-12, Math.min(12, e.gamma * 0.35));

                    cardWraps.forEach((wrap) => {
                        const inner = wrap.querySelector('.contact-3d-inner');
                        if (inner) {
                            inner.style.transform = `perspective(1000px) rotateX(${-tiltX.toFixed(2)}deg) rotateY(${tiltY.toFixed(2)}deg)`;
                        }
                    });
                }
            }, { passive: true });
        }

        // =====================================================================
        // 3. INTERACTIVE INPUT FOCUS & VALIDATION ENHANCEMENTS
        // =====================================================================
        const form = document.getElementById('portfolioContactForm');
        if (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init3DContactEngine);
    } else {
        init3DContactEngine();
    }
})();
