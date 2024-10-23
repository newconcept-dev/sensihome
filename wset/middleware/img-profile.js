document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formValidated');
    const imageUpload = document.getElementById('imageUpload');
    const imagePreview = document.getElementById('imagePreview');
    const submitButton = document.querySelector('button[name="guardar"]');

    form.addEventListener('submit', function(event) {
        if (!imageUpload.files.length) {
            event.preventDefault();
            alert('Por favor, sube una imagen de perfil.');
        }
    });

    imageUpload.addEventListener('change', function() {
        if (imageUpload.files && imageUpload.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.style.backgroundImage = 'url(' + e.target.result + ')';
            }
            reader.readAsDataURL(imageUpload.files[0]);
        }
    });
});