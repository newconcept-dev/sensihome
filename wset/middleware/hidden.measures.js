  document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('measures-inputs');
    const medidasContainer = document.getElementById('medidas-container');
  
    // Función para mostrar u ocultar los inputs
    function toggleInputs() {
      if (checkbox.checked) {
        medidasContainer.style.display = 'block';
      } else {
        medidasContainer.style.display = 'none';
      }
    }
  
    // Escuchar el evento change del checkbox
    checkbox.addEventListener('change', toggleInputs);
  
    // Inicializar la visibilidad de los inputs
    toggleInputs();
  });