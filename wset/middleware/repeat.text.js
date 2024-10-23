document.addEventListener('DOMContentLoaded', function() {
    // Función para actualizar el nombre completo
    function updateFullName() {
        const nombre = document.querySelector('input[name="nombre"]').value;
        const segundoNombre = document.querySelector('input[name="segundo_nombre"]').value;
        const apellidoPaterno = document.querySelector('input[name="apellido_paterno"]').value;
        const apellidoMaterno = document.querySelector('input[name="apellido_materno"]').value;
        const secondNameStatus = document.querySelector('input[name="second-name-status"]').checked;

        const fullName = secondNameStatus
            ? `${nombre} ${segundoNombre} ${apellidoPaterno} ${apellidoMaterno}`
            : `${nombre} ${apellidoPaterno} ${apellidoMaterno}`;

        document.querySelector('#full-name').textContent = fullName;
    }

    // Actualizar el nombre completo en tiempo real
    document.querySelectorAll('input[name="nombre"], input[name="segundo_nombre"], input[name="apellido_paterno"], input[name="apellido_materno"], input[name="second-name-status"]').forEach(function(input) {
        input.addEventListener('input', updateFullName);
        input.addEventListener('change', updateFullName);
    });

    // Inicializar la actualización del nombre completo
    updateFullName();
});