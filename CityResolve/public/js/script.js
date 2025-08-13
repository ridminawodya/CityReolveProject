/**
 * Toggles the visibility of the mobile sidebar menu.
 * This function is triggered by a click on the mobile menu toggle button.
 */
function toggleMobileMenu() {
    // Toggles the 'show' class on the sidebar element,
    // which controls its visibility via CSS.
    document.getElementById('sidebar').classList.toggle('show');
}

/**
 * Adds a scroll effect to the navbar, changing its background color
 * when the user scrolls down the page.
 */
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    // Changes the navbar's background when scrolled past 100 pixels.
    if (window.scrollY > 100) {
        navbar.style.background = 'rgba(255, 255, 255, 0.98)';
    } else {
        // Resets the background when scrolled back to the top.
        navbar.style.background = 'rgba(255, 255, 255, 0.95)';
    }
});

/**
 * Observes elements with the class 'stat-item' and triggers a number
 * animation when they become visible in the viewport.
 */
const observerOptions = {
    threshold: 0.5, // The animation starts when 50% of the element is visible.
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const statNumber = entry.target.querySelector('.stat-number');
            // Extracts the numerical value to be animated, ignoring non-digits.
            const finalNumber = parseInt(statNumber.textContent.replace(/[^\d]/g, ''));
            animateNumber(statNumber, finalNumber);
            // After the animation starts, stop observing to prevent it from running again.
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Attaches the observer to all elements with the 'stat-item' class.
document.querySelectorAll('.stat-item').forEach(stat => {
    observer.observe(stat);
});

/**
 * Animates a number from 0 up to a target value.
 * @param {HTMLElement} element The HTML element where the number is displayed.
 * @param {number} target The final value the number will reach.
 */
function animateNumber(element, target) {
    let current = 0;
    const increment = target / 100;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer); // Stop the animation when the target is reached.
        }
        // Updates the text content with the animated number, preserving any symbols.
        element.textContent = Math.floor(current).toLocaleString() +
            (element.textContent.includes('%') ? '%' :
            element.textContent.includes('+') ? '+' : '');
    }, 20); // The interval time in milliseconds.
}

// NOTE: The smooth scrolling code for links has been removed to allow navigation
// to other pages. The original code was likely interfering with the default behavior
// of your login and sign-up links.
