(function() {
    // Ambil semua accordion
    const accordions = document.querySelectorAll('.ubea-accordion');
    
    accordions.forEach(accordion => {
        const heading = accordion.querySelector('.ubea-accordion-heading');
        const content = accordion.querySelector('.ubea-accordion-content');
        
        heading.addEventListener('click', () => {
            // Toggle class active
            accordion.classList.toggle('active');
            
            // Toggle tampilan content
            if (accordion.classList.contains('active')) {
                content.style.display = 'block';
            } else {
                content.style.display = 'none';
            }
        });
        
        // Sembunyikan content saat halaman dimuat
        content.style.display = 'none';
    });
})(); 