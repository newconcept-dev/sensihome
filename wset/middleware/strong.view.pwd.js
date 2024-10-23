document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirm_password');
    const minLength = 8; // Define el mínimo de caracteres
    const maxLength = 15; // Define el máximo de caracteres
    const textos = {
        ayuda1: `Tu contraseña debe tener entre ${minLength} y ${maxLength} caracteres.`,
        ayuda2: 'Debe contener caracteres especiales como "!@#$%&*_?".',
        ayuda3: 'Debe contener números, letras minúsculas y mayúsculas.',
        fuerte: '¡Contraseña fuerte!',
        medio: 'Contraseña media',
        debil: 'Contraseña débil'
    };

    function validarFortalezaContraseña(input, textos, minLength, maxLength) {
        const progressBar = document.querySelector('.progress-bar');
        const feedback = document.getElementById('feedback');
        const helpBlock1 = document.getElementById('passwordHelpBlock1');
        const helpBlock2 = document.getElementById('passwordHelpBlock2');
        const helpBlock3 = document.getElementById('passwordHelpBlock3');

        // Actualizar textos de ayuda
        helpBlock1.textContent = textos.ayuda1;
        helpBlock2.textContent = textos.ayuda2;
        helpBlock3.textContent = textos.ayuda3;

        input.addEventListener('input', function() {
            // Habilitar el campo de confirmación de contraseña si el campo de contraseña no está vacío
            if (input.value.length > 0) {
                confirmPasswordInput.disabled = false;
                confirmPasswordInput.style.backgroundColor = '';
            } else {
                confirmPasswordInput.disabled = true;
                confirmPasswordInput.style.backgroundColor = '#e9ecef';
                confirmPasswordInput.value = ''; // Limpiar el campo de confirmación de contraseña
                confirmPasswordInput.style.borderColor = ''; // Restablecer el color del borde
                progressBar.style.width = '0%';
                progressBar.className = 'progress-bar';
                feedback.textContent = '';
                input.dataset.fortaleza = '';
                helpBlock1.style.display = 'block';
                helpBlock2.style.display = 'block';
                helpBlock3.style.display = 'block';
                return;
            }

            // Limitar la longitud de la contraseña
            if (input.value.length > maxLength) {
                input.value = input.value.slice(0, maxLength);
            }

            const value = input.value;
            let fortaleza = 0;

            // Verificar la longitud de la contraseña
            if (value.length >= minLength && value.length <= maxLength) fortaleza += 1;

            // Verificar diferentes tipos de caracteres
            if (/[^A-Za-z0-9]/.test(value)) fortaleza += 1; // Caracteres especiales
            if (/[A-Z]/.test(value) && /[a-z]/.test(value) && /[0-9]/.test(value)) fortaleza += 1; // Letras mayúsculas, minúsculas y números

            // Actualizar la barra de progreso y feedback
            let progreso = (fortaleza / 3) * 100;
            let colorClase = 'bg-danger';
            let feedbackText = textos.debil;

            if (fortaleza === 2) {
                colorClase = 'bg-warning';
                feedbackText = textos.medio;
                input.dataset.fortaleza = 'medio';
            } else if (fortaleza === 3) {
                colorClase = 'bg-success';
                feedbackText = textos.fuerte;
                input.dataset.fortaleza = 'fuerte';
            } else {
                input.dataset.fortaleza = 'debil';
            }

            progressBar.style.width = `${progreso}%`;
            progressBar.className = `progress-bar ${colorClase}`;
            feedback.textContent = feedbackText;
            feedback.style.color = colorClase === 'bg-danger' ? '#dc3545' : colorClase === 'bg-warning' ? '#ffc107' : '#28a745';

            // Mostrar u ocultar los textos de ayuda según la fortaleza de la contraseña
            helpBlock1.style.display = value.length >= minLength && value.length <= maxLength ? 'none' : 'block';
            helpBlock2.style.display = /[^A-Za-z0-9]/.test(value) ? 'none' : 'block';
            helpBlock3.style.display = /[A-Z]/.test(value) && /[a-z]/.test(value) && /[0-9]/.test(value) ? 'none' : 'block';
        });
    }

    function compareInputs(input1, input2) {
        const inputElement1 = document.querySelector(input1);
        const inputElement2 = document.querySelector(input2);

        if (inputElement1 && inputElement2) {
            function checkEquality() {
                if (inputElement1.value !== '' && inputElement2.value !== '') {
                    if (inputElement1.value === inputElement2.value) {
                        inputElement1.style.borderColor = 'green';
                        inputElement2.style.borderColor = 'green';
                        return true;
                    } else {
                        inputElement1.style.borderColor = 'red';
                        inputElement2.style.borderColor = 'red';
                        return false;
                    }
                } else {
                    inputElement1.style.borderColor = '';
                    inputElement2.style.borderColor = '';
                    return false;
                }
            }

            inputElement1.addEventListener('input', checkEquality);
            inputElement2.addEventListener('input', function() {
                // Limitar la longitud del campo de confirmación de contraseña
                if (inputElement2.value.length > maxLength) {
                    inputElement2.value = inputElement2.value.slice(0, maxLength);
                }
                checkEquality();
            });

            return checkEquality;
        }
    }

    validarFortalezaContraseña(passwordInput, textos, minLength, maxLength);
    const checkPasswordEquality = compareInputs('#password', '#confirm_password');

    const form = document.getElementById('formValidated');
    form.addEventListener('submit', function(event) {
        const isPasswordWeak = passwordInput.dataset.fortaleza === 'debil';
        const doPasswordsMatch = checkPasswordEquality();

        if (isPasswordWeak || !doPasswordsMatch) {
            event.preventDefault();
            if (isPasswordWeak) {
                alert('La contraseña es débil. Por favor, elige una contraseña más segura.');
            }
            if (!doPasswordsMatch) {
                alert('Las contraseñas no coinciden. Por favor, verifica e inténtalo de nuevo.');
            }
        }
    });
});