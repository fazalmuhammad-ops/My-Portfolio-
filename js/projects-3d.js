/**
 * 3D Projects Gallery - Interactive Holographic Showcase Engine
 * A.A. Fazal Muhammad - Academic & Developer Portfolio
 * Features:
 * 1. Real-time 3D Mouse Parallax Tilt with Specular Glare Tracking
 * 2. Multi-Layer 3D Depth Layering (preserve-3d)
 * 3. Dual Viewport Modes: 3D Holographic Grid & 3D Cinematic Deck
 * 4. Mobile Gyroscope Sensor & Touch Swipe Support
 * 5. Full Sync with Category Filtering & Modals
 */

(function () {
    'use strict';

    function init3DProjectsEngine() {
        const stage = document.querySelector('.projects-3d-stage');
        if (!stage) return;

        // =====================================================================
        // 1. INTERACTIVE 3D PARALLAX TILT & SPECULAR GLARE
        // =====================================================================
        const cardWraps = document.querySelectorAll('.card-3d-wrap');

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

                // Max tilt angle
                targetRotY = (x - 0.5) * 26;
                targetRotX = -(y - 0.5) * 22;

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
                    inner.style.transform = `perspective(1200px) rotateX(${currentRotX.toFixed(2)}deg) rotateY(${currentRotY.toFixed(2)}deg) translateZ(12px)`;
                } else {
                    inner.style.transform = `perspective(1200px) rotateX(0deg) rotateY(0deg) translateZ(0px)`;
                }

                requestAnimationFrame(animateCard);
            }

            requestAnimationFrame(animateCard);
        });

        // =====================================================================
        // 2. MOBILE GYROSCOPE TILT SUPPORT
        // =====================================================================
        if (window.DeviceOrientationEvent && window.innerWidth <= 768) {
            window.addEventListener('deviceorientation', (e) => {
                if (e.gamma !== null && e.beta !== null) {
                    const tiltX = Math.max(-12, Math.min(12, (e.beta - 45) * 0.3));
                    const tiltY = Math.max(-14, Math.min(14, e.gamma * 0.4));

                    cardWraps.forEach((wrap) => {
                        const inner = wrap.querySelector('.card-3d-inner');
                        if (inner) {
                            inner.style.transform = `perspective(1000px) rotateX(${-tiltX.toFixed(2)}deg) rotateY(${tiltY.toFixed(2)}deg)`;
                        }
                    });
                }
            }, { passive: true });
        }

        // =====================================================================
        // 3. DUAL VIEWPORT MODE SWITCHER (GRID VS 3D DECK)
        // =====================================================================
        const btnGridView = document.getElementById('btnModeGrid');
        const btnDeckView = document.getElementById('btnModeDeck');
        const gridViewContainer = document.getElementById('gridViewContainer');
        const deckViewContainer = document.getElementById('deckViewContainer');

        let currentMode = 'grid';

        function switchMode(newMode) {
            currentMode = newMode;
            if (newMode === 'deck') {
                if (btnDeckView) btnDeckView.classList.add('active');
                if (btnGridView) btnGridView.classList.remove('active');
                if (gridViewContainer) gridViewContainer.classList.add('hide-for-deck');
                if (deckViewContainer) deckViewContainer.classList.add('active');
                renderDeckView();
            } else {
                if (btnGridView) btnGridView.classList.add('active');
                if (btnDeckView) btnDeckView.classList.remove('active');
                if (gridViewContainer) gridViewContainer.classList.remove('hide-for-deck');
                if (deckViewContainer) deckViewContainer.classList.remove('active');
            }
        }

        if (btnGridView) {
            btnGridView.addEventListener('click', () => switchMode('grid'));
        }
        if (btnDeckView) {
            btnDeckView.addEventListener('click', () => switchMode('deck'));
        }

        // =====================================================================
        // 4. 3D CINEMATIC DECK CAROUSEL ENGINE
        // =====================================================================
        const deckStage = document.getElementById('deckStage');
        const deckBtnPrev = document.getElementById('deckBtnPrev');
        const deckBtnNext = document.getElementById('deckBtnNext');
        const deckIndicators = document.getElementById('deckIndicators');

        let activeDeckIndex = 0;
        let visibleDeckCards = [];

        function getVisibleProjectCards() {
            // Get all project-item elements that are not hidden by category filter
            const allItems = Array.from(document.querySelectorAll('#projectsContainer .project-item'));
            return allItems.filter(item => {
                const isHidden = item.classList.contains('hide') || item.style.display === 'none';
                return !isHidden;
            });
        }

        function renderDeckView() {
            if (!deckStage) return;
            visibleDeckCards = getVisibleProjectCards();
            if (visibleDeckCards.length === 0) return;

            if (activeDeckIndex >= visibleDeckCards.length) {
                activeDeckIndex = 0;
            }

            deckStage.innerHTML = '';

            visibleDeckCards.forEach((item, idx) => {
                // Clone card wrap for deck display
                const wrapClone = item.querySelector('.card-3d-wrap').cloneNode(true);
                const deckItem = document.createElement('div');
                deckItem.className = 'deck-item-3d';
                deckItem.dataset.deckIndex = idx;
                deckItem.appendChild(wrapClone);

                // Re-bind modal triggers on cloned buttons
                const clonedModalBtns = deckItem.querySelectorAll('[data-bs-toggle="modal"]');
                clonedModalBtns.forEach(btn => {
                    btn.addEventListener('click', (ev) => {
                        ev.stopPropagation();
                        const targetModalSelector = btn.getAttribute('data-bs-target');
                        if (targetModalSelector && window.bootstrap && window.bootstrap.Modal) {
                            const modalEl = document.querySelector(targetModalSelector);
                            if (modalEl) {
                                const modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
                                modalInstance.show();
                            }
                        }
                    });
                });

                // Clicking left or right card rotates it to center
                deckItem.addEventListener('click', () => {
                    if (idx !== activeDeckIndex) {
                        activeDeckIndex = idx;
                        updateDeckSlots();
                    }
                });

                deckStage.appendChild(deckItem);
            });

            // Render Dot Indicators
            if (deckIndicators) {
                deckIndicators.innerHTML = '';
                visibleDeckCards.forEach((_, idx) => {
                    const dot = document.createElement('div');
                    dot.className = `deck-dot ${idx === activeDeckIndex ? 'active' : ''}`;
                    dot.addEventListener('click', () => {
                        activeDeckIndex = idx;
                        updateDeckSlots();
                    });
                    deckIndicators.appendChild(dot);
                });
            }

            updateDeckSlots();
        }

        function updateDeckSlots() {
            const deckItems = deckStage.querySelectorAll('.deck-item-3d');
            const total = deckItems.length;
            if (total === 0) return;

            deckItems.forEach((item, idx) => {
                item.classList.remove('slot-center', 'slot-left', 'slot-right', 'slot-hidden');

                if (idx === activeDeckIndex) {
                    item.classList.add('slot-center');
                } else if (idx === (activeDeckIndex - 1 + total) % total) {
                    item.classList.add('slot-left');
                } else if (idx === (activeDeckIndex + 1) % total) {
                    item.classList.add('slot-right');
                } else {
                    item.classList.add('slot-hidden');
                }
            });

            // Update dot indicators
            if (deckIndicators) {
                const dots = deckIndicators.querySelectorAll('.deck-dot');
                dots.forEach((dot, idx) => {
                    dot.classList.toggle('active', idx === activeDeckIndex);
                });
            }
        }

        function deckPrev() {
            if (visibleDeckCards.length <= 1) return;
            activeDeckIndex = (activeDeckIndex - 1 + visibleDeckCards.length) % visibleDeckCards.length;
            updateDeckSlots();
        }

        function deckNext() {
            if (visibleDeckCards.length <= 1) return;
            activeDeckIndex = (activeDeckIndex + 1) % visibleDeckCards.length;
            updateDeckSlots();
        }

        if (deckBtnPrev) deckBtnPrev.addEventListener('click', deckPrev);
        if (deckBtnNext) deckBtnNext.addEventListener('click', deckNext);

        // Keyboard arrow navigation
        window.addEventListener('keydown', (e) => {
            if (currentMode !== 'deck') return;
            if (e.key === 'ArrowLeft') deckPrev();
            if (e.key === 'ArrowRight') deckNext();
        });

        // Touch swipe on mobile
        let touchStartX = 0;
        if (deckStage) {
            deckStage.addEventListener('touchstart', (e) => {
                touchStartX = e.touches[0].clientX;
            }, { passive: true });

            deckStage.addEventListener('touchend', (e) => {
                const touchEndX = e.changedTouches[0].clientX;
                const diff = touchStartX - touchEndX;
                if (Math.abs(diff) > 40) {
                    if (diff > 0) deckNext();
                    else deckPrev();
                }
            }, { passive: true });
        }

        // =====================================================================
        // 5. SYNC WITH CATEGORY FILTERING BUTTONS
        // =====================================================================
        const filterBtns = document.querySelectorAll('.filter-btn, .filter-btn-3d');
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                setTimeout(() => {
                    if (currentMode === 'deck') {
                        renderDeckView();
                    }
                }, 120);
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init3DProjectsEngine);
    } else {
        init3DProjectsEngine();
    }
})();

