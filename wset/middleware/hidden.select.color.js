document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('hidden-color-select');
    const medidasContainer = document.getElementById('color-container');
    
    const colorNew = document.querySelector('#color-container input');
    const colorSelect = document.querySelector('#color-select-main select');
    const toggleColorElements = document.querySelectorAll('.label-color-select');
    const colorLabel = document.querySelector('#color-container label');
  
    // Función para mostrar u ocultar los inputs y cambiar el color del texto
    function toggleColorInputs() {
      if (checkbox.checked) {
        medidasContainer.style.display = 'block';
        colorSelect.disabled = true;
        colorSelect.value = ""; // Limpiar el contenido del select
        toggleColorElements.forEach(element => element.classList.add('text-success'));
        colorLabel.classList.add('text-success');
        colorNew.classList.add('border-success');
      } else {
        medidasContainer.style.display = 'none';
        colorSelect.disabled = false;
        toggleColorElements.forEach(element => element.classList.remove('text-success'));
        colorLabel.classList.remove('text-success');
        colorNew.classList.remove('border-success');
      }
    }
  
    // Escuchar el evento change del checkbox
    checkbox.addEventListener('change', toggleColorInputs);
  
    // Escuchar el evento blur del input
    colorNew.addEventListener('blur', function() {
      if (colorNew.value.trim() !== "") {
        colorLabel.classList.remove('text-success');
        colorNew.classList.remove('border-success');
      }
    });
  
    // Escuchar el evento focus del input
    colorNew.addEventListener('focus', function() {
      colorLabel.classList.add('text-success');
      colorNew.classList.add('border-success');
    });
  
    // Inicializar la visibilidad de los inputs y el color del texto
    toggleColorInputs();
  });