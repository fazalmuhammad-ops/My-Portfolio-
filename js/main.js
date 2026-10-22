/**
 * A.A. Fazal Muhammad - Portfolio Main JavaScript
 * Handles dynamic project filtering, navbar state, and UI interactivity.
 */

document.addEventListener('DOMContentLoaded', function () {
    console.log('Portfolio scripts initialized successfully.');

    // ==========================================
    // 1. Dynamic Project Filtering Logic
    // ==========================================
    const filterButtons = document.querySelectorAll('.filter-btn');
    const projectItems = document.querySelectorAll('.project-item');
    const filterCountText = document.getElementById('filterResultCount');
    const noProjectsAlert = document.getElementById('noProjectsAlert');

    if (filterButtons.length > 0 && projectItems.length > 0) {
        
        /**
         * Filter project items by category
         * @param {string} filterValue - The category string (e.g. 'all', 'web-dev', 'networking', 'database')
         */
        function filterProjects(filterValue) {
            let visibleCount = 0;

            projectItems.forEach(function (item) {
                const itemCategory = item.getAttribute('data-category') || '';
                const categories = itemCategory.split(/\s+/);

                if (filterValue === 'all' || categories.includes(filterValue) || itemCategory === filterValue) {
                    // Show item with smooth transition
                    item.classList.remove('hide');
                    item.style.display = '';
                    item.style.opacity = '0';
                    item.style.transform = 'translateY(15px)';

                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                    }, 50);

                    visibleCount++;
                } else {
                    // Hide item
                    item.style.opacity = '0';
                    item.style.transform = 'translateY(15px)';
                    setTimeout(() => {
                        item.classList.add('hide');
                        item.style.display = 'none';
                    }, 200);
                }
            });

            // Update result counter text
            if (filterCountText) {
                if (filterValue === 'all') {
                    filterCountText.textContent = `Showing all ${visibleCount} projects`;
                } else {
                    filterCountText.textContent = `Showing ${visibleCount} project${visibleCount === 1 ? '' : 's'} in this category`;
                }
            }

            // Show or hide empty alert
            if (noProjectsAlert) {
                if (visibleCount === 0) {
                    noProjectsAlert.classList.remove('d-none');
                } else {
                    noProjectsAlert.classList.add('d-none');
                }
            }
        }

        // Attach click listeners to all filter buttons
        filterButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Update active button state
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                // Get category from data-filter attribute
                const selectedFilter = this.getAttribute('data-filter');
                filterProjects(selectedFilter);
            });
        });

        // Check if there is a URL query parameter like ?filter=web-dev
        const urlParams = new URLSearchParams(window.location.search);
        const categoryParam = urlParams.get('filter');
        if (categoryParam) {
            const targetButton = document.querySelector(`.filter-btn[data-filter="${categoryParam}"]`);
            if (targetButton) {
                targetButton.click();
            }
        }
    }

    // ==========================================
    // 2. Sticky Navbar Styling on Scroll
    // ==========================================
    const navbar = document.getElementById('mainNavbar');
    if (navbar) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 20) {
                navbar.classList.add('shadow');
                navbar.style.paddingTop = '0.5rem';
                navbar.style.paddingBottom = '0.5rem';
            } else {
                navbar.classList.remove('shadow');
                navbar.style.paddingTop = '1rem';
                navbar.style.paddingBottom = '1rem';
            }
        });
    }

    // ==========================================
    // 3. Client-Side Form Validation Feedback
    // ==========================================
    const contactForm = document.getElementById('portfolioContactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function (event) {
            if (!contactForm.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            contactForm.classList.add('was-validated');
        }, false);
    }

    // ==========================================
    // 4. Auto-Scroll to Status Alerts if Present
    // ==========================================
    const statusAlert = document.querySelector('.status-alert-box');
    if (statusAlert) {
        statusAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
});
