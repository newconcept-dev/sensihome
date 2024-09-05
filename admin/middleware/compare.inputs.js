document.addEventListener('DOMContentLoaded', function() {
    function compareInputs(input1, input2) {
        const inputElement1 = document.querySelector(input1);
        const inputElement2 = document.querySelector(input2);

        if (inputElement1 && inputElement2) {
            function checkEquality() {
                if (inputElement1.value === inputElement2.value) {
                    inputElement1.style.borderColor = 'green';
                    inputElement2.style.borderColor = 'green';
                    setTimeout(() => {
                        inputElement1.style.borderColor = '';
                        inputElement2.style.borderColor = '';
                    }, 1000);
                    return true;
                } else {
                    inputElement1.style.borderColor = 'red';
                    inputElement2.style.borderColor = 'red';
                    return false;
                }
            }

            inputElement1.addEventListener('input', checkEquality);
            inputElement2.addEventListener('input', checkEquality);

            return checkEquality;
        }
    }

    // Ejemplo de uso:
    window.checkPasswordEquality = compareInputs('#password', '#confirm_password');
});