document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('plugins-inputs');
    const medidasContainer = document.getElementById('plugins-inputs-container');
  
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