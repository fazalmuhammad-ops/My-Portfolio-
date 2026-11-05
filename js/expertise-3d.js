/**
 * 3D Areas of Expertise - Interactive Parallax Tilt & Holographic Lighting Engine
 * A.A. Fazal Muhammad - Academic Portfolio
 */

(function () {
    'use strict';

    function init3DExpertiseCards() {
        const cardWraps = document.querySelectorAll('.card-3d-wrap');
        if (!cardWraps || cardWraps.length === 0) return;

        cardWraps.forEach((wrap) => {
            const inner = wrap.querySelector('.card-3d-inner');
            const glare = wrap.querySelector('.card-3d-glare');
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

                // Max tilt angle 18 degrees
                targetRotY = (x - 0.5) * 26;
                targetRotX = -(y - 0.5) * 22;

                // Move dynamic glare reflection
                if (glare) {
                    const glareX = (x * 100).toFixed(1);
                    const glareY = (y * 100).toFixed(1);
                    glare.style.background = `radial-gradient(circle at ${glareX}% ${glareY}%, rgba(255, 255, 255, 0.22) 0%, transparent 65%)`;
                }
            });

            wrap.addEventListener('mouseleave', () => {
                isHovering = false;
                targetRotX = 0;
                targetRotY = 0;
            });

            // Smooth interpolation loop with requestAnimationFrame
            function animateCard() {
                currentRotX += (targetRotX - currentRotX) * 0.12;
                currentRotY += (targetRotY - currentRotY) * 0.12;

                if (isHovering || Math.abs(currentRotX) > 0.05 || Math.abs(currentRotY) > 0.05) {
                    inner.style.transform = `perspective(1200px) rotateX(${currentRotX.toFixed(2)}deg) rotateY(${currentRotY.toFixed(2)}deg) translateZ(15px)`;
                } else {
                    inner.style.transform = `perspective(1200px) rotateX(0deg) rotateY(0deg) translateZ(0px)`;
                }

                requestAnimationFrame(animateCard);
            }

            animateCard();
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init3DExpertiseCards);
    } else {
        init3DExpertiseCards();
    }

})();
