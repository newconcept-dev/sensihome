/* Funciones para el formulario de materiales */



/* Material 1- Relleno */
document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('material-relleno-input'); // Apuntar al id de checkbox
    const materialContainer = document.getElementById('relleno-container'); // Apuntar al id de material-container
    const rellenoSelect = document.getElementById('relleno-selector'); // Apuntar al id de material-select relleno-selector

    /* Cambiar el color de esta etiqueta junto con el input */
    const textNew = document.getElementById('text-nuevo-relleno');

    /* Iluminar el input nuevo */
    const activeInput = document.getElementById('nuevo-relleno'); // Seleccionar el input directamente por su ID

    

    function mostrarFormMaterial() {
        if (checkbox.checked) {
            /* Mostrar nuevo elemento y estilarlo */
            materialContainer.style.display = 'block';
            activeInput.classList.add('border-success');
            textNew.classList.add('text-success');

            /* Bloquear el select */
            rellenoSelect.disabled = true;
            

        } else {
            materialContainer.style.display = 'none';
            activeInput.classList.remove('border-success');
            textNew.classList.remove('text-success');
            rellenoSelect.disabled = false;
        }
    }

    // Escuchar el evento change del checkbox
    checkbox.addEventListener('change', mostrarFormMaterial);

    activeInput.addEventListener('blur', function() {
        if (activeInput.value.trim() !== "") {
            activeInput.classList.remove('border-success');
        }
    });

    activeInput.addEventListener('focus', function() {
        activeInput.classList.add('border-success');
    });

    // Inicializar la visibilidad del contenedor
    mostrarFormMaterial();
});

/* Material 2- Madera */
document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('material-madera-input'); // Apuntar al id de checkbox
    const materialContainer = document.getElementById('madera-container'); // Apuntar al id de material-container
    const maderaSelect = document.getElementById('madera-selector'); // Apuntar al id de material-select madera-selector

    /* Cambiar el color de esta etiqueta junto con el input */
    const textNew = document.getElementById('text-nueva-madera');

    /* Iluminar el input nuevo */
    const activeInput = document.getElementById('nueva-madera'); // Seleccionar el input directamente por su ID

    

    function mostrarFormMaterial() {
        if (checkbox.checked) {
            /* Mostrar nuevo elemento y estilarlo */
            materialContainer.style.display = 'block';
            activeInput.classList.add('border-success');
            textNew.classList.add('text-success');

            /* Bloquear el select */
            maderaSelect.disabled = true;
            

        } else {
            materialContainer.style.display = 'none';
            activeInput.classList.remove('border-success');
            textNew.classList.remove('text-success');
            maderaSelect.disabled = false;
        }
    }

    // Escuchar el evento change del checkbox
    checkbox.addEventListener('change', mostrarFormMaterial);

    activeInput.addEventListener('blur', function() {
        if (activeInput.value.trim() !== "") {
            activeInput.classList.remove('border-success');
        }
    });

    activeInput.addEventListener('focus', function() {
        activeInput.classList.add('border-success');
    });

    // Inicializar la visibilidad del contenedor
    mostrarFormMaterial();
});

/* Material 3- patas */
document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('material-patas-input'); // Apuntar al id de checkbox
    const materialContainer = document.getElementById('patas-container'); // Apuntar al id de material-container
    const patasSelect = document.getElementById('patas-selector'); // Apuntar al id de material-select patas-selector

    /* Cambiar el color de esta etiqueta junto con el input */
    const textNew = document.getElementById('text-nueva-pata');

    /* Iluminar el input nuevo */
    const activeInput = document.getElementById('nueva-pata'); // Seleccionar el input directamente por su ID

    

    function mostrarFormMaterial() {
        if (checkbox.checked) {
            /* Mostrar nuevo elemento y estilarlo */
            materialContainer.style.display = 'block';
            activeInput.classList.add('border-success');
            textNew.classList.add('text-success');

            /* Bloquear el select */
            patasSelect.disabled = true;
            

        } else {
            materialContainer.style.display = 'none';
            activeInput.classList.remove('border-success');
            textNew.classList.remove('text-success');
            patasSelect.disabled = false;
        }
    }

    // Escuchar el evento change del checkbox
    checkbox.addEventListener('change', mostrarFormMaterial);

    activeInput.addEventListener('blur', function() {
        if (activeInput.value.trim() !== "") {
            activeInput.classList.remove('border-success');
        }
    });

    activeInput.addEventListener('focus', function() {
        activeInput.classList.add('border-success');
    });

    // Inicializar la visibilidad del contenedor
    mostrarFormMaterial();
});

/* Material 4- telas */
document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('material-telas-input'); // Apuntar al id de checkbox
    const materialContainer = document.getElementById('telas-container'); // Apuntar al id de material-container
    const telasSelect = document.getElementById('telas-selector'); // Apuntar al id de material-select telas-selector

    /* Cambiar el color de esta etiqueta junto con el input */
    const textNew = document.getElementById('text-nueva-tela');

    /* Iluminar el input nuevo */
    const activeInput = document.getElementById('nueva-tela'); // Seleccionar el input directamente por su ID

    

    function mostrarFormMaterial() {
        if (checkbox.checked) {
            /* Mostrar nuevo elemento y estilarlo */
            materialContainer.style.display = 'block';
            activeInput.classList.add('border-success');
            textNew.classList.add('text-success');

            /* Bloquear el select */
            telasSelect.disabled = true;
            

        } else {
            materialContainer.style.display = 'none';
            activeInput.classList.remove('border-success');
            textNew.classList.remove('text-success');
            telasSelect.disabled = false;
        }
    }

    // Escuchar el evento change del checkbox
    checkbox.addEventListener('change', mostrarFormMaterial);

    activeInput.addEventListener('blur', function() {
        if (activeInput.value.trim() !== "") {
            activeInput.classList.remove('border-success');
        }
    });

    activeInput.addEventListener('focus', function() {
        activeInput.classList.add('border-success');
    });

    // Inicializar la visibilidad del contenedor
    mostrarFormMaterial();
});
