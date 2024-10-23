document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    const navResponsive = document.querySelector('.nav__responsive');
    const closeSearch = document.getElementById('close-search-responsive');
    const searchViewResponsive = document.querySelector('.searchView__responsive');
    const searchOpenResponsive = document.getElementById('search-open-responsive');

    function toggleVisibility(element, show) {
        if (show) {
            element.classList.remove('hidden');
            element.style.display = 'flex';
        } else {
            element.classList.add('hidden');
            element.style.display = 'none';
        }
    }

    function hideAll() {
        toggleVisibility(navResponsive, false);
        toggleVisibility(searchViewResponsive, false);
    }

    menuToggle.addEventListener('click', function(event) {
        event.preventDefault(); // Previene el comportamiento por defecto del enlace
        const isHidden = navResponsive.classList.contains('hidden');
        hideAll();
        toggleVisibility(navResponsive, isHidden);
    });

    closeSearch.addEventListener('click', function(event) {
        event.preventDefault(); // Previene el comportamiento por defecto del enlace
        toggleVisibility(searchViewResponsive, false);
    });

    searchOpenResponsive.addEventListener('click', function(event) {
        event.preventDefault(); // Previene el comportamiento por defecto del enlace
        const isHidden = searchViewResponsive.classList.contains('hidden');
        hideAll();
        toggleVisibility(searchViewResponsive, isHidden);
    });
});