document.addEventListener('DOMContentLoaded', function() {
    var segundoNombreInput = document.getElementById('segundo_nombre');
    var secondNameStatusCheckbox = document.getElementById('second-name-status');
    var passwordInput = document.getElementById('password');
    var changePasswordStatusCheckbox = document.getElementById('change-password-status');

    // Si el segundo nombre tiene valor, mostrar el input y ocultar el checkbox
    if (segundoNombreInput.value.trim() !== '') {
        segundoNombreInput.style.display = 'block';
        secondNameStatusCheckbox.style.display = 'none';
    } else {
        segundoNombreInput.style.display = 'none';
        secondNameStatusCheckbox.style.display = 'inline-block';
    }

    // Manejar el evento de cambio del checkbox para segundo nombre
    secondNameStatusCheckbox.addEventListener('change', function() {
        if (this.checked) {
            segundoNombreInput.style.display = 'block';
        } else {
            segundoNombreInput.style.display = 'none';
        }
    });

    // Manejar el evento de cambio del checkbox para cambiar contraseña
    changePasswordStatusCheckbox.addEventListener('change', function() {
        if (this.checked) {
            passwordInput.style.display = 'block';
        } else {
            passwordInput.style.display = 'none';
            passwordInput.value = ''; // Limpiar el campo de contraseña si el checkbox no está marcado
        }
    });
});