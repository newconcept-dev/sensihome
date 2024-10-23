document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formValidated');
    const imageUpload = document.getElementById('imageUpload2');
    const imagePreview = document.getElementById('imagePreview2');

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