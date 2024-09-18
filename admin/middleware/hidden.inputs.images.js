document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.btn.btn-secondary, .btn.btn-primary');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const targetContainer = document.getElementById(targetId);

            // Ocultar todos los contenedores
            document.querySelectorAll('.product-upload').forEach(container => {
                container.style.display = 'none';
            });

            // Mostrar el contenedor correspondiente
            if (targetContainer) {
                targetContainer.style.display = 'block';
            }

            // Cambiar la clase del botón seleccionado
            buttons.forEach(btn => {
                btn.classList.remove('btn-primary');
                btn.classList.add('btn-secondary');
            });
            this.classList.remove('btn-secondary');
            this.classList.add('btn-primary');
        });
    });

    // Detectar si se ha subido un archivo y cambiar la clase del botón correspondiente
    const fileInputs = [
        'imageUpload-front',
        'left-view-product',
        'straight-view-product',
        'right-view-product',
        'back-view-product'
    ];

    fileInputs.forEach(inputId => {
        const input = document.getElementById(inputId);
        input.addEventListener('change', function() {
            const button = document.querySelector(`button[data-target="container-${this.id}"]`);
            if (this.files && this.files.length > 0) {
                button.classList.remove('btn-secondary', 'btn-primary');
                button.classList.add('btn-success');
            } else {
                button.classList.remove('btn-success');
                button.classList.add('btn-secondary');
            }
        });
    });
});