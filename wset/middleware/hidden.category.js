document.addEventListener('DOMContentLoaded', function() {
  const checkbox = document.getElementById('hidden-category');
  const medidasContainer = document.getElementById('category-container');
  const categoryNew = document.querySelector('#category-container input[type="text"]');
  const categoryNumber = document.querySelector('#category-container input[type="number"]');
  const categorySelect = document.querySelector('#category-input-main select');
  const toggleColorElements = document.querySelectorAll('.toggle-color');
  const categoryLabels = document.querySelectorAll('#category-container .category-iluminate');

  // Función para mostrar u ocultar los inputs y cambiar el color del texto
  function toggleInputs() {
      if (checkbox.checked) {
          medidasContainer.style.display = 'block';
          categorySelect.disabled = true;
          categorySelect.value = ""; // Limpiar el contenido del select
          toggleColorElements.forEach(element => element.classList.add('text-success'));
          categoryLabels.forEach(label => label.classList.add('text-success'));
          categoryNew.classList.add('border-success');
          categoryNumber.classList.add('border-success');
      } else {
          medidasContainer.style.display = 'none';
          categorySelect.disabled = false;
          toggleColorElements.forEach(element => element.classList.remove('text-success'));
          categoryLabels.forEach(label => label.classList.remove('text-success'));
          categoryNew.classList.remove('border-success');
          categoryNumber.classList.remove('border-success');
      }
  }

  // Escuchar el evento change del checkbox
  checkbox.addEventListener('change', toggleInputs);

  // Escuchar el evento blur del input de texto
  categoryNew.addEventListener('blur', function() {
      if (categoryNew.value.trim() !== "") {
          categoryLabels.forEach(label => label.classList.remove('text-success'));
          categoryNew.classList.remove('border-success');
      }
  });

  // Escuchar el evento blur del input de número
  categoryNumber.addEventListener('blur', function() {
      if (categoryNumber.value.trim() !== "") {
          categoryLabels.forEach(label => label.classList.remove('text-success'));
          categoryNumber.classList.remove('border-success');
      }
  });

  // Escuchar el evento focus del input de texto
  categoryNew.addEventListener('focus', function() {
      categoryLabels.forEach(label => label.classList.add('text-success'));
      categoryNew.classList.add('border-success');
  });

  // Escuchar el evento focus del input de número
  categoryNumber.addEventListener('focus', function() {
      categoryLabels.forEach(label => label.classList.add('text-success'));
      categoryNumber.classList.add('border-success');
  });

  // Inicializar la visibilidad de los inputs y el color del texto
  toggleInputs();
});