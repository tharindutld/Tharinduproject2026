
document.addEventListener("DOMContentLoaded", function () {
    // Optional: Close the offcanvas sidebar on mobile when a link without a collapse toggle is clicked
    const offcanvasElement = document.getElementById('sidebarMenu');
    const navLinks = document.querySelectorAll('#sidebarMenu .nav-link:not([data-bs-toggle="collapse"])');

    if (offcanvasElement) {
        const bsOffcanvas = new bootstrap.Offcanvas(offcanvasElement);
        
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                // Only trigger hide if we are currently in mobile view (offcanvas has 'show' class)
                if (offcanvasElement.classList.contains('show')) {
                    bsOffcanvas.hide();
                }
            });
        });
    }
});