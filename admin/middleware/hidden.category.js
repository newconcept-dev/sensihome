document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('hidden-category');
    const medidasContainer = document.getElementById('category-container');
    const categoryNew = document.querySelector('#category-container input');
    const categorySelect = document.querySelector('#category-input-main select');
    const toggleColorElements = document.querySelectorAll('.toggle-color');
    const categoryLabel = document.querySelector('#category-container label');
  
    // Función para mostrar u ocultar los inputs y cambiar el color del texto
    function toggleInputs() {
      if (checkbox.checked) {
        medidasContainer.style.display = 'block';
        categorySelect.disabled = true;
        categorySelect.value = ""; // Limpiar el contenido del select
        toggleColorElements.forEach(element => element.classList.add('text-success'));
        categoryLabel.classList.add('text-success');
        categoryNew.classList.add('border-success');
      } else {
        medidasContainer.style.display = 'none';
        categorySelect.disabled = false;
        toggleColorElements.forEach(element => element.classList.remove('text-success'));
        categoryLabel.classList.remove('text-success');
        categoryNew.classList.remove('border-success');
      }
    }
  
    // Escuchar el evento change del checkbox
    checkbox.addEventListener('change', toggleInputs);
  
    // Escuchar el evento blur del input
    categoryNew.addEventListener('blur', function() {
      if (categoryNew.value.trim() !== "") {
        categoryLabel.classList.remove('text-success');
        categoryNew.classList.remove('border-success');
      }
    });
  
    // Escuchar el evento focus del input
    categoryNew.addEventListener('focus', function() {
      categoryLabel.classList.add('text-success');
      categoryNew.classList.add('border-success');
    });
  
    // Inicializar la visibilidad de los inputs y el color del texto
    toggleInputs();
  });