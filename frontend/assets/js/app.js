
/* Funcion para Nav bar el menu hamburgesa */
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    const navResponsive = document.querySelector('.nav__responsive');

    menuToggle.addEventListener('click', function(event) {
        event.preventDefault(); // Previene el comportamiento por defecto del enlace
        if (navResponsive.hasAttribute('hidden')) {
            navResponsive.removeAttribute('hidden');
        } else {
            navResponsive.setAttribute('hidden', '');
        }
    });
});