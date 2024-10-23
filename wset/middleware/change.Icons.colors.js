document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('.input-change');
    
    inputs.forEach(input => {
      const icon = input.closest('.input-group').querySelector('.icon-color-change');
      const small = input.closest('.input-group').querySelector('.mr-2');
      
      input.addEventListener('input', function() {
        if (input.value) {
          icon.style.color = 'green';
          small.style.color = 'green';
        } else {
          icon.style.color = '';
          small.style.color = '';
        }
      });
    });
  });