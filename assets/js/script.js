document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');
    const icon = hamburger.querySelector('i');

    // Only run if the elements exist on the page
    if (hamburger && navLinks) {
        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            // Toggle the icon between hamburger and close
            if (navLinks.classList.contains('active')) {
                icon.classList.replace('fa-bars', 'fa-xmark');
                document.body.style.overflow = 'hidden'; // Stop background scrolling
            } else {
                icon.classList.replace('fa-xmark', 'fa-bars');
                document.body.style.overflow = 'auto'; // Allow scrolling again
            }
        });
    }
});