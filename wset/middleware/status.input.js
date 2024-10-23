document.addEventListener('DOMContentLoaded', function() {
    // Seleccionar todos los inputs, selects y textareas dentro de los elementos con la clase 'active-full'
    const elements = document.querySelectorAll('.active-full input, .active-full select, .active-full textarea');

    // Función para iluminar el borde de los elementos con datos
    function iluminarBorde(element) {
        if (element.value.trim() !== "") {
            element.classList.add('border-success');
        } else {
            element.classList.remove('border-success');
        }
    }

    // Añadir eventos a cada elemento
    elements.forEach(function(element) {
        // Evento 'input' para detectar cambios en tiempo real (para inputs y textareas)
        element.addEventListener('input', function() {
            iluminarBorde(element);
        });

        // Evento 'change' para detectar cambios en selects
        element.addEventListener('change', function() {
            iluminarBorde(element);
        });

        // Evento 'blur' para detectar cuando el elemento pierde el foco
        element.addEventListener('blur', function() {
            iluminarBorde(element);
        });

        // Inicializar el borde en caso de que el elemento ya tenga datos
        iluminarBorde(element);
    });
});