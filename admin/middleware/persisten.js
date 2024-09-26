document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formValidated');
    const formFields = form.elements;

    // Cargar datos del formulario desde localStorage
    const savedData = localStorage.getItem('formData');
    if (savedData) {
        const formData = JSON.parse(savedData);
        const productName = formData['nombre_producto'] || 'Un producto'; // Usar el nombre del producto del campo 'nombre_producto'

        // Mostrar alerta al usuario usando SweetAlert2
        Swal.fire({
            title: `Usted estaba editando el producto: <strong>${productName}</strong> antes de desconectarse.`,
            text: "¿Desea seguir editando este producto?",
            icon: 'warning', // Cambiar a 'info' si lo deseas
            showCancelButton: true,
            confirmButtonText: 'Sí, restaurar datos',
            cancelButtonText: 'No, borrar datos',
            customClass: {
                confirmButton: 'btn-custom-confirm',
                cancelButton: 'btn-custom-cancel'
            },
            
        }).then((result) => {
            if (result.isConfirmed) {
                for (const key in formData) {
                    if (formData.hasOwnProperty(key) && formFields[key]) {
                        if (formFields[key].type === 'checkbox') {
                            formFields[key].checked = formData[key];
                        } else {
                            formFields[key].value = formData[key];
                        }
                    }
                }
                // Hacer visible el div con la clase 'backup'
                document.querySelector('.backup').style.display = 'block';
            } else {
                localStorage.removeItem('formData');
            }
        });
    }

    // Guardar datos del formulario en localStorage
    form.addEventListener('input', function() {
        const formData = {};
        for (let i = 0; i < formFields.length; i++) {
            const field = formFields[i];
            if (field.type !== 'file') {
                if (field.type === 'checkbox') {
                    formData[field.name] = field.checked;
                } else {
                    formData[field.name] = field.value;
                }
            }
        }
        localStorage.setItem('formData', JSON.stringify(formData));
    });

    // Limpiar localStorage al enviar el formulario
    form.addEventListener('submit', function() {
        localStorage.removeItem('formData');
    });

    // Eliminar datos del formulario de localStorage después de una hora
    setTimeout(function() {
        localStorage.removeItem('formData');
    }, 3600000); // 1 hora en milisegundos
});