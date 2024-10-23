document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('hidden-type-product');
    const medidasContainer = document.getElementById('type-product-container');
    const typeNew = document.querySelector('#type-product-container input');
    const typeSelect = document.querySelector('#type-input-main select');
    const toggleColorElements = document.querySelectorAll('.label-type-product');
    const typeLabel = document.querySelector('#type-product-container label');
  
    // Función para mostrar u ocultar los inputs y cambiar el color del texto
    function toggleInputs() {
      if (checkbox.checked) {
        medidasContainer.style.display = 'block';
        typeSelect.disabled = true;
        typeSelect.value = ""; // Limpiar el contenido del select
        toggleColorElements.forEach(element => element.classList.add('text-success'));
        typeLabel.classList.add('text-success');
        typeNew.classList.add('border-success');
      } else {
        medidasContainer.style.display = 'none';
        typeSelect.disabled = false;
        toggleColorElements.forEach(element => element.classList.remove('text-success'));
        typeLabel.classList.remove('text-success');
        typeNew.classList.remove('border-success');
      }
    }
  
    // Escuchar el evento change del checkbox
    checkbox.addEventListener('change', toggleInputs);
  
    // Escuchar el evento blur del input
    typeNew.addEventListener('blur', function() {
      if (typeNew.value.trim() !== "") {
        typeLabel.classList.remove('text-success');
        typeNew.classList.remove('border-success');
      }
    });
  
    // Escuchar el evento focus del input
    typeNew.addEventListener('focus', function() {
      typeLabel.classList.add('text-success');
      typeNew.classList.add('border-success');
    });
  
    // Inicializar la visibilidad de los inputs y el color del texto
    toggleInputs();
  });